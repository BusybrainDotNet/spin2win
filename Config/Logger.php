<?php

namespace Config;
require 'vendor/autoload.php';

trait Logger
{
	public function log($msg)
	{
		echo '<pre>';
		echo date('Y-m-d h:i:s') . ':' . $msg . '<br/>';
		echo '</pre>';
	}
}