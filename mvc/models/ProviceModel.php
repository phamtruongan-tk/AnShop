<?php 
    class Provice extends DB{
        public function getProvices(){
            $query ="SELECT * FROM devvn_tinhthanhpho";
            return mysqli_query($this->con,$query);
        }
        public function getNameById($provice_id){
            $query ="SELECT name FROM devvn_tinhthanhpho WHERE matp ='$provice_id'";
            return mysqli_query($this->con,$query);
        }
    }
?>