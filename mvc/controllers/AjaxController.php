<?php
    class Ajax extends Controller{
        public function Default(){

        }
        public function search(){
            $output = '';
            $keyw =$this->changeTitle($_POST['keyword']);
            if($keyw!==''){
                $result = $this->Model('Product')->search($keyw);
                if(mysqli_fetch_assoc($result)==''){
                    $output ='<tr class="even pointer">
                                <td colspan=6> không tìm thấy sản phẩm <td>
                            </tr>';
                }else{
                    foreach($result as $row){
                        if($row['product_featured']==1){
                            $featured = 'Có';
                        }else{
                            $featured = 'Không';
                        }
                        if($row['product_status']==1){
                            $status = 'Có';
                        }else{
                            $status = 'Không';
                        }
                        $output .= "
                            <tr class='even pointer'>
                                <td class=' '>".$row['product_id']."</td>
                                <td class=' '>".$row['product_name']." </td>
                                <td class=' '> <img style='width:100px' src='public/backend/uploads/product/".$row['product_img']."' alt=''> </td>
                                <td class=' '>".number_format($row['product_price'])." </td>
                                <td class=' '>".number_format($row['product_promotion'])."</td>
                                <td class=' '>".$featured."</td>
                                <td class=' '>".$status."</td>
                                <td class=' last'>
                                    <a href='admin/viewproduct/".$row['product_id']."' class='btn btn-warning btn-sm'><i class='fas fa-list'></i></a>
                                    <a href='admin/editproduct/".$row['product_id']."' class='btn btn-success btn-sm'><i class='far fa-edit'></i></a>
                                    <a  onclick= return confirm() href='admin/deleteproduct/".$row['product_id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a>
                                </td>
                            </tr>   
                        ";
                        
                    }
                }
                echo $output;
            
            }
            

        }
        public function readMore($cate_id,$page){
            $proPerPage = 8;
            $from =  $proPerPage * ($page-1);
            $products = $this->Model('Product')->readMore($cate_id,$from,$proPerPage);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $output= '';
            foreach($products as $product){
                $product_img = $product['product_img'];
                $product_name = $product['product_name'];
                $product_price = $product['product_price'];
                $product_promotion = $product['product_promotion'];
                $sale = round(($product_price-$product_promotion)/$product_price*100);

                if($product_price == $product_promotion){
                    $div_price = "
                        <div class='price'></div>
                    ";
                }else{
                    $div_price = "
                        <div class='price'><del>".number_format($product_price,0)."</del>đ</div>
                    ";
                }
                if($sale>=10){
                    $div_sale = "
                        <div class='sale' >Giảm ".$sale." %</div>
                    ";
                }else{
                    $div_sale = '';
                }


                $output =  "
                <div class='col-lg-3 col-md-4 col-6 my-3 xoay'>
                    <a href='home/detail/".$product['product_id']."' class='item-product' style='width:100%'>
                        <div class='wp-img'>
                            <img src='public/backend/uploads/product/".$product_img."' alt=''>
                        </div>
                        <div class='inf'>
                            <div class='name'>".$product_name."</div>
                            ".$div_price."
                            <div class='promotion'>".number_format($product_promotion)."đ</div>
                        </div> 
                        ".$div_sale."
                    </a>
                    <div class='cart-add'>
                        <a href='cart/store/".$product['product_id']."'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </div> 
                </div>
                ";
                echo $output;
            }

        }
        public function readMoreDecrease($cate_id,$page){
            $proPerPage = 8;
            $from =  $proPerPage * ($page-1);
            $products = $this->Model('Product')->readMoreDecrease($cate_id,$from,$proPerPage);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $output= '';
            foreach($products as $product){
                $product_img = $product['product_img'];
                $product_name = $product['product_name'];
                $product_price = $product['product_price'];
                $product_promotion = $product['product_promotion'];
                $sale = round(($product_price-$product_promotion)/$product_price*100);

                if($product_price == $product_promotion){
                    $div_price = "
                        <div class='price'></div>
                    ";
                }else{
                    $div_price = "
                        <div class='price'><del>".number_format($product_price,0)."</del>đ</div>
                    ";
                }
                if($sale>=10){
                    $div_sale = "
                        <div class='sale' >Giảm ".$sale." %</div>
                    ";
                }else{
                    $div_sale = '';
                }


                $output =  "
                <div class='col-lg-3 col-md-4 col-6 my-3 xoay'>
                    <a href='home/detail/".$product['product_id']."' class='item-product' style='width:100%'>
                        <div class='wp-img'>
                            <img src='public/backend/uploads/product/".$product_img."' alt=''>
                        </div>
                        <div class='inf'>
                            <div class='name'>".$product_name."</div>
                            ".$div_price."
                            <div class='promotion'>".number_format($product_promotion)."đ</div>
                        </div>  
                        ".$div_sale."
                    </a>
                    <div class='cart-add'>
                        <a href='cart/store/".$product['product_id']."'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </div>
                </div>
                ";
                echo $output;
            }

        }
        public function readMoreAscending($cate_id,$page){
            $proPerPage = 8;
            $from =  $proPerPage * ($page-1);
            $products = $this->Model('Product')->readMoreAscending($cate_id,$from,$proPerPage);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $output= '';
            foreach($products as $product){
                $product_img = $product['product_img'];
                $product_name = $product['product_name'];
                $product_price = $product['product_price'];
                $product_promotion = $product['product_promotion'];
                $sale = round(($product_price-$product_promotion)/$product_price*100);

                if($product_price == $product_promotion){
                    $div_price = "
                        <div class='price'></div>
                    ";
                }else{
                    $div_price = "
                        <div class='price'><del>".number_format($product_price,0)."</del>đ</div>
                    ";
                }
                if($sale>=10){
                    $div_sale = "
                        <div class='sale' >Giảm ".$sale." %</div>
                    ";
                }else{
                    $div_sale = '';
                }


                $output =  "
                <div class='col-lg-3 col-md-4 col-6 my-3 xoay'>
                    <a href='home/detail/".$product['product_id']."' class='item-product' style='width:100%'>
                        <div class='wp-img'>
                            <img src='public/backend/uploads/product/".$product_img."' alt=''>
                        </div>
                        <div class='inf'>
                            <div class='name'>".$product_name."</div>
                            ".$div_price."
                            <div class='promotion'>".number_format($product_promotion)."đ</div>
                        </div>
                        ".$div_sale."
                    </a>
                    <div class='cart-add'>
                        <a href='cart/store/".$product['product_id']."'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </div>
                </div>
                ";
                echo $output;
            }

        }
        public function loadDistrict($matp){
            $districts = $this->Model('District')->getDistricts($matp);
            $districts = mysqli_fetch_all($districts,MYSQLI_ASSOC);
            $output="<option selected>Chọn Quận/Huyện</option>";
            foreach($districts as $district){
                $val = $district['maqh'];
                $name = $district['name'];
                $output .="<option value='".$val."'>".$name."</option>";
            }
            echo $output;
        }
        public function loadWard($maqh){
            $wards = $this->Model('Ward')->getWards($maqh);
            $wards = mysqli_fetch_all($wards,MYSQLI_ASSOC);
            $output="<option selected>Chọn xã/phường/thị trấn</option>";
            foreach($wards as $ward){
                $val = $ward['xaid'];
                $name = $ward['name'];
                $output .="<option value='".$val."'>".$name."</option>";
            }
            echo $output;
        }
        public function loadbilldetail($bill_id){
            $bill_details = $this->Model('BillDetail')->getBillDetailByIdBill($bill_id);
            $bill_details = mysqli_fetch_all($bill_details,MYSQLI_ASSOC);
            $total = 0;
            $output ='';
            foreach($bill_details as $bill_detail ){
                $total +=$bill_detail['bill_detail_price']*$bill_detail['bill_detail_qty'];
                $output .='
                    <div class="detail">
                        <table class="table table-borderless" >
                            <tbody>
                            <tr>
                                <td><img src="public/backend/uploads/product/'.$bill_detail['product_img'].'" alt=""></td>
                                <td>'.$bill_detail['product_name'].'</td>
                                <td>Đơn giá: '.number_format($bill_detail['bill_detail_price']).' <sup>đ</sup></td>
                                <td>Số lượng: '.$bill_detail['bill_detail_qty'].'</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                ';
            }
            echo $output.'Tổng cộng: '.number_format($total);
        }
        public function searchBill(){
            $output ='';
            $keyw = $this->changeTitle($_POST['keyword']);
            if($keyw!==''){
                $result = $this->Model('Bill')->search($keyw);
                $result= mysqli_fetch_all($result,MYSQLI_ASSOC);
                if(empty($result)){
                    $output = 
                    '<tr class="even pointer">
                        <td colspan=8> không tìm thấy đơn hàng <td>
                    </tr>'
                    ;
                }else{
                    foreach($result as $bill){
                        $output.="
                        <tr class='even pointer'>
                        <td class=' '>".$bill['bill_id']."</td>
                        <td class=' '>". $bill['bill_code'] ." </td>
                        <td class=' '>". $bill['bill_name'] ." </td>
                        <td class=' '>". $bill['bill_email'] ." </td>
                        <td class=' '>". $bill['bill_phone'] ." </td>
                        <td class=' '>". $bill['bill_address'] ." </td>
                        <td class=' '>". $bill['bill_date'] ." </td>
                        <td class=' '>". $bill['bill_status'] ." </td>
                        
                    
                        <td class=' last'>
                            <a href='admin/viewbill/". $bill['bill_id'] ."' class='btn btn-warning btn-sm'>Xem</a>
                            <a  onclick='return confirm('Bạn có muốn xóa đơn hàng này không ?')' href='admin/deletebill/". $bill['bill_id'] ."' class='btn btn-danger btn-sm'>Xóa</a>
                            <a onclick='return confirm('Thay đổi trạng thái đơn hàng về đang xử lý ?')' href='admin/updatestatusProcessing/".$bill['bill_id']."' class='btn btn-info btn-sm'>Đang xử lý</a>
                            <a onclick='return confirm('Thay đổi trạng thái đơn hàng về đã nhận ?')' href='admin/updatestatusReceived/".$bill['bill_id'] ."' class='btn btn-dark btn-sm'>Đã nhận</a>
                            <a onclick='return confirm('Thay đổi trạng thái đơn hàng về đã giao  ?')' href='admin/updatestatusDelivered/" .$bill['bill_id']."' class='btn btn-success btn-sm'>Đã giao</a>
                        </td>
                    </tr>
                        ";
                    }
                }
                
                echo $output;   
            }
            
        }
        public function suggestions(){
            $output = '<h6 >Sản phẩm gợi ý</h6>';
            $keyw = $this->changeTitle($_POST['keyword']);
            if($keyw!==''){
               $result =  $this->Model('Product')->suggestions($keyw);
               $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
               if(empty($result)){
                    $output = '<h6>Không tìm thấy sản phẩm</h6>';
               }else{
                   foreach($result as $product){
                       if($product['product_price']==$product['product_promotion']){
                            $div_price = "<div class='price'></div>";
                       }else{
                            $div_price = "<div class='price'><del>".number_format($product['product_price'])."đ</del></div>";
                       }
                        $output .= "
                        <ul >
                            <li>
                                <a href='home/detail/".$product['product_id']."'>
                                    <img src='public/backend/uploads/product/".$product['product_img']."' alt=''>
                                    <div class='inf'>
                                        <div class='name'>".$product['product_name']."</div>
                                        ".$div_price."
                                        <div class='promotion'>".number_format($product['product_promotion'])."đ </div>
                                    </div>
                                </a>
                                <hr>
                            </li> 
                        </ul>
                        ";
                   }
               }
               echo $output;
            }
        }
        public function comment($comment_content, $product_id){
            if(isset($_SESSION['user'])){
                $comment_id = $this->Model('Comment')->add($_SESSION['user'],$_SESSION['user_email'], $comment_content,$product_id);
                $comment = $this->Model('Comment')->getComment($comment_id);
                $comment = mysqli_fetch_array($comment);
                $output = '
                <div class="show-rate">
                    <hr>
                    <span class="name">'.$comment['comment_name'].'</span><span class="time">'.$comment['comment_date'].'</span>
                    <div class="content">'.$comment_content.'</div>
                    <div class="action">
                        <i class="fas fa-thumbs-up"></i>Hữu ích?
                        <a onclick="return confirm()" href="rate/delete/'.$comment['comment_id'].'" class="delete-comment">Xóa</a>
                    </div>
                </div>
                ';
            }else{
                $output = '<div class ="alert alert-danger text-center"> Bạn chưa đăng nhập </div>';
            }
           
            echo $output;

        }
    }
?>