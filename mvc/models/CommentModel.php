<?php 
    class Comment extends DB{
        public function add($comment_name,$comment_email, $comment_content,$product_id){
            $query = "INSERT INTO comment(comment_name,comment_email, comment_content, product_id) VALUES ('$comment_name','$comment_email','$comment_content','$product_id')";
            mysqli_query($this->con, $query);
            return mysqli_insert_id($this->con);
        }
        public function getComment($comment_id){
            $query = "SELECT * FROM comment WHERE comment_id = '$comment_id'";
            return mysqli_query($this->con, $query);
        }
        public function getComments($product_id){
            $query ="SELECT * FROM comment WHERE product_id ='$product_id' ORDER BY comment_id ASC ";
            return mysqli_query($this->con,$query);
        }
        public function delete($comment_id){
            $query = "DELETE FROM comment WHERE comment_id = '$comment_id'";
            mysqli_query($this->con,$query);
        }
    }
?>