<?php

namespace Config;

class ErrorHandler

{
	use Logger;
	
	private $file = 'writable/errors/error_log.log';

	public function set_handler()
	{
	    error_reporting(E_ALL);
		set_error_handler('Config/error_handler');
		ini_set('display_errors', 'off');
	    register_shutdown_function('error_handler');
	}



	function error_handler()

    {
        $error = error_get_last();
        if ($error !== NULL && in_array($error['type'], array(E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING, E_RECOVERABLE_ERROR))) {
           error_log(log($error), 3, $file);
        }

    }



    



}