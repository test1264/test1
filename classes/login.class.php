<?php

class Login extends Dbh
{
	protected function getUser($username, $pwd)
	{
		// is user exists
		$sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$username, $username]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}

		if($stmt->rowCount() === 0)
		{
			$stmt = null;
			header('location: ../index.php?error=wrongusername');
			exit();
		}

		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$PwdMatch = password_verify($pwd, $user[0]['password']);

		if($PwdMatch)
		{
			session_start();
			$_SESSION['userid'] = $user[0]['id'];
			$_SESSION['useruid'] = $user[0]['username'];
			header('location: ../index.php?success');
			exit();
		}
		else
		{
			$stmt = null;
			header('location: ../index.php?error=wrongpassword');
			exit();
		}
	}
}

?>