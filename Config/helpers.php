<?php 

require 'vendor/autoload.php';
    /**
     * Set Application Name In The .env file.
     */
    function set_app_name()
    {
        return getenv('APP_NAME');
    }
    /**
     * Set Developer Name In The .env file.
     */
    function set_dv_name()
    {
        return getenv('DV_NAME');
    }
    /**
     * Set Application Name In The .env file.
     */
    function set_dv_link()
    {
        return getenv('DV_LINK');
    }


    /**
     * Change the namespace to be a path file.
     * @param $class
     * @return $join_class
     */

    function namespace_validator($class) 
    {
        $split_class = explode('\\', $class);
        $total = count($split_class) - 1;
        $split_new_class = [];

        foreach ($split_class as $key => $val) {
            $split_new_class[] = $key !== $total ? strtolower($val) : $val;
        }
        $join_class = implode('/', $split_new_class);
        return $join_class;
    }

    /**
     * Setup the environment
     */

    function create_env()

    {
        $env_file = file_get_contents('.env');
        $env_split = preg_split('/\n/', $env_file);
        foreach ($env_split as $env) {
            if (!empty($env)) {
                putenv($env);
            }
        }
    }



    /**
     * Base url of this application
     * @param $url
     */

    function baseURL($url = '/')
    {
        $baseURL = trim(getenv('baseURL'), '/');
        echo $baseURL . $url;
    }
	

    /**
     * Accessing the public directory
     * @param $file_path
     */

    function public_asset($file_path)

    {
        $baseURL = trim(getenv('baseURL'), '/');
        echo $baseURL . '/Public/'.$file_path;
    }

