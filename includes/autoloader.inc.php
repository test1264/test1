<?php
	spl_autoload_register('autoloader');

	function autoloader($className)
	{
		try {
			$url = $_SERVER['REQUEST_URI'];

			if(strpos($url, 'includes') !== false)
        	{
            	$path = '../classes/';
        	}
       		else
        	{
            	$path = 'classes/';
        	}
			include $path . $className . '.class.php';
		} catch (Exception $e) {
			echo 'Error ' . $e->getMessage() . '<br>';
		}
	}
?>


