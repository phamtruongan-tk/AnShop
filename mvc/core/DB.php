<?php
    class DB{
        protected $con;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password ="";
        protected $dbname = "db_an_shop";
        function __construct(){
            $this->con = mysqli_connect($this->servername,$this->username, $this->password, $this->dbname);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con,"SET NAMES 'utf-8'");
        }
    }
?>