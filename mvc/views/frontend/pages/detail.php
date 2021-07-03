<div class="main"> 
    <?php foreach($data['product'] as $product){  ?>
        <div class="detail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p> <span> trang chủ</span> <a class="text-dark" href="home/cate/<?php echo $product['cate_id'] ?>"><?php echo $product['cate_name'] ?></a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="wp-img">
                            <img src="public/backend/uploads/product/<?php echo $product['product_img'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="inf">
                            <div class="name"><?php echo mb_convert_case($product['product_name'],MB_CASE_TITLE)  ?></div>
                            <?php if($product['product_price']==$product['product_promotion']){ ?>
                                <div class="price"></div>
                            <?php }else{ ?>
                                <div class="price">Giá: <del><?php echo number_format($product['product_price']) ?></del><sup>đ</sup></div>
                            <?php } ?>
                            
                            <div class="promotion"><?php echo number_format($product['product_promotion']) ?><sup>đ</sup></div>
                            <div class="des">
                                    <?php echo $product['product_des'] ?>   
                            </div>
                            <a href="cart/store/<?php echo $product['product_id'] ?>" class="btn btn-danger btn-lg w-100 mb-1">Thêm vào giỏ hàng</a>
                            <a href="cart/buynow/<?php echo $product['product_id'] ?>" class="btn btn-success btn-lg w-100 mb-1">Mua ngay</a>
                            <ul>
                                <li><a href=""><i class="fas fa-fan"></i> Giao hàng nhanh</a></li>
                                <li><a href=""><i class="fas fa-fan"></i> Miễn phí thiệp - banner</a></li>
                                <li><a href=""><i class="fas fa-fan"></i> Nhận đơn gấp trong 1h</a></li>
                                <li><a href=""><i class="fas fa-fan"></i> Gửi hình hoa trước và sau khi giao</a></li>
                                <li><a href=""><i class="fas fa-fan"></i> Giảm giá 3 -5% cho đơn sau</a></li>
                                <li><a href=""><i class="fas fa-fan"></i> Đổi trả 100% nếu bạn không hài lòng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-list">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Đánh giá</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                     <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sản phẩm liên quan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="rate">
                                        <h6>Viết đánh giá của bạn ... <i class="fas fa-pencil-alt"></i></h6>
                                        <table>
                                            <tr>
                                                <input type="hidden" id="product_id" value="<?php echo $product['product_id'] ?>">
                                                <td><input type="text " class="rate-inp" placeholder="Viết đánh giá ..."></td>
                                                <td><p class="btn btn-success btn-sm btn-rate">Đánh giá</p></td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    <?php foreach($data['comments'] as $comment){ ?>
                                    <div class="show-rate">
                                        <hr>
                                        <span class="name"><?php echo mb_convert_case($comment['comment_name'],MB_CASE_TITLE) ?></span><span class="time"><?php echo $comment['comment_date'] ?></span>
                                        <div class="content"><?php echo $comment['comment_content'] ?></div>
                                        <div class="action">
                                            <i class="fas fa-thumbs-up"></i>Hữu ích?
                                            <?php if(isset($_SESSION['user']) &&$comment['comment_email']===$_SESSION['user_email']){ ?>    
                                                <a onclick="return confirm('Bạn có muốn xóa đánh giá này ?')" href="rate/delete/<?php echo $comment['comment_id'] ?>" class="delete-comment ">Xóa</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="load-rate">
                                       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="relate">
                                        <div class="owl-carousel owl-theme">
                                            <?php foreach($data['relates'] as $relate){ ?>
                                            <div class="item">
                                                <a href="home/detail/<?php echo $relate['product_id'] ?>" class="item-product">
                                                    <div class="wp-img" style="width: 100%;">
                                                        <img style="width: 100%;" src="public/backend/uploads/product/<?php echo $relate['product_img'] ?>" alt="">
                                                        
                                                    </div>
                                                    <div class="inf" style="margin-top: 0;">
                                                        <div class="name"><?php  echo $relate['product_name']?></div>
                                                        <div class="price"><del><?php echo number_format($relate['product_price']) ?>đ</div>
                                                        <div class="promotion"><?php echo number_format($relate['product_price']) ?>đ</div>
                                                    </div>
                                                    <div class="sale" >Giảm 20%</div>
                                                </a>
                                                <div class="cart-add">
                                                    <a href="cart/store/<?php echo $product['product_id'] ?>">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </a>
                                                </div> 
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  } ?>
        
    </div>