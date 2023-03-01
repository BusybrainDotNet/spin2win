<?php 

namespace Config;
require 'vendor/autoload.php';

abstract class Controller

{



    /**
     * Display data to browser from views.
     * @param string $file_path Path of file from folder app/view.
     * @param array $data The data that should be display.
     */
    protected function view($file_path, $data=[])
    {
        extract($data);
        require_once 'App/Views/'.$file_path.'.php';
    }
}

