<?php

class Connection {

    private $servername;
    private $user;
    private $pass;
    private $dbname;

    function connect() {
        $this->servername = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'topseller';

        try {
            $conn = new mysqli($this->servername, $this->user, $this->pass, $this->dbname);
            //echo 'connected';
            return $conn;
        } catch (Exception $e){
            echo 'error: ' . $e;
        }    
    }



}
// testing connection --
//  $db = new Connection();
// $db->connect();

?>