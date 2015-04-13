<?php
require_once 'class/class.phpmailer2.php';
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$setting = $_REQUEST['setting'];
//Tabluu Contact Page
//Affiliate Contact Page
$message = "<p>name: ".$name."</p>" . "<p>subject: ".$subject."</p>" . "<p>message: ".$message."</p>";
$mail = new PHPMailer;
$mail->IsAmazonSES();
$mail->AddAmazonSESKey('AKIAIL3G7TGANBAQ72GA', 'NcAMmOs6nL1GyOocYeRIVMGp4i4FPID0SLCo6ePY');                            // Enable SMTP authentication
$mail->CharSet =	"UTF-8";                      // SMTP secret 
if($setting){
	$mail->From = 'support@tabluu.com';
	$mail->FromName =  'Tabluu Contact Page';
	$mail->AddAddress("support@tabluu.com");
}else{
	$mail->From = 'affiliates@tabluu.com';
	$mail->FromName =  'Affiliate Contact Page';
	$mail->AddAddress("affiliates@tabluu.com");
}
$mail->Subject = $subject;
$mail->AltBody = $message;
$mail->Body = $message; 
$mail->addBCC($email);
$mail->AddReplyTo($email);
$mail->Send();
?>
