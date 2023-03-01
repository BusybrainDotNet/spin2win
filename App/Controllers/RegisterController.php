<?php 

/*
|----------------------------------------------
| Controller Configuration
|----------------------------------------------
| Here is where you can configure all logics for your application.
*/
namespace App\Controllers;

require 'vendor/autoload.php';

use Config\Validate;
use Config\Controller;
use Config\ModelFactory;
use Config\Logger;


class RegisterController extends Controller
{



//Get Referral ID from URL
    protected function get_referral()
    {
    //Instantiate Validator
        $v = new Validate();

    //Parse URL
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $u = explode("/", $url);
    //Clean Input
        $referral = $v->clean($u[2]);
    //Return Value
        return $referral;
    }






//Display Register route
    public function register()

    {
        $ref = $this->get_referral();

        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['join'])) {

            // code...
            $f = $v->clean($_POST['f']);

            $l = $v->clean($_POST['l']);

            $e = $v->clean($_POST['e']);

            $p = $v->clean($_POST['p']);

            $ip = $v->clean($_POST['ip']);

            $ua = $v->clean($_POST['ua']);

            $referral = $v->clean($ref);

            $info = array('email' => $e, 'fname' => $f, 'lname' => $l, 'username' => substr($f, 0,5).substr($l, 0,5), 'password' => $p, 'ip' => $ip, 'user_agent' => $ua, 'referral' => $referral, );

            $member = ModelFactory::model('Register')->new_user($info);
            
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $member['type'],
                'message' => $member['message'],

            );  

            $this->view('Front/Auth/sign-up', $data);

        } else {

            // code..
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

             $this->view('Front/Auth/sign-up', $data);

        }

    }








//Confirm Newly Registered User
    public function confirm_member()
    {

        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_GET['u']) && isset($_GET['h'])) {

            //Get form inputs
            $h = $v->clean($_GET['h']);
            $id = $v->clean($_GET['u']);

            // Verify A User...
            $info = array(
                "hash" => $h,
                "uniqueid" => $id,
            );

            $d = ModelFactory::model('Register')->confirm_user($info);

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $d['type'],
                'message' => $d['message'],
            );

            $this->view('Front/Auth/index', $data); 

        }else{

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/Auth/sign-up', $data); 

        }       

    }











//Display Activation Link route
    public function request_link()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['link'])) {
                // code...
            $u = $v->clean($_POST['u']);

            $ip = $v->clean($_POST['ip']);

            $ua = $v->clean($_POST['ua']);

            $info = array('email' => $u, 'uniqueid' => $u, );

            $da = ModelFactory::model('Register')->activation_link($info);

           if (isset($da['type'])) {

                $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                    'type' => $da['type'],
                    'message' => $da['message'],
                );

                $this->view('Front/Auth/activation-link', $data);

               }
           } else {
                // code... 
                 $data = array(
                    'coyInfo' => $coyInfo,
                    'curInfo' => $curInfo,
                );
                $this->view('Front/Auth/activation-link', $data);

            }
    }

  












//View for contact us page
    public function contact_us()
    {

        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['write'])) {

            // code...

            $fname = $v->clean($_POST['f']);

            $lname = $v->clean($_POST['l']);

            $email = $v->clean($_POST['e']);

            $phone = $v->clean($_POST['p']);

            $dept = $v->clean($_POST['d']);

            $issue = $v->clean($_POST['i']);

            $subject = $v->clean($_POST['s']);

            $details = $v->clean($_POST['m']);

            $ip = $v->clean($_POST['ip']);

            $user_agent = $v->clean($_POST['ua']);

            $info = array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'phone' => $phone, 'dept' => $dept, 'issue' => $issue, 'subject' => $subject, 'details' => $details, 'ip' => $ip, 'user_agent' => $user_agent, );

            $result = ModelFactory::model('Register')->message_enquiry($info);

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $result['type'],
                'message' => $result['message'],

            );

            $this->view('Front/contact-us', $data);

        } else {
            // code...
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/contact-us', $data);

        }        
    }









//Confirm New Subscribers
    public function Subscribe()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['sub'])) {

            // code...
            $e = $v->clean($_POST['e']);

            $ip = $v->clean($_POST['ip']);

            $ua = $v->clean($_POST['ua']);
            $type = $v->clean($_POST['type']);

            $info = array('email' => $e, 'type' => $type, 'ip' => $ip, 'user_agent' => $ua, );

            $member = ModelFactory::model('Register')->user_subscribe($info);

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $member['type'],
                'message' => $member['message'],
            );

            $this->view('Front/subscribe', $data);

        }elseif (isset($_POST['unsub'])){

            //Get form inputs
            $e = $v->clean($_POST['e']);

            // Verify A User...
            $d = ModelFactory::model('Register')->user_unsubscribe($e);

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $d['type'],
                'message' => $d['message'],

                );

            $this->view('Front/subscribe', $data); 

        } else {
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/subscribe', $data); 
        }     
    }








//Join New WaitList
    public function waitList()
    {
        $v = new Validate();
        $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();

        if (isset($_POST['sub'])) {

            // code...
            $e = $v->clean($_POST['e']);

            $ip = $v->clean($_POST['ip']);

            $ua = $v->clean($_POST['ua']);
            $type = $v->clean($_POST['type']);

            $info = array('email' => $e, 'type' => $type, 'ip' => $ip, 'user_agent' => $ua, );

            $member = ModelFactory::model('Register')->user_waitlist($info);

            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
                'type' => $member['type'],
                'message' => $member['message'],
            );

            $this->view('Front/waitlist', $data);

        }else {
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/waitlist', $data); 
        }     
    }









//Join Our Team
    public function join_team()
    {
        $v = new Validate();
       $coyInfo = ModelFactory::model('Admin')->coyData();
        $curInfo = ModelFactory::model('Admin')->currencyDetail();
        
        if (isset($_POST['apply'])) {
            //Get form inputs
            $f = $v->clean($_POST['f']);
            $l = $v->clean($_POST['l']);
            $e = $v->clean($_POST['e']);
            $p = $v->clean($_POST['p']);
            $r = $v->clean($_POST['r']);
            $m = $v->clean($_POST['m']);
            $i = $v->clean($_POST['ip']);
            $u = $v->clean($_POST['ua']);

    // location where initial upload will be moved to
        // File fullname
          $file = $_FILES['cv']['name'];

        // Location
          $target_file = 'Public/other_assets/Cv/'.$file;

          // file extension
          $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
          $file_extension = strtolower($file_extension);

          // Valid image extension
          $valid_extension = array("pdf", "docx", "doc");
          if(in_array($file_extension, $valid_extension)){
             // Upload file
            if(move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)){

            $fill = array(
                "fname" => $f,
                "lname" => $l,
                "email" => $e,
                "phone" => $p,
                "role" => $r,
                "details" => $m,
                "ip" => $i,
                "user_agent" => $u,
                'cv'  => $file,
            );

            $sub = ModelFactory::model('Register')->join_team($fill);
            
            $data = array(
                'type' => $sub['type'],
                'message' => $sub['message'],
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/career', $data);
                }
            }
        }else {
            // code...
            $data = array(
                'coyInfo' => $coyInfo,
                'curInfo' => $curInfo,
            );

            $this->view('Front/career', $data);
        }
    }











    /**

     * End Of File

     */



}



