<?php
include 'mailpass/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->SMTPDebug = 3;    
$mail->isSMTP(); 
$mail->setFrom('mahamatabdallah98@gmail.com', 'mytravaly');
$mail->addAddress('moimememoimeme2@gmail.com', 'abib');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}