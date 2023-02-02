<?php
include 'autoloader.inc.php';

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$loginControl = new LoginControl($username, $pwd);
	header('location: ../index.php?=succesfullogin');
}
?>