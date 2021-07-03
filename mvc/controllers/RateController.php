<?php 
    class Rate extends Controller{
        public function delete($comment_id){
            $this->Model('Comment')->delete($comment_id);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
?>