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
use Carbon\Carbon;

class HomeController extends Controller
{
  // protected $shop = "divyanshu-test1.myshopify.com";
  protected $foo;
  protected $access_token;
  
 // protected $scopes = ['write_shipping ', 'read_script_tags', 'write_script_tags', 'read_shipping', 'write_shipping' ,'read_products', 'write_products', 'read_themes', 'write_themes', 'read_customers', 'write_customers','read_analytics', 'read_checkouts', 'write_checkouts', 'read_orders', 'write_orders'];
  
    protected $scopes = ['read_shipping', 'write_shipping','read_products','write_products','read_analytics', 'read_checkouts', 'write_checkouts', 'read_reports', 'write_reports', 'read_orders', 'write_orders','read_themes','write_themes','read_customers', 'write_customers','read_price_rules','write_price_rules','unauthenticated_write_checkouts','unauthenticated_write_customers', 'read_script_tags', 'write_script_tags'];
  
  public function getPermission()
  {
    $this->shop = Input::get('site_url').'.myshopify.com';
    $this->foo = Shopify::make($this->shop, $this->scopes);
    return $this->foo->redirect();
  }

  public function getPermission_a($url)
  {    
    $this->shop = $url;
    $this->foo = Shopify::make($this->shop, $this->scopes);
    return $this->foo->redirect();
  }
  
  public function getResponse(Request $request)
  {
    $this->getPermission_a($request->shop);
    $user = $this->foo->auth()->getUser();
    $access_token = $user->token;

	$shp_cnt = DB::table('shopify_url_credentials')->where('admin_url',request()->shop)->count();
    if($shp_cnt > 0)
    {
    DB::table('shopify_url_credentials')->where('admin_url', request()->shop)->update(['admin_url' => request()->shop, 'token' => $access_token,'wallet_address'=>'']);
    }else{
      DB::table('shopify_url_credentials')->insert(['admin_url' => request()->shop, 'token' => $access_token,'wallet_address'=>'']);
    } 
	
    //DB::table('shopify_url_credentials')->insert(['site_url' => request()->shop, 'wallet_address' => '', 'token' => $access_token]);
	
    return redirect('https://'.request()->shop.'/admin/settings/channels');
  }

  public function getLogin()
  {
    if (request()->has('shop')) {
        $access_token = DB::table('shopify_url_credentials')->where('admin_url', request()->shop)->value('token');
        $shop = request()->shop;
        $this->afterLogin($shop, $access_token);
        
    }else{
      return View::make('pages.home');
    }
  }

  public function afterLogin($shop, $access_token)
  { 
        $this->shop = $shop;
        $this->access_token = $access_token;
        $this->foo = Shopify::retrieve($shop, $access_token);
        $user = $this->foo->getUser();        
        $base_url = URL::to('/');
        $webhooks = $this->foo->getWebhooksAll();
        
        if(array_search($base_url."/delete?site_url=".$this->shop, array_column($webhooks['webhooks'], 'address')) != False){
          $options['webhook']['topic'] = "app/uninstalled";
          $options['webhook']['address'] = $base_url."/delete?site_url=".$this->shop;
          $options['webhook']['format'] = "json";
          $this->foo->createWebhooks($options);
        }else{
          // echo "2";
        }
        session(['shop' => $shop]);
        session(['access_token' => $access_token]);
        $events = array();
        $events = DB::table('events')
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
        echo  View::make('pages.app_connected', ['shop' => $this->shop,'saved' => '0','events' => $eventsdata,]);
  }


  public function Delete(Request $request)
  {
    $shop_data = DB::table('shopify_url_credentials')->where('site_url', request()->site_url)->get();
    echo "<pre>";print_r($shop_data);die;
  }
}