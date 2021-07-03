<?php
    class Cate extends DB{
        public function add($cate_name,$new_name_img,$cate_des,$cate_status){
            $query = "INSERT INTO categories (cate_name,cate_img, cate_des,cate_status) VALUES ('$cate_name','$new_name_img','$cate_des','$cate_status')";
            mysqli_query($this->con, $query);
        }
        public function getCate($from,$CatePerPage){
            $query = "SELECT * FROM categories ORDER BY cate_id DESC LIMIT $from,$CatePerPage ";
            return mysqli_query($this->con, $query);
        }
        public function getNumberCate(){
            $query = "SELECT 'id' FROM categories";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function getCatebyId($cate_id){
            $query = "SELECT * FROM categories WHERE cate_id = '$cate_id' ";
            return mysqli_query($this->con, $query);
        }
        public function updateCateId($cate_id,$cate_name,$new_name_img, $cate_des,$cate_status){
            $query = "UPDATE categories SET cate_name='$cate_name',cate_img ='$new_name_img',cate_des='$cate_des',cate_status='$cate_status' WHERE cate_id = '$cate_id' ";
            return mysqli_query($this->con, $query);
        }
        public function delete($cate_id){
            $query = "DELETE FROM categories WHERE cate_id = '$cate_id' ";
            return mysqli_query($this->con, $query);
        }
        public function getCates(){
            $query = "SELECT * FROM categories";
            return mysqli_query($this->con, $query);
        }
        public function unactiveCate($cate_id){
            $query = "UPDATE categories SET cate_status='0' WHERE cate_id = '$cate_id' ";
            return mysqli_query($this->con, $query);
        }
        public function activeCate($cate_id){
            $query = "UPDATE categories SET cate_status='1' WHERE cate_id = '$cate_id' ";
            return mysqli_query($this->con, $query);
        }

        //  frontend
        public function getCates_5(){
            $query = "SELECT * FROM categories WHERE cate_status ='1' ORDER BY cate_id ASC  LIMIT 5 ";
            return mysqli_query($this->con, $query);
        }
        public function getCatesReadMore(){
            $query = "SELECT * FROM categories WHERE cate_status ='1' ORDER BY cate_id ASC LIMIT 5,100 ";
            return mysqli_query($this->con, $query);
        }

    }

?>