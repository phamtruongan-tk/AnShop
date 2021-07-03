<?php 
    class Bill extends DB{
        public function getBills($from, $BillPerPage){
            $query ="SELECT * FROM bill ORDER BY bill_id DESC LIMIT $from,$BillPerPage ";
            return mysqli_query($this->con,$query);
        }
        public function getNumberBill(){
            $query = "SELECT 'id' FROM bill";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_all($result);
        }
        public function updatestatusReceived($bill_id){
            $query ="UPDATE bill SET bill_status= 'Đã nhận' WHERE bill_id = '$bill_id'";
            return mysqli_query($this->con,$query);
        }
        public function updatestatusDelivered($bill_id){
            $query ="UPDATE bill SET bill_status= 'Đã giao' WHERE bill_id = '$bill_id'";
            return mysqli_query($this->con,$query);
        }
        public function updatestatusProcessing($bill_id){
            $query ="UPDATE bill SET bill_status= 'Đang xử lý' WHERE bill_id = '$bill_id'";
            return mysqli_query($this->con,$query);
        }
        public function search($keyw){
            $query ="SELECT * FROM bill WHERE bill_slug LIKE  '%".$keyw."%'";
            return mysqli_query($this->con,$query);
        }

        // frontend
        public function add($bill_code , $bill_name, $bill_slug, $bill_phone, $bill_email, $bill_address, $bill_note, $bill_status){
            $query = 
            " INSERT INTO bill(bill_code, bill_name, bill_slug, bill_phone, bill_email, bill_address, bill_note, bill_status)
            VALUES ('$bill_code','$bill_name','$bill_slug','$bill_phone','$bill_email','$bill_address','$bill_note','$bill_status')
            ";
            mysqli_query($this->con, $query);
            return mysqli_insert_id($this->con);
        }
        public function getBillsByUser($user){
            $query ="SELECT * FROM bill WHERE bill_email = '$user'";
            return mysqli_query($this->con,$query);
        }
        public function delete($bill_id){
            $query ="DELETE FROM bill WHERE bill_id ='$bill_id'";
            mysqli_query($this->con,$query);
        }
    }

?>