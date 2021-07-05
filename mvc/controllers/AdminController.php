<?php
    class Admin extends Controller{
        public function Default(){
                $this->checkLogedIn();
                return $this->ViewBackend('login');
        }
        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $admin = $this->Model('Manager')->getAdminbyEmail($email);
                $admin = mysqli_fetch_array($admin);
                if(!empty($admin)){
                        if(password_verify($password,$admin['admin_password'])){
                            $_SESSION['admin'] = $admin['admin_name'];
                            $_SESSION['admin_email'] = $admin['admin_email'];
                            header('Location: '.$this->base_url .'/admin/listbill/1');
                        }
                        else{
                            $_SESSION['mes']='Sai mật khẩu'; 
                            return $this->ViewBackend('login');
                        }
                }else{
                    $_SESSION['mes']='Tài khoảng không tồn tại';
                    return $this->ViewBackend('login');
                }
            }
        }
        public function logout(){
            unset($_SESSION['admin']);
            header('Location:'.$this->base_url.'/admin');

        }
        public function changePass(){
            return $this->ViewBackend('master',[
                'page'=>'change-pass'
            ]);
        }
        public function postChangePass(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $re_pass = $_POST['re_pass'];
                $hash_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
                $admin = $this->Model('Mana')->getAdminbyEmail($_SESSION['admin_email']);
                $admin = mysqli_fetch_array($admin,MYSQLI_ASSOC); 

                if(! password_verify($old_pass, $admin['admin_password'])){
                    $_SESSION['mes']= 'Sai mật khẩu';
                }elseif($re_pass != $new_pass){
                    $_SESSION['mes']= 'Xác nhận mật khẩu chưa chính xác';
                }else{
                    $this->Model('Mana')->changePass($_SESSION['admin_email'],$hash_pass);
                    $_SESSION['mes']= 'Đã thay đổi mật khẩu';
                }

                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        
        // cate
        public function PostAddCate(){
            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                $cate_name =  $_POST['cate_name'];
                $cate_des =  $_POST['cate_des'];
                $cate_img =  $_FILES['cate_img'];
                $cate_status =  $_POST['cate_status'];
                $format_allow = ['image/jpeg','image/png','image/jpg'];
                if($cate_img['name']==''){
                    $this->Model('Cate')->add($cate_name,$cate_img['name'],$cate_des,$cate_status);
                    $_SESSION['mes'] = 'Đã thêm thành công';
                }elseif(in_array($cate_img['type'], $format_allow)){
                    $new_name_img = rand(0,100).$cate_img['name'];
                    $this->Model('Cate')->add($cate_name,$new_name_img,$cate_des,$cate_status);
                    move_uploaded_file($cate_img['tmp_name'], './public/backend/uploads/cate/'.$new_name_img);
                    $_SESSION['mes'] = 'Đã thêm thành công';
                }else{
                    $_SESSION['mes'] = 'Vui lòng chọn đúng định dạng ảnh';
                }
                
                header('Location:'.$this->base_url .'/admin/listcate/1');
            }
        }
        public function ListCate($page){
            $this->checkLogedOut();
            $CatePerPage = 5;
            $from = $CatePerPage*($page - 1);
            $cates = $this->Model('Cate')->getCate($from, $CatePerPage);
            $NumberCate = $this->Model('Cate')->getNumberCate();
            $NumberCate = count($NumberCate);
            $NumberPage = ceil($NumberCate/$CatePerPage);
            return $this->ViewBackend('master',[
                'page'=>'list-cate',
                'cates'=>$cates,
                'numberPage'=>$NumberPage
            ]);
        }
        public function unactivecate($cate_id){
            $this->checkLogedOut();
            $this->Model('Cate')->unactiveCate($cate_id);
            $_SESSION['mes'] = 'Đã ẩn danh mục';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function activecate($cate_id){
            $this->checkLogedOut();
            $this->Model('Cate')->activeCate($cate_id);
            $_SESSION['mes'] = 'Đã hiện danh mục';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function ViewCate($cate_id){
            $this->checkLogedOut();
            $cate = $this->Model('Cate')->getCateById($cate_id);
            return $this->ViewBackend('master',[
                'page'=>'view-cate',
                'cate'=>$cate
            ]);
        }
        public function EditCate($cate_id){
            $this->checkLogedOut();
            $cate = $this->Model('Cate')->getCatebyId($cate_id);
            return $this->ViewBackend('master',[
                'page'=>'edit-cate',
                'cate'=>$cate
            ]);
        }
        public function postEditCate($cate_id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $cate_name = $_POST['cate_name'];
                $cate_des = $_POST['cate_des'];
                $cate_img = $_FILES['cate_img'];
                $cate_status = $_POST['cate_status'];
                if($cate_img['name']==''){
                    $cate = $this->Model('Cate')->getCatebyId($cate_id);
                    $cate = mysqli_fetch_array($cate);
                    $new_name_img = $cate['cate_img'];
                    $this->Model('Cate')->updateCateId($cate_id, $cate_name,$new_name_img, $cate_des, $cate_status);
                    $_SESSION['mes'] = 'Đã sửa thành công';
                }else{
                    $format_allow = ['image/jpeg','image/png','image/jpg'];
                    if(in_array($cate_img['type'],$format_allow)){
                        $new_name_img = rand(0,100).$cate_img['name'];
                        $this->Model('Cate')->updateCateId($cate_id, $cate_name,$new_name_img, $cate_des, $cate_status);
                        move_uploaded_file($cate_img['tmp_name'], './public/backend/uploads/cate/'.$new_name_img);
                        $_SESSION['mes'] = 'Đã sửa thành công';
                    }else{
                        $_SESSION['mes']= 'Vui lòng nhập đúng dịnh dạng ảnh';
                    }
                }
                header('Location: '.$this->base_url .'/admin/editcate/'.$cate_id);
            }
        }
        public function deleteCate($cate_id){
            $this->checkLogedOut();
            $cate = $this->Model('Cate')->getCatebyId($cate_id);
            $cate = mysqli_fetch_array($cate,MYSQLI_ASSOC);
            unlink('public/backend/uploads/cate/'.$cate['cate_img']);
            $this->Model('Cate')->delete($cate_id);
            $_SESSION['mes'] = 'Đã xóa thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        // product
        public function AddProduct(){
                $this->checkLogedOut();
                $cates = $this->Model('Cate')->getCates();
                return $this->ViewBackend('master',[
                    'page'=>'add-product',
                    'cates'=>$cates
                ]);
        }
        public function postAddProduct(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $product_name =  $_POST['product_name'];
                $product_slug = $this->changeTitle($product_name);
                $cate_id =  $_POST['cate_id'];
                $product_des =  $_POST['product_des'];
                $product_price =  $_POST['product_price'];
                $product_promotion =  $_POST['product_promotion'];
                if($product_promotion ==""){
                    $product_promotion = $product_price;
                }
                $product_featured =  $_POST['product_featured'];
                $product_status =  $_POST['product_status'];
                $product_img = $_FILES['product_img'];
                $format_allow = ['image/jpeg','image/png','image/jpg'];
                if(in_array($product_img['type'],$format_allow)){
                    $img_new_name = rand(0,100).'-'.$product_img['name'];
                    $this->Model('Product')->add($product_name,$product_slug,$product_des,$product_price,$product_promotion,$product_featured,$product_status,$img_new_name,$cate_id);
                    move_uploaded_file($product_img['tmp_name'], './public/backend/uploads/product/'.$img_new_name);
                    $_SESSION['mes'] = 'Đã thêm thành công';
                
                }else{
                    $_SESSION['mes'] = 'vui lòng chọn đúng định dạng ảnh';
                }
                header('Location: '.$this->base_url .'/admin/addproduct');
            }
        }
        public function ListProduct($page){
            $this->checkLogedOut();
            $ProductPerPage = 10;
            $from = $ProductPerPage*($page - 1);
            $products = $this->Model('Product')->getProduct($from, $ProductPerPage); 
            $NumberProduct = $this->Model('Product')->getNumberProduct();  
            $NumberProduct = count($NumberProduct);
            $NumberPage = ceil($NumberProduct/$ProductPerPage);
            $cates = $this->Model('Cate')->getCates();
            return $this->ViewBackend('master',[
                'page'=>'list-product',
                'products'=>$products,
                'numberPage'=>$NumberPage,
                'cates'=> $cates
            ]);
        }
        public function unactiveproduct($product_id){
            $this->checkLogedOut();
            $this->Model('Product')->unactiveProduct($product_id);
            $_SESSION['mes'] = 'Đã ẩn sản phẩm';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function activeproduct($product_id){
            $this->checkLogedOut();
            $this->Model('Product')->activeProduct($product_id);
            $_SESSION['mes'] = 'Đã hiện sản phẩm';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function EditProduct($product_id){
            $this->checkLogedOut();
            $product = $this->Model('Product')->getProductbyId($product_id);
            $cates = $this->Model('Cate')->getCates();
            return $this->ViewBackend('master',[
                'page'=>'edit-product',
                'product'=>$product,
                'cates'=>$cates
            ]);
        }
        public function postEditProduct($product_id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $product_name =  $_POST['product_name'];
                $product_slug = $this->changeTitle($product_name);
                $cate_id =  $_POST['cate_id'];
                $product_des =  $_POST['product_des'];
                $product_price =  $_POST['product_price'];
                $product_promotion =  $_POST['product_promotion'];
                if($product_promotion ==""){
                    $product_promotion = $product_price;
                }
                $product_featured =  $_POST['product_featured'];
                $product_status =  $_POST['product_status'];
                $product_img = $_FILES['product_img'];
                if($product_img['name'] ==''){
                    $product = $this->Model('Product')->getProductbyId($product_id);
                    $product = mysqli_fetch_array($product);
                    $img_new_name = $product['product_img'];
                    $this->Model('Product')->update($product_id,$product_name,$product_slug,
                        $product_des,$product_price,$product_promotion,$product_featured,
                        $product_status,$img_new_name,$cate_id);
                    $_SESSION['mes'] = 'Đã cập nhật thành công';
                }else{  
                    $format_allow = ['image/jpeg','image/png','image/jpg'];
                    if(in_array($product_img['type'],$format_allow)){
                        $img_new_name = rand(0,100).'-'.$product_img['name'];
                        $this->Model('Product')->update($product_id,$product_name,$product_slug,
                            $product_des,$product_price,$product_promotion,$product_featured,
                            $product_status,$img_new_name,$cate_id);
                        move_uploaded_file($product_img['tmp_name'], './public/backend/uploads/product/'.$img_new_name);
                        $_SESSION['mes'] = 'Đã cập nhật thành công';
                    
                    }else{
                        $_SESSION['mes'] = 'vui lòng chọn đúng định dạng ảnh';
                    }
                }
                
                header('Location: '.$this->base_url .'/admin/editproduct/'.$product_id);
            }
        }
        public function deleteProduct($product_id){
            $this->checkLogedOut();
            $product = $this->Model('Product')->getProductbyId($product_id);
            $product = mysqli_fetch_array($product,MYSQLI_ASSOC);
            unlink('public/backend/uploads/product/'.$product['product_img']);
            $this->Model('Product')->delete($product_id);
            $_SESSION['mes'] = 'Đã xóa thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function viewProduct($product_id){
            $this->checkLogedOut();
            
            $product = $this->Model('Product')->getProductbyId($product_id);
            return $this->ViewBackend('master',[
                'page'=>'view-product',
                'product'=>$product
            ]);
        }
        // slide
        public function ListSlide($page){
            $this->checkLogedOut();
            $SlidePerPage = 5;
            $from = $SlidePerPage*($page - 1);
            $slides = $this->Model('Slide')->getSlide($from, $SlidePerPage);
            $NumberSlide = $this->Model('Slide')->getNumberSlide();
            $NumberSlide = count($NumberSlide);
            $NumberPage = ceil($NumberSlide/$SlidePerPage);
            return $this->ViewBackend('master',[
                'page'=>'list-slide',
                'slides'=>$slides,
                'numberPage'=>$NumberPage   
            ]);
        }
        public function unactiveslide($slide_id){
            $this->checkLogedOut();
            $this->Model('Slide')->unactiveslide($slide_id);
            $_SESSION['mes'] = 'Đã ẩn sản phẩm';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function activeslide($slide_id){
            $this->checkLogedOut();
            $this->Model('Slide')->activeslide($slide_id);
            $_SESSION['mes'] = 'Đã hiện sản phẩm';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function PostAddSlide(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $slide_img = $_FILES['slide_img'];  
                $slide_link =  $_POST['slide_link'];
                $slide_des =  $_POST['slide_des'];
                $slide_status =  $_POST['slide_status'];
                $format_allow = ['image/jpeg','image/png','image/jpg'];
                if(in_array($slide_img['type'], $format_allow)){
                    $new_name_img = rand(0,100).$slide_img['name'];
                    $this->Model('Slide')->add($new_name_img,$slide_link,$slide_des,$slide_status);
                    move_uploaded_file($slide_img['tmp_name'],'./public/backend/uploads/slide/'.$new_name_img);
                    $_SESSION['mes']= 'Đã thêm thành công';
                }else{
                    $_SESSION['mes']= 'Vui lòng nhập đúng định dạng ảnh';
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        public function editSlide($slide_id){
            $this->checkLogedOut();
            $slide = $this->Model('Slide')->getSlidebyId($slide_id);
            return $this->ViewBackend('master',[
                'page'=>'edit-slide',
                'slide'=>$slide
            ]);
        }
        public function PostEditSlide($slide_id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $slide_img = $_FILES['slide_img'];  
                $slide_link =  $_POST['slide_link'];
                $slide_des =  $_POST['slide_des'];
                $slide_status =  $_POST['slide_status'];
                if($slide_img['name']==''){
                    $slide = $this->Model('Slide')->getSlidebyId($slide_id);
                    $slide = mysqli_fetch_array($slide);
                    $new_name_img = $slide['slide_img'];
                    $this->Model('Slide')->update($new_name_img, $slide_link,$slide_des,$slide_status,$slide_id);
                    $_SESSION['mes']= 'Đã sửa thành công';
                    
                }else{
                    $format_allow = ['image/jpeg','image/png','image/jpg'];
                    if(in_array($slide_img['type'],$format_allow)){
                        $new_name_img = rand(0,100).$slide_img['name'];
                        $this->Model('Slide')->update($new_name_img, $slide_link,$slide_des,$slide_status,$slide_id);
                        move_uploaded_file($slide_img['tmp_name'],'./public/backend/uploads/slide/'.$new_name_img);
                        $_SESSION['mes']= 'Đã sửa thành công';
                    }else{
                        $_SESSION['mes'] = 'Vui lòng chọn đinh dạng ảnh';
                    }
                    
                }
                header('Location: '.$this->base_url .'/admin/editslide/'.$slide_id);
                
            }
        }
        public function deleteSlide($slide_id){
            $this->checkLogedOut();
            $slide = $this->Model('Slide')->getSlidebyId($slide_id);
            $slide = mysqli_fetch_array($slide,MYSQLI_ASSOC);
            unlink('public/backend/uploads/slide/'.$slide['slide_img']);
            $this->Model('Slide')->delete($slide_id);
            $_SESSION['mes'] = 'Đã xóa thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function viewSlide($slide_id){
            $this->checkLogedOut();
            $slide = $this->Model('Slide')->getSlidebyId($slide_id);
            return $this->ViewBackend('master',[
                'page'=>'view-slide',
                'slide'=>$slide
            ]);
        }
        // bill
        public function listBill($page){
            $this->checkLogedOut();
            $BillPerPage = 10;
            $from = $BillPerPage*($page - 1);
            $bills = $this->Model('Bill')->getBills($from, $BillPerPage);
            $NumberBill = $this->Model('Bill')->getNumberBill();
            $NumberBill = count($NumberBill);
            $NumberPage = ceil($NumberBill/$BillPerPage);
            return $this->ViewBackend('master',[
                'page'=>'list-bill',
                'bills'=>$bills,
                'numberPage'=>$NumberPage   
            ]);
        }
        public function viewBill($bill_id){
            $this->checkLogedOut();
            $bill_details = $this->Model('BillDetail')->getBillDetailByIdBill($bill_id);
            return $this->ViewBackend('master',[
                'page'=>'view-bill',
                'bill_details'=>$bill_details
            ]);
        }
        public function deleteBill($bill_id){
            $this->checkLogedOut();
            $this->Model('Bill')->delete($bill_id); 
            $this->Model('BillDetail')->delete($bill_id);
            $_SESSION["mes"]= 'Đã xóa thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function updatestatusReceived($bill_id){
            $this->checkLogedOut();
            $this->Model('Bill')->updatestatusReceived($bill_id);
            $_SESSION["mes"]= 'Đã thay đổi thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function updatestatusDelivered($bill_id){
            $this->checkLogedOut();
            $this->Model('Bill')->updatestatusDelivered($bill_id);
            $_SESSION["mes"]= 'Đã thay đổi thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        public function updatestatusProcessing($bill_id){
            $this->checkLogedOut();
            $this->Model('Bill')->updatestatusProcessing($bill_id);
            $_SESSION["mes"]= 'Đã thay đổi thành công';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        //admin
        public function ListAdmin($page){
            $this->checkLogedOut();
            $AdminPerPage = 5;
            $from = $AdminPerPage*($page - 1);
            $admins = $this->Model('Manager')->getAdmin($from, $AdminPerPage);
            $NumberAdmin = $this->Model('Manager')->getNumberAdmin();
            $NumberAdmin = count($NumberAdmin);
            $NumberPage = ceil($NumberAdmin/$AdminPerPage);
            return $this->ViewBackend('master',[
                'page'=>'list-admin',
                'admins'=>$admins,
                'numberPage'=>$NumberPage
            ]);
        }
        public function postAddAdmin(){
            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_password = $_POST['admin_password'];
            $admin_password = password_hash($admin_password,PASSWORD_DEFAULT);
            $arr_admin = $this->Model('Manager')->getAdminbyEmail($admin_email);
            if(mysqli_num_rows($arr_admin)!==0){
                $_SESSION['mes']= 'Tài khoảng đã tồn tại';
            }else{
                $this->Model('Manager')->add($admin_name,$admin_email,$admin_password);
                $_SESSION['mes']= 'Đã thêm Admin thành công';
            }
            header('Location: '.$this->base_url .'/admin/listadmin/1');
        }
        public function deleteAdmin($admin_id){
            $this->checkLogedOut();
            $this->Model('Manager')->delete($admin_id);
            $_SESSION['mes'] = 'Đã xóa admin thành công';
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        //users
        public function ListUser($page){
            $this->checkLogedOut();
            $UserPerPage = 5;
            $from = $UserPerPage*($page - 1);
            $users = $this->Model('User')->getUser($from, $UserPerPage);
            $NumberUser = $this->Model('User')->getNumberUser();
            $NumberUser = count($NumberUser);
            $NumberPage = ceil($NumberUser/$UserPerPage);
            return $this->ViewBackend('master',[
                'page'=>'list-user',    
                'users'=>$users,
                'numberPage'=>$NumberPage
            ]);
        }
        public function deleteUser($user_id){
            $this->checkLogedOut();
            $this->Model('User')->delete($user_id);
            $_SESSION['mes'] = 'Đã xóa user thành công';
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        //filter
        public function filter($cate_id,$page){
            $this->checkLogedOut();
            $ProductPerPage = 10;
            $from = $ProductPerPage*($page - 1);
            $products = $this->Model('product')->getProductFilter($cate_id,$from,$ProductPerPage);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $cates = $this->Model('Cate')->getCates();
            
            $NumberProduct = $this->Model('Product')->getNumberProductFilter($cate_id);
            $NumberProduct = count($NumberProduct);
            $NumberPage = ceil($NumberProduct/$ProductPerPage);
            
            return $this->ViewBackend('master',[
                'page'=>'filter-prod',
                'products'=>$products,
                'cates'=>$cates,
                'numberPage'=>$NumberPage,
                'cate_id'=>$cate_id
            ]);
        }

    }
?>