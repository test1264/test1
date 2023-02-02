<?php
	include 'includes/autoloader.inc.php';
	session_start();
	$profileInfoView = new ProfileInfoView();
	$profileInfo = $profileInfoView->getUserInfo($_SESSION['userid']);
?>

<DOCTYPE !html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login System</title>
		<style type="text/css">
			<?php include "css/styles.css"; ?>
		</style>
	</head>
	<body>
		<div>
			<form action="../includes/profileinfo.inc.php" method="post">
				<a>Title of page</a>
				<input type="text" name="title" placeholder="title">

				<a>About section</a>
				<input type="text" name="about" placeholder="about">

				<a>Description section</a>
				<input type="text" name="description" placeholder="description">

				<button type="submit">Save</button>
			</form>
		</div>

	</body>
</html>
</DOCTYPE>