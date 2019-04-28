<?php
session_start();
require_once('phpmailer/sendemail.php');
$folio= $_SESSION['folio'];

$email= $_SESSION['email'];
echo $email;

$sub="";
 foreach($_POST['email_checkbox'] as $selected)
 {

$sub.=$selected.',';
if($selected=='reservation_confirmation')
{
	$body="Dear Guest Your reservation has been confirmed";
	if(send_mail($email,$sub,$body))
	{
		echo('email sent successfully.....');
	}
}
if($selected=='reservation_cancelation')
{
	$body="Dear Guest Your reservation has been Canceled";
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}

if($selected=='reservation_modification')
{
	$body="Dear Guest Your reservation has been modified";
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}
if($selected=='pre_arrival')
{
	$body='Dear guest..This is the reminder for your arrival';
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}
if($selected=='arrival')
{
	$body="Dear Guest...Welcome to our Hotel...Enjoy our services";
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}
if($selected=='departure')
{
	$body='Dear Guest..Your departure process is finished. It was nice to have you our guest.Keep visiting';
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}

if($selected=='feedback')
{
	$body='Dear Guest.Please give us the feedback regarding our services';
	if(send_mail($email,$sub,$body))
{
	echo('email sent successfully.....');
}
}
echo $body;

}



?>