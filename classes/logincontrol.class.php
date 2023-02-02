<?php

class LoginControl extends Login
{
	private $username;
	private $pwd;

	public function __construct($username, $pwd)
	{
		$this->username = htmlspecialchars($username);
		/*
		$this->pwd = htmlspecialchars($pwd);
		*/
		$this->pwd = $pwd;

		$this->loginUser();
	}

	private function loginUser()
	{
		if($this->isAllSet() && $this->isValidUsername())
		{
			$this->getUser($this->username, $this->pwd);
		}
	}

	private function isAllSet()
	{
		if(empty($this->username) || empty($this->pwd))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	private function isValidUsername()
	{
		if(preg_match('/^[a-zA-Z0-9]*$/', $this->username))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}

?>