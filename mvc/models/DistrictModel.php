<?php 
    class District extends DB{
        public function getDistricts($matp){
            $query ="SELECT * FROM devvn_quanhuyen WHERE matp = '$matp'";
            return mysqli_query($this->con,$query);
        }
        public function getNameById($district_id){
            $query ="SELECT name FROM devvn_quanhuyen WHERE maqh ='$district_id'";
            return mysqli_query($this->con,$query);
        }
    }
?>