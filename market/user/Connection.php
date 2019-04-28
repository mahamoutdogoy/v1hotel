<?php
include 'connect.php';

// REGISTER USER
if (isset($_POST['sign_up'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = $_POST['gender'];
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $conf_pass = mysqli_real_escape_string($con, $_POST['conf_pass']);
  if ($password !== $conf_pass) {
      echo "<script>alert('Passwords do no match')</script>";
    }else{

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $signup = mysqli_fetch_assoc($result);

 
  if ($signup) { // if user exists
    if ($signup['email'] === $email) {
      echo "<script>alert('Email already exists')</script>";
    }
  }else{
  	$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database


  	$query = "INSERT INTO customer (first_name, last_name, email, gender, phone, password) VALUES('$fname', '$lname', '$email', '$gender', '$phone', '$password')";
   if(mysqli_query($con, $query)){
    header('location: Login.php'); 
  } else die("Somthing when wrong");
    

  	
  }}
  
}
  //  $imgContent=$_FILES['Picture']['tmp_name'];
	//  $imgContent=addslashes(file_get_contents($imgContent));
	//  echo"<img 
	//  src='data:UploadPics/jpeg;base64,".base64_encode($row['Pictures'])."' style='width:200px;height:80px;margin-top: -20px;' class='img'/>" 

?>
