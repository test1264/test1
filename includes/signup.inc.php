<?php
include 'autoloader.inc.php';

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdRepeat = $_POST['pwdRepeat'];

	$signupControl = new SignupControl($username, $email, $pwd, $pwdRepeat);

	header('location: ../index.php?=succesfulsignup');
}
?>