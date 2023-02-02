<?php

class ProfileInfoView extends ProfileInfo
{
	public function getUserInfo($id)
	{
		$res = $this->getInfo($id);
		return $res;
	}
}
?>