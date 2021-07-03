<?php
    class Slide extends DB{
        public function add($new_name_img,$slide_link,$slide_des,$slide_status){
            $query = "INSERT INTO slide (slide_img,slide_link,slide_des,slide_status) VALUES ('$new_name_img','$slide_link','$slide_des','$slide_status')";
            mysqli_query($this->con, $query);
        }
        public function getSlide($form,$SlidePerPage){
            $query = "SELECT * FROM slide ORDER BY slide_id DESC LIMIT $form,$SlidePerPage ";
            return mysqli_query($this->con, $query);
        }
        public function getNumberSlide(){
            $query = "SELECT 'id' FROM slide";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function getSlidebyId($slide_id){
            $query = "SELECT * FROM slide WHERE slide_id = '$slide_id' ";
            return mysqli_query($this->con, $query);
        }
        public function update($new_name_img, $slide_link,$slide_des,$slide_status, $slide_id){
            $query = "UPDATE slide SET slide_img='$new_name_img',slide_link='$slide_link',slide_des = '$slide_des',slide_status = '$slide_status' WHERE slide_id = '$slide_id' ";
            return mysqli_query($this->con, $query);
        }
        public function delete($slide_id){
            $query = "DELETE FROM slide WHERE slide_id = '$slide_id' ";
            return mysqli_query($this->con, $query);
        }
        public function unactiveslide($slide_id){
            $query = "UPDATE slide SET slide_status='0' WHERE slide_id = '$slide_id' ";
            return mysqli_query($this->con, $query);
        }
        public function activeslide($slide_id){
            $query = "UPDATE slide SET slide_status='1' WHERE slide_id = '$slide_id' ";
            return mysqli_query($this->con, $query);
        }
        // frontend
        public function getSlides(){
            $query = "SELECT * FROM slide ";
            return mysqli_query($this->con, $query);
        }

    }

?>