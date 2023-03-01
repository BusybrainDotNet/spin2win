<?php

namespace App\Models;

use Config\Model;
use Config\Mail;
use Config\ModelFactory;


class Register extends Model
{

//Database Tables
    protected $u_table = 'realestate_users'; //Users 
    protected $p_table = 'realestate_profile'; //Profile
    protected $msg_table = 'realestate_msgreport'; //Messages 
    protected $sub_table = "realestate_subscribe";   //Subscribe Table
    protected $car_table = "realestate_career";   //Career Table


//New User Registration
    public function new_user($data = array())
    {
        // Derive the code by shuffle
        $length = 5;
        $hash = md5(rand(0,1000));
        $chars = trim(getenv('COMBINATION'));
        $code = substr(str_shuffle(trim($chars)), 0, $length);
        $pin = substr(str_shuffle(trim($hash)), 0, 4);
        $uniqueid = substr(getenv('APP_NAME'), 0, 5).trim($code);
        //Define Checker Variables
         $checkvalue = array(
            "uniqueid" => $uniqueid,
            "email" => $data['email'],
        );
        $fill = array(
            "uniqueid" => $uniqueid,
            "fname" => $data['fname'],
            "lname" => $data['lname'],
            "pin" => $pin,
        );
        $monify = array(
            "uniqueid" => $uniqueid,
            "name" => $data['fname'].' '.$data['fname'],
            "email" => $data['email'],
        );
        $fillable = array(
            "uniqueid" => $uniqueid,
            "username" => $data['username'],
            "email" => $data['email'],
            "password" => password_hash($data['password'], PASSWORD_DEFAULT),
            "code" => $code,
            "hash" => $hash,
            "ip" => $data['ip'],
            "user_agent" => $data['user_agent']
            );
        //$referral = $data['referral'];
        //DB Function 

        try {

            $query = "SELECT * FROM " . $this->u_table ." WHERE uniqueid = :uniqueid || email = :email LIMIT 1";

            $check = $this->checker($checkvalue, $query);

            if (!empty($check)) { 

                $data = array(
                    "type" => "error",
                    "message" => "Whoops: Credentials Are Already In Use. Try Another Or Login Instead!"
                );
                return $data;

            } else{

               $query0 = "INSERT INTO ". $this->u_table ." (uniqueid, username, email, password, code, hash, ip, user_agent) VALUES (:uniqueid, :username, :email, :password, :code, :hash, :ip, :user_agent)";
                $this->insert($fillable, $query0);

                $query1 = "INSERT INTO ". $this->p_table ." (fname, lname, uniqueid, pin) VALUES (:fname, :lname, :uniqueid, :pin)";
                $this->insert($fill, $query1);

            //Send Email Alert To User

                Mail::mailer('RegistrationAlert')->new_member($data, $hash, $uniqueid, $pin);

            //Record Activity
               $info = array('id' => $uniqueid, 'username' => $data['username'], 'details' => $data['username']." Just Registered", ); 

               ModelFactory::model('Admin')->record_activity($info);

                $data = array(
                    "type" => "success",
                    "message" => "Congratulations: You Are Successfully Registered. Check Your Email To Continue!"
                );
                return $data;
            }
        } catch (Exception $e) {
            $data = array(
                "type" => "error",
                "message" => $e->getMessage()
                );
            return $data;
        }
                  
    }






//Verify And Update User Status
    public function confirm_user($data = array())
    {
        try {
            $query = "SELECT * FROM " . $this->u_table ." WHERE hash = :hash AND uniqueid = :uniqueid LIMIT 1";
            $check = $this->fetch_row($data, $query);

            if ((empty($check)) || ($check['status'] == "Deactivated") || ($check['status'] == "Trash") || ($check['status'] == "Banned")) { 

                $data = array(
                        "type" => "error",
                        "message" => "Whoops: Credentials Are Faulty. Please Contact Support!"
                    );
                    return $data;

            }elseif ($check['status'] == "Activated") { 

                $data = array(
                        "type" => "error",
                        "message" => "Whoops: This Account Was Previously Activated. Login Instead!"
                    );
                    return $data;

            }elseif($check['status'] == "New") {
    //Set New User Details
                $a = array( "uniqueid" =>  $data['uniqueid'], );
                $e = array( "uniqueid" =>  $data['uniqueid'], "status" => 'Activated', );

                $pass = "UPDATE ". $this->u_table ." SET `status` = :status WHERE uniqueid = :uniqueid LIMIT 1";

                $this->update($e, $pass);

                $query = "SELECT * FROM ". $this->p_table ." WHERE uniqueid = :uniqueid LIMIT 1";
                $profile = $this->fetch_row($a, $query);

                 //Send Email Alert To User
                Mail::mailer('RegistrationAlert')->new_member_info($check, $profile);

    //Record Activity
                $info = array('id' => $check['uniqueid'], 'username' => $check['username'], 'details' => $check['username']." Confirmed Account", ); 

                ModelFactory::model('Admin')->record_activity($info);

                $data = array(
                    "type" => "success",
                    "message" => "Congratulations: You Are Successfully Verified. You Can Now Login!"
                );
                return $data;
            }else {
                $data = array(
                    "type" => "error",
                    "message" => "One Or More Errors Occured, Kindly Contact Support"
                );
                return $data;
            }
            
        } catch (Exception $e) {
            
            $data = array(
                "type" => "error",
                "message" => $e->getMessage()
                );
            return $data;
        }

    }









//Email Activation Link Request
    public function activation_link($data = array())
    {
        
        try {
            
            $query = "SELECT * FROM " . $this->u_table ." WHERE email = :email || uniqueid = :uniqueid LIMIT 1";
            $check = $this->checker($data, $query);

            if ($check == true) {

                $e = array("uniqueid" => $check['uniqueid'], );

                $query1 = "SELECT * FROM ". $this->u_table .", ". $this->p_table ." WHERE ". $this->u_table .".uniqueid = :uniqueid AND ". $this->p_table .".uniqueid = :uniqueid LIMIT 1";

                $g = $this->fetch_row($e, $query1);

//Send Email Alert To User
                Mail::mailer('RegistrationAlert')->request_link($g);

//Record Activity
                $info = array('id' => $g['uniqueid'], 'username' => $g['username'], 'details' => $g['username']." Requested Activation Link", ); 

                ModelFactory::model('Admin')->record_activity($info);

               $data = array(
                    "type" => "success",
                    "message" => "Successful: You Should Get A Message In Your Email Inbox Or Spam Folder Shortly, Follow The Link To Continue!"
                );
                return $data;

            }else { 

            $data = array(
                "type" => "error",
                "message" => "Whoops: User Record Not Found",
                );
            return $data;

             }

        } catch (Exception $e) {
            $data = array(
                "type" => "error",
                "message" => $e->getMessage()
                );
            return $data;
        }

    }












//Submit CV For Employment
    public function join_team($data = array())
    {

    $d = array('email' => $data['email'], );

        try {
            $query = "SELECT * FROM ". $this->car_table ." WHERE email = :email LIMIT 1";

            $check = $this->checker($d, $query);

            if ($check == false) {
                // code...

                $query = "INSERT INTO ". $this->car_table ." (fname, lname, email, phone, role, cv, details, ip, user_agent) VALUES (:fname, :lname, :email, :phone, :role, :cv, :details, :ip, :user_agent)";

                $this->insert($data, $query);

//Send Email Alert To User

            Mail::mailer('CareerAlert')->new_member($data);

//Record Activity
            $info = array('id' => $data['fname'], 'username' => $data['fname'], 'details' => $data['fname']." Submitted CV", );

            ModelFactory::model('Admin')->record_activity($info);

                $data = array(
                    "type" => "success",
                    "message" => "Thanks: We Appreciate Your Interest In Working With Us, We Will Respond Shortly..."
                    ); 

                return $data;

            } else {

                $data = array(
                    "type" => "error",
                    "message" => "Whoops: Your CV Is Under Review, Keep An Eye On Your Email For Update..."
                    ); 

                return $data;
                }
            } catch (Exception $e) {

                 $data = array(
                    "type" => "error",
                    "message" => $e->getMessage()
                    ); 
                return $data;  
            }
    }








//Configure Application Currency
 public function message_enquiry($data = array())
    {

        $d = array('email' => $data['email'], 'subject' => $data['subject'], );

        try {
            $query = "SELECT * FROM ". $this->msg_table ." WHERE email = :email AND subject = :subject LIMIT 1";

            $check = $this->checker($d, $query);

            if ($check == false) {
                // code...
                $query = "INSERT INTO ". $this->msg_table ." (fname, lname, email, phone, subject, issue, dept, details, ip, user_agent) VALUES (:fname, :lname, :email, :phone, :subject, :issue, :dept, :details, :ip, :user_agent)";

                $this->insert($data, $query);

//Record Activity
                $info = array('id' => $data['fname'], 'username' => $data['fname'], 'details' => $data['fname']." Sent us a Message", );

                ModelFactory::model('Admin')->record_activity($info);

                $data = array(
                    "type" => "success",
                    "message" => "Thank You: Your Message Has Been Received Successfully And Will Be Reviewed."
                );
                return $data;

            } else { 

                $data = array(
                    "type" => "error",
                    "message" => "Whoops: You Submiited This Message Previously, Retry After Sometime."
                );
                return $data;
            }

            } catch (Exception $e) {

                 $data = array(
                    "type" => "error",
                    "message" => $e->getMessage()
                    ); 
                return $data;  
            }
    }











