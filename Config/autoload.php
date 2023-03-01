<?php
	/*
	 * A Function to automatically call a class 
	 */
	spl_autoload_register(function($class){
		$any_class = namespace_validator($class);
		if (file_exists($any_class . '.php')) {
			require_once $any_class . '.php';
		}
	});