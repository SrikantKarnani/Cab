<html>
  <head>
    <title>Thanks!</title>
  </head>
  <body>
  <?php
		if(isset($_POST['sendmail'])){
			require 'PHPMailerAutoload.php';
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com'; 								// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "khansharukh1732@gmail.com";
			$mail->Password = "khansharukh17321732";                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; 			// TCP port to connect to
			$mail->SMTPDebug=4;

			$mail->setFrom("khansharukh1732@gmail", 'Sharukh Khan');
			$mail->addAddress($_POST['email']);     // Add a recipient
			$mail->addReplyTo(EMAIL);
			//$mail->addCC($_POST['CC']);
			//$mail->addBCC($_POST['BCC']);
			$subject='Cab Booking';
			$body='$_POST['vehical'] has been booked for $_POST['passangers'] pickup location is $_POST['pkup_location'] 
			and drop location is $_POST['droff_location'] on $_POST['pkup_date'] ';
			for($i=0; $i < count($_FILES['file']['tmp_name']); $i++) {
			$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
			}    // Add attachments
			$mail->isHTML(true);                                  // Set email format to HTML=
			$mail->Subject = $subject;
			$mail->Body = $body;
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	?>

  <?php if ( $success ) echo "<p>Thanks for sending your message! We'll get back to you shortly.</p>" ?>
  <?php if ( !$success ) echo "<p>There was a problem sending your message. Please try again.</p>" ?>
  <p>Click your browser's Back button to return to the page.</p>
  </body>
</html>
<?php
}
?>


