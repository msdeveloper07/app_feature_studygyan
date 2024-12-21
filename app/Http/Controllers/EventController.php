<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Shopify;
use View;
use Input;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use URL;
use Mail;
use DateTime;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Carbon\Carbon;

class EventController extends Controller
{
    /*****************************************
		Create Customer And Events
	******************************************/
	public function createCustomerAndEvent(Request $request)
	{
	    // echo"<pre>"; print_r($request->all());  die;
	    $customer['first_name'] = $request->_shopify_user_fname;
		$customer['last_name'] = $request->_shopify_user_lname;
		$customer['email'] = $request->_shopify_user_email;
		$customer['phone'] = "";
		$customer['tags'] = '';
		$customer['password'] = $request->_shopify_user_pwd;
		$customer['password_confirmation'] = $request->_shopify_user_pwd;
		$customer['verified_email'] = true;
		$customer['send_email_invite'] = false;
		$customer['send_email_welcome'] = false;
		$customer_array['customer'] = $customer;
		$jsonDecode = json_encode($customer_array);
		$customer_data = $jsonDecode;
		$customerUrl = 'https://feature-app-v1.myshopify.com/admin/api/2021-10/customers.json';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$customerUrl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $customer_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$header = array(
			'X-Shopify-Access-Token: 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',
			'Content-Type: application/json',
			'Host: feature-app-v1.myshopify.com'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$server_output = curl_exec ($ch);
		$res_arrayV = json_decode($server_output);
		$customerresulT=$res_arrayV;
		//echo"<pre>"; print_r($customerresulT->customer->id); die('email');
		if (array_key_exists("errors",$res_arrayV)){
			if(array_key_exists("email",$res_arrayV->errors)){
				return response()->json([
					'success' => false,
					'message' => 'Email has already been taken'
				], 422);
			}else if(array_key_exists("phone",$res_arrayV->errors)){
				if (array_key_exists("phone",$res_arrayV->errors)){
					$message = 'phone '.$res_arrayV->errors->phone[0];
				}else{
					$message = 'Phone has already been taken';
				}
				return response()->json([
					'success' => false,
					'message' => $message
				], 422);
			}else{
				return response()->json([
					'success' => false,
					'message' => 'Something wrong please try again..!'
				], 422);
			}
		}else{
			$insert = DB::table('events')->insert([
			    'shopify_user_id' => $customerresulT->customer->id,
			    'shopify_user_email' => $customerresulT->customer->email,
			    'shopify_user_name' => $request->_shopify_user_fname.' '.$request->_shopify_user_lname,
			    'event_day' => $request->_event_day,
			    'guest_name' => $request->_guest_name,
			    'category' => $request->_category,
			    'event_date' => $request->_event_date
			]);
			if($insert == 1){
			    //$data = $request->all();
				//$this->emailFire($data);
				return response()->json([
					'success' => true,
					'message' => 'Your account created, Please login..!'
				], 200);
			}else{
				return response()->json([
					'success' => false,
					'message' => 'Something went wrong.! Please try again.!'
				], 422);
			}
		}
		return response()->json([
			'success' => true,
			'message' => 'Customer created successfully.'
		], 422);
	}
	/*****************************************
		Create Events
	******************************************/
	public function createEvent(Request $request)
	{
		$insert = DB::table('events')->insert([
		    'shopify_user_id' => $request->_shopify_user_id,
		    'shopify_user_email' => $request->_shopify_user_email,
		    'shopify_user_name' => $request->_shopify_user_name,
		    'event_day' => $request->_event_day,
		    'guest_name' => $request->_guest_name,
		    'category' => $request->_category,
		    'event_date' => $request->_event_date
		]);
		if($insert == 1){
		    //$data = $request->all();
			//$this->emailFire($data);
			return response()->json([
				'success' => true,
				'message' => 'Your event has been created.'
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'Something went wrong.! Please try again.!'
			], 422);
		}
	}
	/****************************************************
		Get LoggedIn User's Event
	*****************************************************/
	public function getShopifyUserEvents(Request $request){
		if(empty($request->shopify_user_id)){
			return response()->json([
				'success' => true,
				'message' => 'Something went wrong.! Please try again.!'
			], 200);
		}
		$events = DB::table('events')
            ->where('shopify_user_id', $request->shopify_user_id)
            ->orderBy('id', 'DESC')
            ->get();
            $eventsdata = array();
            foreach ($events as $key => $event) {
            	$events_data['id'] = $event->id;
            	$events_data['shopify_user_id'] = $event->shopify_user_id;
            	$events_data['shopify_user_email'] = $event->shopify_user_email;
            	$events_data['shopify_user_name'] = $event->shopify_user_name;
            	$events_data['event_day'] = $event->event_day;
            	$events_data['guest_name'] = $event->guest_name;
            	$events_data['category'] = $event->category;
            	$events_data['event_date'] = $event->event_date;
            	if(!empty($event->event_date)){
            		$day = Carbon::parse($event->event_date)->format('d M');
            		// $month = Carbon::parse('d M', $event->event_date);
            		$events_data['event_date'] = $day;
            	}else{
            		$events_data['event_date'] = '';
            	}
            	$events_data['before_oneday'] = $event->before_oneday;
            	$events_data['same_day'] = $event->same_day;
            	$events_data['created_at'] = $event->created_at;
            	$events_data['updated_at'] = $event->updated_at;
            	$eventsdata[] = $events_data;
            }
        return response()->json([
			'success' => true,
			'message' => 'Your event has been created.!',
			'data' => $eventsdata
		], 200);
	}
	/****************************************************
		Event Created Mail Send To ShopifyUser
	*****************************************************/
	public function emailFire($request){
		//echo"<pre>"; print_r($request);	die;
		$shopify_user_name = $request['_shopify_user_name'];
		$shopify_user_email = $request['_shopify_user_email'];
		$category = $request['_category'];
		$event_date = $request['_event_date'];
		$email = $shopify_user_email;
        Mail::send('email.event_create', ['username' => $shopify_user_name, 'category' => $category, 'event_date' => $event_date], function($message) use($email, $category){
          $message->to($email);
          $message->subject($category);
        });
	}
	/****************************************************
		Send Email to before one day from event
	*****************************************************/
	public function beforeOneDayEmailFire(){
		$events = DB::table('events')->get();
		if($events->count()>0){
			foreach ($events as $key => $value) {
			 //   echo"<pre>"; print_r($value);	die;
			    if(!empty($value->event_date)){
			        $event_date = $value->event_date;
			        $prev_date = date('Y-m-d', strtotime($event_date .' -1 day'));
			        $today = Date('Y-m-d');
			        if($today == $prev_date){
			            $shopify_user_name = $value->shopify_user_name;
                		$email = $value->shopify_user_email;
                		$category = $value->category;
                        Mail::send('email.event_create', ['username' => $shopify_user_name, 'category' => $category, 'event_date' => $event_date], function($message) use($email, $category){
                          $message->to($email);
                          $message->subject($category);
                        });

                        $BeforeOneDay = new Logger('email_before_oneday');
						$BeforeOneDay->pushHandler(new StreamHandler(storage_path('logs/email_before_oneday.log')), Logger::INFO);
						$BeforeOneDay->info('EmailBeforeOneDay', array($value));
			        }
			    }
			}
		}
	}

	/****************************************************
		Send Email to same day
	*****************************************************/
	public function sameDayEmailFire(){
	    $events = DB::table('events')->get();
		if($events->count()>0){
			foreach ($events as $key => $value) {
			    if(!empty($value->event_date)){
			        $event_date = $value->event_date;
			        $prev_date = date('Y-m-d', strtotime($event_date .' -1 day'));
			        $today = Date('Y-m-d');
			        if($today == $event_date){
			            $shopify_user_name = $value->shopify_user_name;
                		$email = $value->shopify_user_email;
                		$category = $value->category;
                        Mail::send('email.event_create', ['username' => $shopify_user_name, 'category' => $category, 'event_date' => $event_date], function($message) use($email, $category){
                          $message->to($email);
                          $message->subject($category);
                        });

                        $Sameday = new Logger('email_sameday');
						$Sameday->pushHandler(new StreamHandler(storage_path('logs/email_sameday.log')), Logger::INFO);
						$Sameday->info('Sameday', array($value));
			        }
			    }
			}
		}
	}
	
	/*****************************************
		Get single event
	******************************************/
	public function singhEvent(Request $request)
	{
		if(empty($request->event_id)){
			return response()->json([
				'success' => false,
				'message' => 'Something went wrong.! Please try again.!'
			], 422);
		}
		$event = DB::table('events')->where('id',$request->event_id)->first();
		return response()->json([
			'success' => true,
			'message' => 'Data found.!',
			'data' => $event
		], 200);

	}

	/*****************************************
		Update Events
	******************************************/
	public function updatesEvent(Request $request)
	{
	   // echo"<pre>"; print_r($request->all());	die;
		$update = DB::table('events')->where('id',$request->event_id)->update([
		    //'shopify_user_id' => $request->_shopify_user_id,
		    //'shopify_user_email' => $request->_shopify_user_email,
		    //'shopify_user_name' => $request->_shopify_user_name,
		    //'event_day' => $request->_event_day,
		    'guest_name' => $request->_guest_name,
		    'category' => $request->_category,
		    'event_date' => $request->_event_date
		]);
// 		echo"<pre>"; print_r($update);	die;
		if($update == '1'){
			return response()->json([
				'success' => true,
				'message' => 'Your event has been updated..!'
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'Something went wrong.! Please try again.!'
			], 422);
		}
	}
	
	/*****************************************
		Delete Event
	******************************************/
	public function deleteEvent(Request $request)
	{
	    if(empty($request->event_id)){
			return response()->json([
				'success' => false,
				'message' => 'Something went wrong.! Please try again.!'
			], 422);
		}
		$delete = DB::table('events')->where('id',$request->event_id)->delete();
		return response()->json([
			'success' => true,
			'message' => 'Your event has been deleted..!'
		], 200);
	}
	/*****************************************
		If Event akready Exits
	******************************************/
	public function checkEventIfExits(Request $request){
	    //echo"<pre>"; print_r($request->all());  die;
		$event_day = $request->_event_day;
		$event_date = $request->_event_date;
		$shopify_user_id = $request->_shopify_user_id;
		$checkIF = DB::table('events')->where('shopify_user_id',$shopify_user_id)->where('event_day',$event_day)->where('event_date',$event_date)->get()->count();
		if($checkIF > 0){
			return response()->json([
				'success' => true,
				'message' => 'Exit'
			], 200);
		}else{
			return response()->json([
				'success' => false,
				'message' => 'No Exit'
			], 200);
		}
	}

	public  function testFun()
	{
		$events = \Spatie\GoogleCalendar\Event::get();
		echo"<pre>"; print_r($events);	die;
	}
}