<?php 
    class Cart extends Controller {
        public function default(){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            return $this->ViewFrontend('master',[
                'page'=>'cart',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
            ]);
        }
        public function store($product_id){
            if(isset($_SESSION['user'])){
                $product = $this->Model('Product')->getProductbyId($product_id);
                $product = mysqli_fetch_array($product);
                if(empty($_SESSION['cart'][$_SESSION['user']])){
                    $product['qty']=1;
                    $_SESSION['cart'][$_SESSION['user']][$product_id] = $product;
                }else{
                    $product['qty']=$_SESSION['cart'][$_SESSION['user']][$product_id]['qty']+1;
                    $_SESSION['cart'][$_SESSION['user']][$product_id] = $product;
                }
                header('Location: '.$this->base_url .'/cart');
            }else{
                $_SESSION['mes']="<div class = 'text-center text-danger'>Đăng nhập trước khi thêm vào giỏ hàng</div>";
                header('Location: '.$this->base_url .'/home/login');
            }
           
            
        }
        public function buyNow($product_id){
            if(isset($_SESSION['user'])){
                $product = $this->Model('Product')->getProductbyId($product_id);
                $product = mysqli_fetch_array($product);
                if(empty($_SESSION['cart'][$_SESSION['user']])){
                    $product['qty']=1;
                    $_SESSION['cart'][$_SESSION['user']][$product_id] = $product;
                }else{
                    $product['qty']=$_SESSION['cart'][$_SESSION['user']][$product_id]['qty']+1;
                    $_SESSION['cart'][$_SESSION['user']][$product_id] = $product;
                }
                header('Location: '.$this->base_url .'/cart/order');
            }else{
                $_SESSION['mes']="<div class = 'text-center text-danger'>Đăng nhập trước khi thêm vào giỏ hàng</div>";
                header('Location: '.$this->base_url .'/home/login');
            }
        }
        public function delete($product_id){
            unset($_SESSION['cart'][$_SESSION['user']][$product_id]);
            header('Location: '.$this->base_url .'/cart/"');
        }
        public function update(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                foreach($_POST['qty'] as $product_id => $qty){
                    $_SESSION["cart"][$_SESSION['user']][$product_id]["qty"]= $qty;

                }
                header('Location: '.$this->base_url .'/cart');
            }
        }
        public function destroy(){
            unset($_SESSION['cart'][$_SESSION['user']]);
            header('Location: '.$this->base_url.'/cart');
        }
        public function order(){
            if(isset($_SESSION['user'])){
                $cates_5 = $this->Model('Cate')->getCates_5();
                $cates_read_more = $this->Model('Cate')->getCatesReadMore();
                $slides = $this->Model('Slide')->getSlides();
                $provices = $this->Model('Provice')->getProvices();
                return $this->ViewFrontend('master',[
                    'page'=>'order',
                    'cates_5'=>$cates_5,
                    'cates_read_more'=>$cates_read_more,
                    'slides'=>$slides,
                    'provices'=>$provices
                ]);
            }else{
                $_SESSION['mes']="<div class = 'text-center text-danger'>Đăng nhập trước khi mua hàng</div>";
                header('Location: '.$this->base_url .'/home/login');
            }
        }
        public function postOrder(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $bill_code = rand(0,10000);
                $bill_name = $_SESSION['user'];
                $bill_slug = $this->changeTitle($bill_name);
                $bill_phone = $_POST['phone'];
                $bill_email = $_SESSION['user_email'];

                $bill_provice = $this->Model('Provice')->getNameById($_POST['provice']); 
                $bill_provice = mysqli_fetch_assoc($bill_provice);
                $bill_provice = $bill_provice['name'];
                
                $bill_district = $this->Model('District')->getNameById($_POST['district']); 
                $bill_district = mysqli_fetch_assoc($bill_district);
                $bill_district = $bill_district['name'];

                $bill_ward = $this->Model('Ward')->getNameById($_POST['ward']); 
                $bill_ward = mysqli_fetch_assoc($bill_ward);
                $bill_ward = $bill_ward['name'];
                $bill_vallige = $_POST['vallige'];

                $bill_address = $bill_vallige.'-'.$bill_ward.'-'.$bill_district.'-'.$bill_provice;
                $bill_note = $_POST['note'];
                $bill_status = 'Đang xử lý';
                $id = $this->Model('Bill')->add($bill_code , $bill_name, $bill_slug, $bill_phone,$bill_email, $bill_address, $bill_note, $bill_status);
                
                foreach($_SESSION['cart'][$_SESSION['user']] as $product_id => $cart){
                    $qty= $cart['qty'];
                    $price = $cart['product_promotion'];
                    $this->Model('BillDetail')->add($qty, $price, $product_id, $id);
                }
                unset($_SESSION['cart'][$_SESSION['user']]);
                header('Location: '.$this->base_url .'/cart/yourorder');
            }
        }
        public function yourOrder(){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $bills = $this->Model('Bill')->getBillsByUser($_SESSION['user_email']);
            $bills = mysqli_fetch_all($bills,MYSQLI_ASSOC);
            return $this->ViewFrontend('master',[
                'page'=>'y-order',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'bills' =>$bills
            ]);
        }
        public function destroyOrder($bill_id){
            $this->Model('Bill')->delete($bill_id); 
            $this->Model('BillDetail')->delete($bill_id);
            header('Location: '.$this->base_url .'/cart/yourorder');
        }
    }
?>