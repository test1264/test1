<?php
declare(strict_types=1);

class SignupControl extends Signup
{
	private $username;
	private $email;
	private $pwd;
	private $pwdRepeat;

	public function __construct($username, $email, $pwd, $pwdRepeat)
	{
		$this->username = htmlspecialchars($username);
		$this->email = htmlspecialchars($email);
		$this->pwd = htmlspecialchars($pwd);
		$this->pwdRepeat = htmlspecialchars($pwdRepeat);

		$this->signupUser();
	}

	public function signupUser()
	{
		if(!$this->isAllSet())
		{
			header('location: ../index.php?error=emptyfields');
			exit();
		}

		if(!$this->isValidUsername())
		{
			header('location: ../index.php?error=invalidusername');
			exit();
		}

		if(!$this->isValidEmail())
		{
			header('location: ../index.php?error=invalidemail');
			exit();
		}

		if(!$this->isPwdEqual())
		{
			header('location: ../index.php?error=passwordsdoesntmatch');
			exit();
		}

		if(!$this->isUnique())
		{
			header('location: ../index.php?error=userexists');
			exit();
		}

		$this->setUser($this->username, $this->email, $this->pwd);

		$id = $this->getUserId($this->username);

		$profile = new ProfileInfoContr($id, $this->username);
		$profile->setDefaultInfo();

	}

	private function isAllSet()
	{
		//if($this->username == null || $this->email == null || $this->pwd == null || $this->pwdRepeat == null)
		if(empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat))
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

	private function isUnique()
	{
		$res = $this->checkUser($this->username, $this->email);
		if($res === true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	private function isValidEmail()
	{
		if(filter_var($this->email, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	private function isPwdEqual()
	{
		if(strcmp($this->pwd, $this->pwdRepeat) === 0)
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