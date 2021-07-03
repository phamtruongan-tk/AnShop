<?php 
    class BillDetail extends DB{
        public function add($qty, $price, $product_id, $id){
            $query = 
            " INSERT INTO bill_detail( bill_detail_qty, bill_detail_price, id_product, id_bill ) VALUES ('$qty','$price','$product_id','$id');
            ";
            mysqli_query($this->con, $query);
        }
        public function getBillDetailByIdBill($bill_id){
            $query ="SELECT bill_detail.*, product.product_name, product.product_img FROM bill_detail INNER JOIN product ON bill_detail.id_product=product.product_id WHERE bill_detail.id_bill = '$bill_id'";
            return mysqli_query($this->con, $query);
        }
        public function delete($bill_id){
            $query ="DELETE FROM bill_detail WHERE id_bill= '$bill_id'";
            mysqli_query($this->con,$query);
        }
    }
?>