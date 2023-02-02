<?php
include 'autoloader.inc.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$about = $_POST['about'];
	$description = $_POST['description'];

	$profileInfoContr = new ProfileInfoContr($_SESSION['userid'], $_SESSION['useruid']);
	$profileInfoContr->setNewInfo($title, $description, $about);

	header('location: ../index.php?=succesprofileupdate' . $_SESSION['userid'] . '===' . $_SESSION['useruid']);
}
?>