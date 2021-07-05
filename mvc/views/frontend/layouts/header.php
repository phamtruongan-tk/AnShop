<div class="top">
        <div class="container">
            <marquee behavior="" direction="">Cam kết sản phẩm được thực hiện dựa trên mẫu đã chọn- Giao hàng miễn phí toàn quốc</marquee>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="logo">
                        <a href="">
                            <img src="public/frontend/img/logo/Capture-removebg-preview.jpg" alt="">
                        </a>
                        
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="contact">
                        <span>AAN SHOP - Cung cấp hoa tươi toàn quốc</span>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+84334496526">Hotline: 0793224488</a>
                        </p>
                    </div>
                    <div class="search">
                        <form action="home/search/" method="POST">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" autocomplete="off" placeholder="Nhập theo tên sản phẩm" class="search-sell" name="keyword">
                                    </td>
                                    <td><input type="submit" value="Tìm kiếm" ></td>
                                </tr>
                            </table>
                        </form>
                        <div class="result-search">
                            <!-- <h6 >Sản phẩm gợi ý</h6>
                            <ul >
                                <li>
                                    <a href="">
                                        <img src="img/hodiep/lan-ho-diep-12-canh-v061-1612194572-vlost.jpg" alt="">
                                        <div class="inf">
                                            <div class="name">Hoa hồ điệp</div>
                                            <div class="price"><del>1.200.00vnđ</del></div>
                                            <div class="promotion">1.100.000vnđ <sup>Giảm 20%</sup></div>
                                        </div>
                                    </a>
                                    <hr>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="img/hodiep/lan-ho-diep-12-canh-v061-1612194572-vlost.jpg" alt="">
                                        <div class="inf">
                                            <div class="name">Hoa hồ điệp</div>
                                            <div class="price"><del>1.200.00vnđ</del></div>
                                            <div class="promotion">1.100.000vnđ <sup>Giảm 20%</sup></div>
                                        </div>
                                    </a>
                                    <hr>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="account">
                        <?php if(!isset($_SESSION['user'])){ ?>
                        <span class="register" ><i class="fas fa-user"></i><a href="home/login">Đăng nhập</a></span>
                        <span class="register"><i class="fas fa-user"></i><a href="home/register">Đăng ký</a></span>
                        <?php }else{ ?>
                        <span class="account-name" href=""><i class="fas fa-user"></i><?php echo mb_convert_case($_SESSION['user'] ,MB_CASE_TITLE) ?>
                            <ul class="wp-account">
                                <li><a href="home/changepass">Thay đổi mật khẩu</a></li>
                                <li><a href="cart/yourorder">Đơn hàng</a></li>
                                <li><a href="home/logout">Đăng xuất</a></li>
                            </ul>
                        </span>
                        <?php } ?>
                            
                        <a href="cart/"><i class="fas fa-shopping-cart">(<?php 
                        if(isset($_SESSION['user'])){
                            if(isset($_SESSION['cart'][$_SESSION['user']])){
                                $sl = 0;
                                foreach($_SESSION['cart'][$_SESSION['user']] as $cart){
                                    $sl += $cart['qty'];
                                }
                                echo $sl;
                            }
                        }
                            
                            
                        ?>)</i></a>
                        
                    </div>
                    <div class="link">
                        <a href="https://www.facebook.com/profile.php?id=100009564938737"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/?lang=vi"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        <a href="mailto:phamtruongantk@gmail.com"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.instagram.com/an_phamtruong/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>