<?php

class Dbh
{
	protected function connect()
	{
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
			return $pdo;
		}
		catch (PDOException $e)
		{
			echo 'Error: ' . $e->getMessage() . '<br>';
			die();
		}

	}
}

?>