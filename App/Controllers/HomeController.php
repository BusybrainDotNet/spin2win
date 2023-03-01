<?php 

namespace App\Controllers;

use Config\Controller;
use Config\Validate;
use Config\ModelFactory;

/**
 * Example Homepage Controller
 */
class HomeController extends Controller
{
    /**
     * Display method for static route
     */
    
     
         //Home, Index Page View
    public function index()
    {
        $v = new Validate();

        //$coyInfo = ModelFactory::model('Admin')->coyData();

        $data = array(
            //'coyInfo' => $coyInfo,
        );

        $this->view('Front/index', $data);
    }





    public function howto()
    {
        $v = new Validate();

        //$coyInfo = ModelFactory::model('Admin')->coyData();

        $data = array(
            //'coyInfo' => $coyInfo,
        );

        $this->view('Front/index', $data);
    }






    public function faqs()
    {
        $v = new Validate();

        //$coyInfo = ModelFactory::model('Admin')->coyData();

        $data = array(
            //'coyInfo' => $coyInfo,
        );

        $this->view('Front/index', $data);
    }




    
    public function contact()
    {
        $v = new Validate();

        //$coyInfo = ModelFactory::model('Admin')->coyData();

        $data = array(
            //'coyInfo' => $coyInfo,
        );

        $this->view('Front/index', $data);
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
