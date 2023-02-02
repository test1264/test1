<?php

class ProfileInfo extends Dbh
{
	public function setInfo($title, $description, $about, $userid)
	{
		$sql = 'INSERT INTO profiles (title, description, about, users_id) VALUES (?, ?, ?, ?)';
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$title, $description, $about, $userid]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}
	}

	public function getInfo($userid)
	{
		$sql = 'SELECT * FROM profiles WHERE users_id = ?';
		$stmt =  $this->connect()->prepare($sql);

		if(!$stmt->execute([$userid]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}

		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $res[0];
	}

	public function updateInfo($title, $description, $about, $id)
	{
		$sql = 'UPDATE profiles SET title = ?, description = ?, about = ? WHERE users_id = ?';
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute([$title, $description, $about, $id]))
		{
			$stmt = null;
			header('location: ../index.php?error=stmtfailed');
			exit();
		}

		$stmt = null;
	}
}
?>