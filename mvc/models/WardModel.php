<?php 
    class Ward extends DB{
        public function getWards($maqh){
            $query ="SELECT * FROM devvn_xaphuongthitran WHERE maqh = '$maqh'";
            return mysqli_query($this->con,$query);
        }
        public function getNameById($ward_id){
            $query ="SELECT name FROM devvn_xaphuongthitran WHERE xaid ='$ward_id'";
            return mysqli_query($this->con,$query);
        }
    }
?>