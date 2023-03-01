<?php

namespace Config;

require 'vendor/autoload.php';

class Validate

{
	/**
     * The properties that point to strings.
     * 
     * @var string
     */

	public $data = '';

	/**
	 * clean all inputs
	 */

	public function clean($data)

	{
//String Validation
		if (is_string($data)) {
			trim($data);
			strip_tags(
				filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)
			);
			$data = stripslashes($data);
			return htmlspecialchars($data);
		}
//Int Validation
		if (is_numeric($data)) {
			trim($data);
			strip_tags(
				filter_var($data, FILTER_VALIDATE_INT)
			);
			$data = stripslashes($data);
			return htmlspecialchars($data);
		}
//Email Validation
		if (is_string($data)) {
			trim($data);
			strip_tags(
				filter_var($data, FILTER_VALIDATE_EMAIL)
			);
			$data = stripslashes($data);
			return htmlspecialchars($data);
		}
//IP Validation

	}





























	/**

     * End Of File

     */

}