 public function user_subscribe($data = array())

    {
        try {

            $checkvalue = array("email" => $data['email'], );

            $query = "SELECT * FROM " . $this->sub_table ." WHERE email = :email LIMIT 1";

            $check = $this->checker($checkvalue, $query);

            if ($check == false) {

                $query = "INSERT INTO ". $this->sub_table ." (email, type, ip, user_agent) VALUES (:email, :type, :ip, :user_agent)";

                $this->insert($data, $query);           

        //Send Email Alert To User

                Mail::mailer('SubscriptionAlert')->new_member($data);

        //Record Activity

                $info = array('id' => $data['email'], 'username' => $data['email'], 'details' => substr($data['email'], 0,5)." Just Subscribed", ); 

                ModelFactory::model('Admin')->record_activity($info);

                $res = array(

                    "type" => "success",

                    "message" => "Congratulations: You Successfully Subscribed To Newsletters!",
                );

                return $res;

            } else{
                $c = array("email" => $data['email'], "status" => "Unactive");

                $query = "SELECT * FROM ".$this->sub_table." WHERE email = :email AND status = :status LIMIT 1";
                $check = $this->fetch_row($c, $query);

                if ($check['status'] == "Unactive") {

                    $d = array("email" => $data['email'], "status" => "Active");
                    $query = "UPDATE ". $this->sub_table ." SET `status` = :status WHERE `email` = :email LIMIT 1 ";

                    $this->update($d, $query);

                //Record Activity
                    $info = array('id' => $data['email'], 'username' => $data['email'], 'details' => substr($data['email'], 0,5)." Subscribed Newsletter", ); 

                    ModelFactory::model('Admin')->record_activity($info);

                    $res = array(

                        "type" => "success",
                        "message" => "Good Job: You Re-activated Your Newsletter Subscription.",
                    );

                    return $res;

                }else{

                    $res = array(

                        "type" => "error",
                        "message" => "Whoops: You Previously Subscribed, You Can't Subscribe Twice...",
                    );

                    return $res;
                }
            }
                      
          } catch (Exception $e) {

            $data = array(

                    "type" => "error",
                    "message" => $e->getMessage()

                ); 
                return $data;
          }          

    }






//Unsubscribe Newsletter
    public function user_unsubscribe($data) 
    {

    try {

        $checkvalue = array("email" => $data, );
        $d = array("status" => "Unactive",  "email" => $data, );

        $query = "SELECT * FROM " . $this->sub_table ." WHERE email = :email LIMIT 1";

        $check = $this->checker($checkvalue, $query);

        if ($check == true) {

            $query = "UPDATE ". $this->sub_table ." SET `status` = :status WHERE `email` = :email LIMIT 1 ";

            $this->update($d, $query);

        //Record Activity

            $info = array('id' => $data, 'username' => $data, 'details' => substr($data, 0,5)." UnSubscribed Newsletter", ); 

            ModelFactory::model('Admin')->record_activity($info);

            $res = array(

                "type" => "success",
                "message" => "Oh No: We Are Not Happy Seeing You Go, You Have Been Removed From Our Mailing List.",
            );

            return $res;

        } else{

            $res = array(

                "type" => "error",
                "message" => "Whoops: Sorry, You Are Not Subscribed To Any Of Our Services...",

            );

            return $res;
        }
        } catch (Exception $e) {

            $data = array(

                    "type" => "error",
                    "message" => $e->getMessage()

                ); 
            return $data;
        }                  

    }






//WaitList For New Product OR Service
 public function user_waitlist($data = array())

    {
        try {

            $checkvalue = array("email" => $data['email'], );

            $query = "SELECT * FROM " . $this->sub_table ." WHERE email = :email LIMIT 1";

            $check = $this->checker($checkvalue, $query);

            if ($check == false) {

                $query = "INSERT INTO ". $this->sub_table ." (email, type, ip, user_agent) VALUES (:email, :type, :ip, :user_agent)";

                $this->insert($data, $query); 

        //Record Activity

                $info = array('id' => $data['email'], 'username' => $data['email'], 'details' => substr($data['email'], 0,5)." Just Subscribed", ); 

                ModelFactory::model('Admin')->record_activity($info);

                $res = array(

                    "type" => "success",

                    "message" => "Congratulations: You Successfully Subscribed To Wait List!",
                );

                return $res;

            } else{

                    $res = array(

                        "type" => "error",
                        "message" => "Whoops: You Previously Joined, You Can't Join Twice...",

                    );

                    return $res;
                }
                      
          } catch (Exception $e) {

            $data = array(

                    "type" => "error",
                    "message" => $e->getMessage()

                ); 
                return $data;
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



















//End of File
}
