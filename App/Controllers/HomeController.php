<?php 

namespace App\Controllers;

use Config\Controller;

/**
 * Example Homepage Controller
 */
class HomeController extends Controller
{
    /**
     * Display method for static route
     */
    public function index()
    {
        $this->view('home');
    }

    /**
     * Display method for dynamic route
     * 
     * @param $dynamo
     */
    public function realDynamo($dynamo)
    {
        $data['dynamo'] = $dynamo;

        $this->view('dynamic', $data);
    }
}
