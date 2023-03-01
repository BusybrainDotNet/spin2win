<?php

namespace App\Models;

use Config\Model;
use Config\Mail;
use Config\Controller;
use Config\ModelFactory;


class Login extends Model
{

    protected $u_table = 'realestate_users'; //Users 
    protected $p_table = 'realestate_profile'; //Profile





//Verify And Update User Status
    public function member_check($data = array())
    {
        $length = 5;
        $chars = trim(getenv('COMBINATION'));
        $code = substr(str_shuffle(trim($chars)), 0, $length);
        $log_session = substr($data['email'], 0, $length).substr(str_shuffle(trim($chars)), 0, $length);

        $info = array(
                "email" => $data['email'],
                "uniqueid" => $data['uniqueid'],
            );

        $query = "SELECT * FROM " . $this->u_table ." WHERE email = :email || uniqueid = :uniqueid LIMIT 1";

        $check = $this->checker($info, $query);

        if ($check == false) { 

            return 1;

            }elseif(($check['status'] == "Deactivated") || ($check['status'] == "Trash")){

                return 2; 

            }elseif(!password_verify($data['password'], $check['password'])) {

                return 3;
                
            }else{

                $e = array(
                    "uniqueid" => $check['uniqueid'],
                    "ip" => $data['ip'],
                    "user_agent" => $data['user_agent'],
                    "code" => $code,
                    "log_session" => $log_session,
                );

                $pass = "UPDATE ". $this->u_table ." SET `code` = :code, `log_session` = :log_session, `ip` = :ip, `user_agent` = :user_agent WHERE uniqueid = :uniqueid LIMIT 1";

                $this->update($e, $pass);

                $data = $this->member_notify($check['uniqueid']);

                return $data;

                /*if ($check['login_status'] === "Logged_out") {
                    
                    $data = $this->member_notify($check['uniqueid']);

                    return $data;
                    
                }else{

                    //Send Email Alert To User
                    $info = array('username' => $check['username'], 'email' => $check['email'], 'code' => $code, );
                    Mail::mailer('NotifyAlert')->notify_user($info);

                    $data = array(
                        "id" => $check['uniqueid'],
                        "user" => $check['email'],
                        "type" => "error",
                        "message" => "You Have An Active Session On Another Device, Use The Code Sent To Your Email Inbox Or Spam Folder To Continue..."
                    );
                    
                    return $data;

                }*/
        }

    }





//Notification  Status
    public function member_notify($data)
    {
        $info = array(
                "uniqueid" => $data,
            );

        $query = "SELECT * FROM " . $this->u_table ." WHERE uniqueid = :uniqueid LIMIT 1";
        $check = $this->checker($info, $query);

        if (($check['notify'] == "On")) { 

            //Send Email Alert To User
                Mail::mailer('NotifyAlert')->notify_user($check);

                return $data;

        }else{
                $da = $this->login_user($check);

                return $da;
        }

    }








//Unlock method For All Users
    public function member_unlock($data = array())
    {

        $d = array(
            "uniqueid" => $data['uniqueid'],
            "code" => $data['code'],
        );
        $query = "SELECT * FROM " . $this->u_table ." WHERE uniqueid = :uniqueid AND code = :code LIMIT 1";

        $check = $this->checker($d, $query);

        if ($check == true) {

           $this->login_user($data);

        }else{

            $data = array(
                "type" => "error",
                "message" => "Wrong Or Expired Code..."
                );
            return $data;
        }
    }




//Forgot Password method For All Users
    public function forgot_pass($data = array())
    {
        // Derive the code by shuffle
        $length = 5;
        $chars = trim(getenv('COMBINATION'));
        $code = substr(str_shuffle(trim($chars)), 0, $length);

        $query = "SELECT * FROM " . $this->u_table ." WHERE uniqueid = :uniqueid || email = :email LIMIT 1";

        $check = $this->checker($data, $query);

        if ($check == true) {

            $c = array('uniqueid' => $check['uniqueid'], 'code' => $code, );

            $query = "UPDATE ". $this->u_table ." SET `code` = :code WHERE uniqueid = :uniqueid LIMIT 1";

            $this->update($c, $query);

            $d = array('username' => $check['username'], 'email' => $check['email'], 'code' => $code, );
           //Send Email Alert To User
            Mail::mailer('ForgotPassAlert')->notify_user($d);

            //Record Activity
            $info = array('id' => $check['uniqueid'], 'username' => $check['username'], 'details' => $check['username']." Requested Password Reset Link", ); 

            ModelFactory::model('Admin')->record_activity($info);

            $data = array('id' => $check['uniqueid'], 'name' => $check['username']);

            return $data;

        }else{

            return false; 
        }
    }




//Reset Password method For All Users
    public function reset_pass($data = array())
    {
        // Derive the code by shuffle
        $length = 5;
        $chars = trim(getenv('COMBINATION'));
        $code = substr(str_shuffle(trim($chars)), 0, $length);

        $c = array('uniqueid' => $data['uniqueid'], );

        $query = "SELECT * FROM " . $this->u_table ." WHERE uniqueid = :uniqueid LIMIT 1";

        $ck = $this->checker($c, $query);

        if ($ck['code'] == $data['code']) {

            $d = array(
                'uniqueid' => $ck['uniqueid'], 
                'password' => password_hash($data['password'], PASSWORD_DEFAULT), 
                'code' => $code,
            );

            $query = "UPDATE ". $this->u_table ." SET `password` = :password, `code` = :code WHERE uniqueid = :uniqueid LIMIT 1";
            
             $this->update($d, $query);

            //Record Activity
            $info = array('id' => $ck['uniqueid'], 'username' => $ck['username'], 'details' => $ck['username']." Reset Password", ); 

            ModelFactory::model('Admin')->record_activity($info);;

            return true;

        }else{
            
            return false; 
        }
    }










  


//Login method For All Users
    public function end_session($id, $user)
    {

        $e = array(
            "uniqueid" => $id,
            "login_status" => "Logged_out",
        );

        $query = "UPDATE ". $this->u_table ." SET `login_status` = :login_status WHERE uniqueid = :uniqueid LIMIT 1";

        $out = $this->logout($e, $query);

        if ($out == NULL && session_start()) {

//Record Activity
            $info = array('id' => $id, 'username' => $user, 'details' => $user." Logged Out", ); 

            ModelFactory::model('Admin')->record_activity($info);

            unset($d);
            session_destroy();

            $data = array(
                "type" => "success",
                "message" => "Successful: Logged Out..."
                );
            return $data;

        }else{

            $data = array(
                "type" => "error",
                "message" => "Whoops: Session Still Active..."
                );
            return $data; 
        }
    }
















//Login function for all users
    protected function login_user($data = array())
    {

     //Set New Login Details
        $e = array(
            "uniqueid" => $data['uniqueid'],
            "lastlogin" => date('Y-m-d H:i:s'),
            "login_status" => 'Logged_in',
        );

        try {
                $pass = "UPDATE ". $this->u_table ." SET `login_status` = :login_status, `lastlogin` = :lastlogin WHERE uniqueid = :uniqueid LIMIT 1";

                $check = $this->update($e, $pass);

                $f = array(
                    "uniqueid" => $data['uniqueid'],
                );

                $query6 = "SELECT * FROM ". $this->u_table .", ". $this->p_table ." WHERE ". $this->u_table .".uniqueid = :uniqueid AND ". $this->p_table .".uniqueid = :uniqueid LIMIT 1";

                $check1 = $this->fetch_row($f, $query6);

                //Record Activity
                $info = array('id' => $check1['uniqueid'], 'username' => $check1['username'], 'details' => $check1['username']." Logged In", );

                ModelFactory::model('Admin')->record_activity($info);

                session_start();
                $_SESSION['log_session'] = $check1['log_session'];

                //Login Access For User Roles
                if ($check1['profile'] == "Admin") {
                    ModelFactory::controller('AdminController')->admin_login($check1);

                }elseif ($check1['profile'] == "Moderator") {
                    ModelFactory::controller('ModeratorController')->mode_login($check1);

                }else{
                    ModelFactory::controller('UserController')->user_login($check1);
                }

            } catch (Exception $e) {

                $data = array(
                    "type" => "error",
                    "message" => $e,
                );
                return $data;
            }
    }



 









//End of File
}
