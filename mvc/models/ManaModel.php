<?php
    class Mana extends DB{
        public function add($admin_name,$admin_email, $admin_password){
            $query = "INSERT INTO admin( admin_name, admin_email, admin_password) VALUES ('$admin_name','$admin_email','$admin_password') ";
            return mysqli_query($this->con, $query);
        }
        
        public function getAdmin($from,$CatePerPage){
            $query = "SELECT * FROM admin ORDER BY admin_id DESC LIMIT $from,$CatePerPage ";
            return mysqli_query($this->con, $query);
        }
        public function getNumberAdmin(){
            $query = "SELECT 'id' FROM admin";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function getAdmins(){
            $query = "SELECT * FROM admin";
            return mysqli_query($this->con, $query);
        }
        public function getAdminbyEmail($email){
            $query = "SELECT * FROM admin WHERE admin_email = '$email'";
            return mysqli_query($this->con,$query);
        }
        
    }

?>