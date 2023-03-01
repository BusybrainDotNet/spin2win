<?php 

namespace Config;
require 'vendor/autoload.php';

require_once 'App/Models/User.php';

class ModelFactory

{
    /**
     * Accessing a Controller in Model.
     * 
     * @param $name The name of Controller should be case sensitive.
    */

    public static function controller($name)
    {
        $class = '\App\Controllers\\'.$name;
        return new $class;
    }



    /**
     * Accessing a model in controller.
     * 
     * @param $name The name of model should be case sensitive.
     */

    public static function model($name)

    {
        $class = '\App\Models\\'.$name;
        return new $class;
    }

}