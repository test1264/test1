<?php

class Signup extends Dbh
{
	protected function setUser($username, $email, $password)
	{
		// push in db 'clear' info
		$sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';

		$pwdHashed = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$username, $email, $pwdHashed]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}


		$stmt = null;
	}

	protected function checkUser($username, $email)
	{
		$sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$username, $email]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}

		if($stmt->rowCount() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function getUserId($username)
	{
		$sql = 'SELECT id FROM users WHERE username = ?';
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$username]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}

		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $res[0]['id'];
	}
}

?>