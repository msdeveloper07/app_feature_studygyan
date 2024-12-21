<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder Email Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <!-- Base style starts -->
   <style type="text/css">#outlook a {
    padding: 0;
  }

  body {
    margin: 0;
    padding: 0;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    font-family: 'Open Sans', sans-serif;
  }

  table,
  td {
    font-family: 'Open Sans', sans-serif;
    border-collapse: collapse;
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
  }

  img {
    border: 0;
    height: auto;
    line-height: 100%;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }
  </style>
   <!-- Base style ends -->
</head>
<body>
    <!-- main table starts -->
    <table width="100%" style="width: 100%;">
        <tr>
            <td style="background-color: #F4F6F8;padding-left: 20px;padding-right: 20px;padding-top: 40px;padding-bottom: 40px;font-family: 'Open Sans', sans-serif;" align="center">
                <table style="background-color: #fff;width: 700px;border-radius:15px;max-width: 700px;margin: 0 auto;border: 1px solid #E0E0E0;font-family: 'Open Sans', sans-serif;overflow: hidden;" width="700" cellpadding="0" cellspacing="0">     
                    <!-- table header starts-->
                    <thead>
                        <tr>
                            <td width="100%" style="background-color:#fff;padding: 20px;padding-left: 20px;padding-right: 20px;padding-top: 40px;padding-bottom: 10px;font-family: 'Open Sans', sans-serif;" >
                                <table width="80%"  style="width: 80%;max-width: 540px;margin: 0 auto;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="color: #313131;text-align: center;font-family: 'Open Sans', sans-serif;">
                                            <h1 style="margin: 0;font-size: 24px;line-height: 30px;font-family: 'Open Sans', sans-serif;text-align: center;">
                                            <img src="https://cdn.shopify.com/s/files/1/0054/9201/5204/files/Amazing-Graze-Flowers-Web-Logo850x250_300x.jpg?v=1543398914" width="200px" alt=""></h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #313131;text-align: center;font-family: 'Open Sans', sans-serif;">
                                            <hr style="margin-top: 20px;margin-bottom: 20px;border: 0;border-bottom: 1px solid #e0e0e06c;font-family: 'Open Sans', sans-serif;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #313131;text-align: center;font-family: 'Open Sans', sans-serif;background: rgb(249 77 74 / 10%);padding: 10px 10px 0px;border-radius: 10px;">
                                            <h1 style="margin: 0;margin-bottom:10px;font-size: 20px;line-height: 30px;font-family: 'Open Sans', sans-serif;font-weight: 600;">  <span ><img src="<?php echo e(url('/')); ?>/img/l.png" alt=""></span> <span style="color: #f94d4a;font-weight: 700;"><?php echo e($category); ?></span> <span ><img src="<?php echo e(url('/')); ?>/img/r.png" alt=""></span></h1>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </thead>
                    <!-- table header ends-->

                    <!-- table body starts-->
                    <tbody>
                        <tr>
                            <td width="100%" style="background-color:#fff;padding: 20px;padding-left: 20px;padding-right: 20px;padding-top: 20px;padding-bottom: 0px;font-family: 'Open Sans', sans-serif;" >
                                <table width="80%"  style="width: 80%;max-width: 540px;margin: 0 auto;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="color: #303030;font-family: 'Open Sans', sans-serif;">
                                            <p style="margin: 0;font-size: 16px;margin-bottom:10px;line-height: 35px;font-family: 'Open Sans', sans-serif;font-weight: bold;"><span style="font-weight: 400;"> Hello</span> <?php echo e($username); ?>, </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #303030;font-family: 'Open Sans', sans-serif;">
                                            <h2 style="margin: 0;margin-bottom:10px;font-size: 16px;line-height: 24px;font-family: 'Open Sans', sans-serif;">Your reminder has been successfully created for <span style="color: #f94d4a;font-weight: 700;">Mum's Birthday</span> held on <span style="color: #f94d4a;font-weight: 700;"><?php echo e($event_date); ?>.</span></h2>
                                            <p style="text-align: center;">
                                                <img src="<?php echo e(url('/')); ?>/img/placeholder.png" alt="">
                                            </p>
                                            <p style="margin-top: 0;margin-bottom:16px;font-weight: 400;font-family: 'Open Sans', sans-serif;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta cumque dolor sit sed omnis nulla aliquid sint dolores neque. Ducimus sint odit assumenda excepturi incidunt architecto impedit facere illum libero!</p>
                                            <p style="margin-top: 0;font-weight: 400;margin-bottom:16px;font-family: 'Open Sans', sans-serif;font-size: 16px;">Check your orders on <a href="www.amazinggrazeflowers.com.au" style="font-weight: bold;text-decoration: underline;color: #f94d4a;">www.amazinggrazeflowers.com.au</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #303030;font-family: 'Open Sans', sans-serif;">
                                            <p style="margin-top: 0;margin-bottom:0px;font-weight: 600;color: #303030;font-family: 'Open Sans', sans-serif;">&nbsp;</p>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="margin-top: 0;font-weight: bold;margin-bottom:16px;font-family: 'Open Sans', sans-serif; text-align: center;">
                                                <a href="#" style="text-decoration: none;">
                                                <div style="display: inline-block;padding: 10px 25px;background-color: #f94d4a;color: #fff;font-weight: 600;font-size: 14px;">
                                                    Explore more flowers
                                                </div>
                                                </a>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                    <!-- table body ends-->
                    
                        <tr>
                            <td width="100%" style="background-color:#fff;padding: 20px;padding-left: 20px;padding-right: 20px;padding-top: 0px;padding-bottom: 20pxpx;font-family: 'Open Sans', sans-serif;" >
                                <table width="80%"  style="width: 80%;max-width: 540px;margin: 0 auto;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="color: #fff;text-align: center;font-family: 'Open Sans', sans-serif;">
                                            <hr style="margin-top: 20px;margin-bottom: 20px;border: 0;border-bottom: 1px solid #e0e0e06c;font-family: 'Open Sans', sans-serif;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #303030;font-family: 'Open Sans', sans-serif;">
                                          
                                            <p style="margin-top: 0;margin-bottom:16px;font-weight: 600;color: #303030;font-family: 'Open Sans', sans-serif;font-size: 16px;">Thanks for choosing <b>AMAZING GRAZE FLOWERS</b> <br>
                                                - Amazing Graze Team</p>
                                          
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                 

                </table>
            </td>
        </tr>
    </table>
    <!-- main table ends -->
</body>
</html>