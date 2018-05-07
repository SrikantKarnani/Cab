<?php
    //include phpmailer class
	require 'opt/app-root/src/php/phpmailer/PHPMailerAutoload.php';
   // STATIC DATA MANAGE	 
   $currencyType = "&#163;"; 				// CURRENCY HTML CODE// From here https://www.toptal.com/designers/htmlarrows/currency/
   $price = 2; 					   			// $2/km you can change as you charged 	
   $subject = "For Cab Booking";			// Main Subject 
   $setFroms = "khansharukh1732@gmail.com";		// Set From <------------------------------- CHANGE IT --------------------
   
   // FORM DATA 
   $vehicle = $_POST['vehicle'];
   $passangers = $_POST['passangers'];
   $pkup_location = $_POST['pkup_location'];
   $pkup_date = $_POST['pkup_date'];
   $droff_location = $_POST['droff_location'];
   $dorpof_date = $_POST['dorpof_date'];
   $email = $_POST['email'];
   $name = $_POST['email'];
   $parts = explode("@", $_POST['email']);
   $username = $parts[0];
   $bookdate = date('d-m-Y');
   $packages = $_POST['package'];
   $totaldistanced = $_POST['totaldistanced'];
   $totalduration = $_POST['totalduration'];
   
   if($_POST['directions'] == "di_return" ){
   
   	$directionsMode = "Return";
   	$totalCost =  $_POST['totaldistanced']* $price * 2; // TOTAL COST = distanced * $2 "changed whats you chagre per km like 2,5,10 $/km"
   }
   else{
   	$directionsMode = "One Way";
   	$totalCost = $_POST['totaldistanced']* $price; // TOTAL COST"
   }
   
   // PACKAGES DATA MANAGE
   switch($packages) {
   case 'regular':
   	$pkg_name = "Regular Cab";
   	$pkg_price = 50;
   	$pkg_distance = "10 km";
   	$pkg_passanger = 1;
   	break;
   case 'pro':
   	$pkg_name = "Pro Cab";
   	$pkg_price = 120 ;
   	$pkg_distance = "15 km";
   	$pkg_passanger = 3;
   	break;
   case 'advanced':
   	$pkg_name = "Advanced Cab";
   	$pkg_price = 180;
   	$pkg_distance = "20 km";
   	$pkg_passanger = 4;
   	break;
   
   }
   if($packages != "" )
   {
   	 $package_div = "<div style='padding: 40px; background: #fff;'>
        <h3 style='font-size: 22px;text-transform: uppercase;font-weight: 900;'>".$pkg_name."<h3>
   	 <ul style='list-style: none;margin: 0;padding: 0;'>
   	 <li style='padding: 10px 0;border-bottom:1px dashed #eee;font-size: 16px;font-weight: normal;text-transform: uppercase;'>Package Cost : <strong style='font-size:22px;'>".$currencyType." ".$pkg_price."</strong></li>
   	 <li style='padding: 10px 0;border-bottom:1px dashed #eee;font-size: 16px;font-weight: normal;text-transform: uppercase;'>Ride Distance :<strong style='font-size:22px;'>".$pkg_distance."</strong></li>
   	 <li style='padding: 10px 0;border-bottom:1px dashed #eee;font-size: 16px;font-weight: normal;text-transform: uppercase;'>Passanger Limit :<strong style='font-size:22px;'>".$pkg_passanger."</strong></li>
   	 </ul>
       </div>";
   
   }
   else{$package_div = ""; }
   
     
     if( $email != "")
     {
   	         
   $message = "
   
   <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
   <html xmlns='http://www.w3.org/1999/xhtml'>
   <head>
   <meta name='viewport' content='width=device-width' />
   <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
   <title>Pickup Cab</title>
   </head>
   <body style='margin:0px; background: #f8f8f8; '>
   <div width='100%' style='background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;'>
     <div style='max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px'>
       <table border='0' cellpadding='0' cellspacing='0' style='width: 100%; margin-bottom: 20px'>
         <tbody>
           <tr>
             <td style='vertical-align: top; padding-bottom:30px;' align='center'>
   		  <a href='javascript:void(0)' target='_blank'><img src='http://demo.pxtheme.com/pickupcab/assets/theme/img/logo.png' alt='Pxtheme' style='border:none'>
              </a> </td>
           </tr>
         </tbody>
       </table>
   	<table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
         <tbody>
           <tr>
             <td style='background:#f44336; padding:20px;font-size:40px; color:#fff; text-align:center;'> Cab Booking</td>
           </tr>
         </tbody>
       </table>
   <div style='padding: 40px; background: #fff;'>
         <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
           <tbody>
   		  <tr>
               <td colspan='2'><b>Dear Sir/Madam/Customer,</b>
                <p>Your Cab request has been successfully submited </p></td>
              
             </tr>
   		  
             <tr>
               <td><b style='text-transform:capitalize'>Cab Booking</b>
   			<b style='width:100%;display:block;'>". $username . " </b>
   			<b style='width:100%;display:block;'> <a href='mailTo:".$email."'>".$email."</a></b>
   
                 <p style='margin-top:0px;'><b>Date ::</b> ".$bookdate ." </p></td>
               <td align='right' width='100'> </td>
             </tr>
             <tr>
               <td width='50%'  style='padding:20px 0; border-top:1px solid #f6f6f6;    vertical-align: top;'>
   			<div>
   <b style='width:100%;margin:0;padding:5px 0px;'>Start Journey</b><br>
   
   <p style='width:100%;margin:0;padding:5px 0px;'>Pickup Location <b style='width:100%;display:block;'> ". $pkup_location ."</b></p>
   <p style='width:100%;margin:0;padding:5px 0px;'>Pickup Date <b style='width:100%;display:block;'>".$pkup_date." </b></p>
   <p style='width:100%;margin:0;padding:5px 0px;'>Vehicle <b style='width:100%;display:block;'> ".$vehicle."</b></p>
   <p style='width:100%;margin:0;padding:5px 0px;'>Passanger  <b style='width:100%;display:block;'>".$passangers." Mamber's</b></p>
   <p style='width:100%;margin:0;padding:5px 0px;'>Direction Type  <b style='width:100%;display:block;'> ". $directionsMode."</b></p>
   
                   
                 
                 </div>".$package_div."
   			  	
   			  </td>
   			  <td width='50%'  style='padding:20px 0; border-top:1px solid #f6f6f6;    vertical-align: top;'>
   			  <div>
                  <b style='width:100%'>End Journey</b>
   			   <p style='width:100%;margin:0;padding:5px 0px;'>Dropoff Location <b style='width:100%;display:block;'> ".$droff_location."</b></p>
   			   <p style='width:100%;margin:0;padding:5px 0px;'>Return Date  <b style='width:100%;display:block;'> ".$dorpof_date."</b></p>
   				<div style='background: #fff;
       padding: 10px;
       box-shadow: 0 5px 15px rgba(0,0,0,0.2);
   	-webkit-box-shadow: 0 5px 15px rgba(0,0,0,0.2);
       font-size: 15px;
   	background-image: linear-gradient(to bottom,rgb(248, 248, 248),rgb(210, 207, 207));
       color: #121212;
       text-align: center;'><span style='font-size: 22px;
       display: block;
       padding: 5px 0;'>Fair Amount ::<strong>".$currencyType." ".$totalCost."  </strong></span>
   				<span style='font-size: 22px;
       display: block;
       padding: 5px 0;'>Total Distance ::<strong>".$totaldistanced."  </strong></span></div>
                 </div></td>
             </tr>
             <tr>
               <td colspan='2'><center>
                
                 </center>
                 <b>- Thanks (Admin team)</b> </td>
             </tr>
           </tbody>
         </table>
       </div>
       <div style='text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px'>
         <p> Powered by Themedesigner.in <br>
           <a href='javascript: void(0);' style='color: #b2b2b5; text-decoration: underline;'>Unsubscribe</a> </p>
       </div>
     </div>
   </div>
   </body>
   </html>
   ";
     }
     else{ 
     $message = "";
     }
   
    $mail = new PHPMailer();  
   // $mail->IsSMTP();  // Sets up a SMTP connection  
    $mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com'; 								// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "khansharukh1732@gmail.com";
			$mail->Password = "khansharukh17321732";                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; 			// TCP port to connect to
			$mail->SMTPDebug=4;

			$mail->setFrom("khansharukh1732@gmail", 'Sharukh Khan');
			$mail->addReplyTo(EMAIL);
			//$mail->addCC($_POST['CC']);
			//$mail->addBCC($_POST['BCC']);
    $mail->Subject = ($subject);      // Subject (which isn't required)  
    $mail->isHTML(true);
    $mail->MsgHTML($message);
    // Send To  
    $mail->AddAddress($email,$name); // Sent a copy to user // Where to Received it - Recipient <------------------------------- CHANGE IT --------------------
    $result = $mail->Send();		// Send!  
    $message = $result ? '<div class="alert alert-success" role="alert"><strong>Success!</strong>Message Sent Successfully!</div>' : '<div class="alert alert-danger" role="alert"><strong>Error!</strong>There was a problem delivering the message.</div>';  
   
    unset($mail);
   ?>
