<?php
namespace Config;
require 'vendor/autoload.php';

use PDO;

class Db
{
	private $server = "mysql:host=localhost;dbname=advance_cv";

    private $user = "root";

    private $pass = "1234567890";

    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $dbcon;

    /* Function for opening connection */
    public function openConnection()
    {
        try {
            $this->dbcon = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->dbcon;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
	  /* Function for closing connection */
    public function dbclose()
    {
        $dbcon = null;
    }



	/**
     * End Of File.
     */
}