<?php 
    class Home extends Controller {
        public function Default(){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $cheap_products = $this->Model('Product')->getCheap();
            $mosts_view = $this->Model('Product')->getMostView();
            return $this->ViewFrontend('master',[
                'page'=>'home',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'cheap_products'=>$cheap_products,
                'mosts_view'=>$mosts_view,
            ]);
        }
        public function register(){
            return $this->ViewFrontend('register');
        }
        public function postRegister(){
            $name = $_POST['name'];
            $slug = $this->changeTitle($name); 
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rpassword = $_POST['rpassword'];
            $arr_user = $this->Model('User')->getUserbyEmail($email);
            if($name =='' || $email =='' || $password =='' || $rpassword ==''){
                $_SESSION['mes'] = "<div class ='text-center text-danger'>Vui lòng nhập đầy đủ thông tin </div>";
                header('Location: '.$this->base_url .'/home/register');
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $_SESSION['mes']  = "<div class ='text-center text-danger'>Vui lòng nhập đúng định dạng email </div>";
               header('Location: '.$this->base_url .'/home/register');
            }elseif(strlen($password)<8){
               $_SESSION['mes']  = "<div class ='text-center text-danger'>Mật khẩu phải dài hơn 8 ký tự </div>";
               header('Location: '.$this->base_url .'/home/register');
            }elseif(!preg_match("#[0-9]+#",$password)){
               $_SESSION['mes']  = "<div class ='text-center text-danger'>Mật khẩu phải có ít nhất 1 số </div>";
               header('Location: '.$this->base_url .'/home/register');
            }elseif(!preg_match("#[A-Z]+#",$password)) {
               $_SESSION['mes']  = "<div class ='text-center text-danger'>Mật khẩu phải chứa một ký tự viết hoa </div>";
               header('Location: '.$this->base_url .'/home/register');
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
               $_SESSION['mes']  = "<div class ='text-center text-danger'>mật khẩu phải chứa một ký tự thường </div>";
               header('Location: '.$this->base_url .'/home/register');
            }elseif($password !== $rpassword) {
               $_SESSION['mes']  = "<div class ='text-center text-danger'>Xác nhận mật khẩu </div>";
               header('Location: '.$this->base_url .'/home/register');
            }elseif( mysqli_num_rows($arr_user)!==0){
                $_SESSION['mes']  = "<div class ='text-center text-danger'>Tài khoảng đã tồn tại </div>";
                header('Location: '.$this->base_url .'/home/register');
            }
            else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $this->Model('User')->add($name,$slug, $email,$password);
                $_SESSION['mes']  = "<div class = 'text-center text-success'>Bạn đã đăng ký thành công</div>";
                header('Location: '.$this->base_url .'/home/login');
            }
            
        }
        public function login(){
            return $this->ViewFrontend('login');
        }
        public function postLogin(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->Model('User')->getUserbyEmail($email);
            if(mysqli_num_rows($user)===0){
                $_SESSION['mes']  = "<div class = 'text-center text-danger'>Tài khoảng chưa được đăng ký</div>";
                header('Location: '.$this->base_url .'/home/login');
            }else{
                $user = mysqli_fetch_array($user);
                if(password_verify($password,$user['user_password'])){
                    $_SESSION['user']= $user['user_name'];
                    $_SESSION['user_email']= $user['user_email'];
                    header('Location: '.$this->base_url .'/');
                }else{
                    $_SESSION['mes']  = "<div class = 'text-center text-danger'>Sai mật khẩu</div>";
                     header('Location: '.$this->base_url .'/mvchome/login');
                }
            }

        }
        public function logout(){
            unset($_SESSION['user']);
            header('Location: '.$this->base_url .'');
        }


        // 
        public function cate($cate_id){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $products = $this->Model('Product')->getProductByCate($cate_id);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            return $this->ViewFrontend('master',[
                'page'=>'cate',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'products'=>$products,
                'cate_id'=>$cate_id
            ]);
        }
        public function cateDecrease($cate_id){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $products = $this->Model('Product')->getProductByCateDecrease($cate_id);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            return $this->ViewFrontend('master',[
                'page'=>'cate-decrease',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'products'=>$products,
                'cate_id'=>$cate_id
            ]);
        }
        public function cateAscending($cate_id){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $products = $this->Model('Product')->getProductByCateAscending($cate_id);
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            return $this->ViewFrontend('master',[
                'page'=>'cate-ascending',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'products'=>$products,
                'cate_id'=>$cate_id
            ]);
        }
        public function detail($product_id){

            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $product = $this->Model('Product')->getDetail($product_id);
            $result = mysqli_fetch_array($product,MYSQLI_ASSOC);
            $cate_id = $result['cate_id'];
            $relate = $this->Model('Product')->getRelate($cate_id,$product_id);
            $comments = $this->Model('Comment')->getComments($product_id);
            $view = $result['product_view'] += 1;
            $this->Model('Product')->updateView($product_id,$view);
            return $this->ViewFrontend('master',[
                'page'=>'detail',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'product'=>$product,
                'relates'=>$relate,
                'comments'=>$comments
            ]);
        }
        public function search(){
            $cates_5 = $this->Model('Cate')->getCates_5();
            $cates_read_more = $this->Model('Cate')->getCatesReadMore();
            $slides = $this->Model('Slide')->getSlides();
            $keyw = $this-> changeTitle($_POST['keyword']);
            $result = $this->Model('Product')->searchsell($keyw);
            return $this->ViewFrontend('master',[
                'page'=>'search',
                'cates_5'=>$cates_5,
                'cates_read_more'=>$cates_read_more,
                'slides'=>$slides,
                'products'=>$result
            ]);
        }
    }
?>