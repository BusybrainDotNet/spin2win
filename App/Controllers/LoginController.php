<?php 
/*
|--------------------- Controller Configuration ------------------------
| Here is where you can configure all logics for your application.
*/
namespace App\Controllers;

require 'vendor/autoload.php';


use Config\Controller;
use Config\Validate;
use Config\ModelFactory;

/**
 * Users Controller
 */
class LoginController extends Controller
{


    

//Get User ID from URL
    public function get_id()
    { 
    //Instantiate Validator
        $v = new Validate();

    //Parse URL
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $u = explode("/", $url);
        $id = $v->clean($u[2]);
            
        return $id;
    }





    //Log Members To Dashboard
    public function member_area()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

    if (isset($_POST['signin'])) {
        //Get form inputs
        $user = $v->clean($_POST['u']);
        $password = $v->clean($_POST['p']);
        $ip = $v->clean($_POST['ip']);
        $user_agent = $v->clean($_POST['ua']);

        $info = array(
            "uniqueid" => $user,
            "email" => $user,
            "password" => $password,
            "ip" => $ip,
            "user_agent" => $user_agent,
            );
        // Register A User And Send Confirmation Email...
        $result = ModelFactory::model('Login')->member_check($info); 

        if ($result == 1) {
                 // code...
                $res = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    "type" => "error",
                    "message" => "Whoops: Access Denied! This User Credentials Does Not Exist!",
                );

                return $this->view('Front/Auth/login', $res);

            } elseif($result == 2){

                $res = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    "type" => "error",
                    "message" => "Whoops: Access Denied! Contact Support For Help...",
                );

                return $this->view('Front/Auth/login', $res);   

            }elseif($result == 3){

                $res = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    "type" => "error",
                    "message" => "Whoops: Access Denied! Wrong Password Combinations...",
                );

                return $this->view('Front/Auth/login', $res);   

            } elseif(isset($result['user'])){

                $res = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    "res" => $result,
                );

                return $this->view('Front/Auth/unlock', $res);

            } elseif($result){

            $res = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                "id" => $result,
                "user" => $user,
                "type" => "success",
                "message" => "Unlock Key Sent To Your Email Inbox Or Spam Folder...",
                );

                return $this->view('Front/Auth/unlock', $res);

                }

            }else{
                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                );

                return $this->view('Front/Auth/login', $data);  
            }
    }







//Display Unlock route
    public function unlock_member()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['unlock'])) {
                // code...
            $code = $v->clean($_POST['c']);
            $uniqueid = $v->clean($_POST['u']);
            $email = $v->clean($_POST['e']);

            $info = array('code' => $code, 'uniqueid' => $uniqueid,);

            $result = ModelFactory::model('Login')->member_unlock($info);

           if (isset($result['type'])) {

                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    'id' => $uniqueid,
                     'user' => $email,
                    'type' => "error",
                    'message' => "Wrong Or Expired Code Combination",
                );

                $this->view('Front/Auth/unlock', $data);
            }

        } else {
                // code... 
                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                );

                $this->view('Front/Auth/unlock', $data);
        }
    }
  






//Display Forgot Password route
    public function forgot_password()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['forgot'])) {
                // code...
            $u = $v->clean($_POST['u']);

            $info = array('email' => $u, 'uniqueid' => $u, );

            $result = ModelFactory::model('Login')->forgot_pass($info);

           if ($result != false) {

                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    'id' => $result['id'],
                    'name' => $result['name'],
                    'type' => "success",
                    'message' => "Successful: Reset Code Has Been Sent To The Provided Email Inbox Or Spam Folder",
                );

                $this->view('Front/Auth/reset-password', $data);

               } else {
                // code...
                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    'type' => "error",
                    'message' => "Whoops: Incorrect Account Credential",
                );

                $this->view('Front/Auth/forgot-password', $data);
            }

           } elseif (isset($_POST['reset'])) {
                // code...
            $u = $v->clean($_POST['u']);
            $n = $v->clean($_POST['n']);
            $c = $v->clean($_POST['c']);
            $p = $v->clean($_POST['p']);

            $info = array('uniqueid' => $u, 'code' => $c, 'password' => $p, );

            $result = ModelFactory::model('Login')->reset_pass($info);

                if ($result != false) {

                    $data = array(
                        'coyInfo' => $coyInfo,
                        'curInfo' => $curInfo,
                        "type" => "success",
                        "message" => "Successful: Login With Your New Credentials.."
                    );

                    $this->view('Front/Auth/login', $data);

                } else {
                       // code...
                     $data = array(
                        'coyInfo' => $coyInfo,
                        'curInfo' => $curInfo,
                        "id" => $u,
                        "name" => $n,
                        "type" => "error",
                        "message" => "Whoops: Reset Code Expired Or Incorrect..."
                    );

                    $this->view('Front/Auth/reset-password', $data);
                }
                
            } else {
                // code... 
                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                );

                $this->view('Front/Auth/forgot-password', $data);
        }
    }
  



  



//Display Logout route
    public function logout()
    {
       $v = new Validate();

       $id = $this->get_id();
       $user = ModelFactory::model('User')->userInfo($id);
       $me = $user['username'];

        $result = ModelFactory::model('Register')->end_session($id, $me);

        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

            $data = array(
                'type' => $result['type'],
                'message' => $result['message'],
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/Auth/login', $data);

        }









//Display Logout route
  /*  public function logout()
    {
       $v = new Validate();
       $u = $this->get_id();

        $result = ModelFactory::model('Login')->end_session($u);

           if ($result == true) {
                $data = array(
                    "type" => "success",
                    "message" => "Successful, Session Terminated..."
                );

                $this->view('Front/Auth/login', $data);

           } else {
            $data = array(
                "type" => "error",
                "message" => "Problem Terminating Session..."
                );

            $this->view('Front/Auth/login', $data);
           
           }
        }*/










 // End of File

}