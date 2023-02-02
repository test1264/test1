<?php

class ProfileInfoContr extends ProfileInfo
{
	private $userid;
	private $username;

	public function __construct($uid, $uname)
	{
		$this->userid = $uid;
		$this->username = $uname;
	}

	public function setDefaultInfo()
	{
		$title = 'I am ' . $this->username . '!';
		$description = 'Long, long, long description of something, but is should be less then 255 symbols. Guess, I still following this rule!';
		$about = 'I am newbie user of this site';

		$this->setInfo($title, $description, $about, $this->userid);
	}

	public function setNewInfo($title, $description, $about)
	{
		$this->updateInfo($title, $description, $about, $this->userid);
	}
}
?>