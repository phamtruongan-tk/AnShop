<?php
    class User extends DB{
        public function getUserbyEmail($email){
            $query = "SELECT * FROM users WHERE user_email = '$email'";
            return mysqli_query($this->con,$query);
        }
        public function add($name,$slug, $email ,$password){
            $query = "INSERT INTO users (user_name,user_slug, user_email, user_password) VALUES ('$name','$slug','$email','$password')";
            mysqli_query($this->con,$query);
        }
        public function getUser($from, $AdminPerPage){
            $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT $from,$AdminPerPage ";
            return mysqli_query($this->con, $query);
        }
        public function getNumberUser(){
            $query = "SELECT 'user_id' FROM users";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function delete($id){
            $query = "DELETE FROM users WHERE user_id ='$id'";
            mysqli_query($this->con,$query);
        }
        public function changePass($user_email,$new_pass){
            $query = "UPDATE users SET user_password = '$new_pass' WHERE user_email = '$user_email'";
            return mysqli_query($this->con,$query);
        }

    }

?>