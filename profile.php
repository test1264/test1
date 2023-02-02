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
			<h3 style="color: wheat;">
				<?php echo $profileInfo['title'];?>
			</h3>

			<a style="color: palevioletred;">
				<?php echo $profileInfo['about'];?>
			</a>

			<br>

			<a>
				<?php echo $profileInfo['description'];?>
			</a>
		</div>
		<div>
			<a href="profileEdit.php" style="color:lightblue;">Edit</a>
		</div>

	</body>
</html>
</DOCTYPE>