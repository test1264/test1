<?php
	session_start();
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
		<div class="header">
			<?php
				if(isset($_SESSION['userid']))
				{
			?>
			<div class="header-item">
				<a href="profile.php"><?php echo $_SESSION['useruid']; ?></a>
			</div>
			<div class="header-item">
				<a href="includes/logout.inc.php">Log Out</a>
			</div>
			<?php
				}
				else
				{
			?>
			<div class="header-item">
				<a href="#">Log In</a>
			</div>
			<div class="header-item">
				<a href="#">Sign Up</a>
			</div>
			<?php
				}
			?>
		</div>

		<div class="content">
			<div class="content-item">
				<form action="includes/signup.inc.php" method="post">
					<input type="text" name="username" placeholder="Username">
					<input type="text" name="email" placeholder="Email">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwdRepeat" placeholder="Repeat password">
					<button name="submit" class="submit" type="submit">Sign Up</button>
				</form>
			</div>

			<div class="content-item">
				<form action="includes/login.inc.php" method="post">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="pwd" placeholder="Password">
					<button name="submit" class="submit" type="submit">Log In</button>
				</form>
			</div>
		</div>
	</body>
</html>
</DOCTYPE>