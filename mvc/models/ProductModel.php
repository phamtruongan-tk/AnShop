<?php
    class Product extends DB{
        public function add($product_name,$product_slug,$product_des,$product_price,$product_promotion,$product_featured,$product_status,$img_new_name,$cate_id){
            $query = "INSERT INTO product (product_name,product_slug,product_des,product_price,product_promotion,product_featured,product_status,product_img,cate_id) VALUES ('$product_name','$product_slug','$product_des','$product_price','$product_promotion','$product_featured','$product_status','$img_new_name','$cate_id')";
            mysqli_query($this->con, $query);   
        }
        public function getProduct($from,$ProductPerPage){
            $query = "SELECT * FROM product ORDER BY product_id DESC LIMIT $from,$ProductPerPage ";
            return  mysqli_query($this->con, $query);
        }
        public function getProductFilter($cate_id,$from,$ProductPerPage){
            $query = "SELECT * FROM product WHERE cate_id = $cate_id ORDER BY product_id DESC LIMIT $from,$ProductPerPage  " ;
            return  mysqli_query($this->con, $query);
        }
        public function getNumberProduct(){
            $query = "SELECT 'id' FROM product";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function getNumberProductFilter($cate_id){
            $query = "SELECT 'id' FROM product WHERE cate_id = $cate_id";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function getProductbyId($product_id){
            $query = "SELECT * FROM product WHERE product_id = '$product_id'";
            return mysqli_query($this->con, $query);
        }
        public function update($product_id,$product_name,$product_slug,$product_des,$product_price,
        $product_promotion,$product_featured,$product_status,$img_new_name,$cate_id){
            $query = "UPDATE product SET product_name='$product_name',product_slug='$product_slug',product_des = '$product_des',product_price='$product_price',product_promotion='$product_promotion',product_featured='$product_featured',product_status='$product_status',product_img='$img_new_name',cate_id='$cate_id' WHERE product_id = '$product_id' ";
            return mysqli_query($this->con, $query);
        }
        public function delete($product_id){
            $query = "DELETE FROM product WHERE product_id = '$product_id' ";
            return mysqli_query($this->con, $query);
        }

        public function search($keyw){
            $query = "SELECT * FROM product WHERE product_slug LIKE '%$keyw%' ";
            return mysqli_query($this->con, $query);
        }
        public function unactiveProduct($product_id){
            $query = "UPDATE product SET product_status='0' WHERE product_id = '$product_id' ";
            return mysqli_query($this->con, $query);
        }
        public function activeProduct($product_id){
            $query = "UPDATE product SET product_status='1' WHERE product_id = '$product_id' ";
            return mysqli_query($this->con, $query);
        }
        // frontend
        public function getCheap(){
            $query = "SELECT * FROM product WHERE product_featured = '1' AND product_status = '1' ORDER BY product_promotion ASC LIMIT 12 ";
            return mysqli_query($this->con, $query);
        }
        public function getMostView(){
            $query = "SELECT * FROM product WHERE product_status = '1' ORDER BY product_view DESC LIMIT 15 ";
            return mysqli_query($this->con, $query); 
        }
        public function getProductByCate($cate_id){
            $query = "SELECT product.*, categories.cate_name FROM product INNER JOIN categories ON product.cate_id = categories.cate_id WHERE product.cate_id = '$cate_id' AND product.product_status = '1' ORDER BY product.product_id DESC LIMIT 8";
            return  mysqli_query($this->con, $query);
        }
        public function readMore($cate_id, $from,$ProductPerPage){
            $query = "SELECT * FROM product   WHERE cate_id = '$cate_id' AND product_status = '1' ORDER BY product_id DESC LIMIT $from,$ProductPerPage ";
            return  mysqli_query($this->con, $query);
        }

        // giam dan
        public function getProductByCateDecrease($cate_id){
            $query = "SELECT product.*, categories.cate_name FROM product INNER JOIN categories ON product.cate_id = categories.cate_id WHERE product.cate_id = '$cate_id' AND product.product_status = '1' ORDER BY product.product_promotion DESC LIMIT 8";
            return  mysqli_query($this->con, $query);
        }
        public function readMoreDecrease($cate_id, $from,$ProductPerPage){
            $query = "SELECT * FROM product   WHERE cate_id = '$cate_id' AND product_status = '1' ORDER BY product_promotion DESC LIMIT $from,$ProductPerPage ";
            return  mysqli_query($this->con, $query);
        }
        //tang dan
        public function getProductByCateAscending($cate_id){
            $query = "SELECT product.*, categories.cate_name FROM product INNER JOIN categories ON product.cate_id = categories.cate_id WHERE product.cate_id = '$cate_id'  AND product.product_status = '1' ORDER BY product.product_promotion ASC LIMIT 8";
            return  mysqli_query($this->con, $query);
        }
        public function readMoreAscending($cate_id, $from,$ProductPerPage){
            $query = "SELECT * FROM product   WHERE cate_id = '$cate_id' AND product_status = '1' ORDER BY product_promotion ASC LIMIT $from,$ProductPerPage ";
            return  mysqli_query($this->con, $query);
        }
        // chi tiet san pham
        public function getDetail($product_id){
            $query ="SELECT product.*, categories.cate_name,categories.cate_id FROM product INNER JOIN categories ON product.cate_id = categories.cate_id WHERE product.product_id = '$product_id'";
            return mysqli_query($this->con, $query);
        }
        public function getRelate($cate_id,$product_id){
            $query ="SELECT * FROM product WHERE cate_id = '$cate_id' AND (NOT product_id = '$product_id') LIMIT 6";
            return mysqli_query($this->con, $query);
        }
        public function suggestions($keyw){
            $query = "SELECT * FROM product  WHERE product_slug LIKE '%$keyw%' AND product_status ='1' ORDER BY product_promotion ASC LIMIT 5 ";
            return mysqli_query($this->con, $query);
        }
        public function searchSell($keyw){
            $query = "SELECT * FROM product WHERE product_slug LIKE '%$keyw%' AND product_status ='1'";
            return mysqli_query($this->con, $query);
        }
        public function updateView($product_id,$view){
            $query = "UPDATE product  SET product_view = '$view' WHERE product_id= '$product_id'";
            return mysqli_query($this->con,$query);
        }
    }

?>