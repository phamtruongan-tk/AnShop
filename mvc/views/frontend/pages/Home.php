<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="title">Nổi Bật Rẻ Nhất</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="container">
                    <div class="owl-carousel owl-theme d-block">
                        <?php foreach($data['cheap_products'] as $cheap_product){?>
                        <div class="item">
                            <a href="home/detail/<?php echo $cheap_product['product_id'] ?>" class="item-product">
                                <div class="wp-img">
                                    <img src="public/backend/uploads/product/<?php echo $cheap_product['product_img'] ?>" alt="">
                                    
                                </div>
                                <div class="inf">
                                    <div class="name"><?php echo $cheap_product['product_name'] ?></div>
                                    <?php if($cheap_product['product_price'] == $cheap_product['product_promotion']){ ?>
                                    <div class="price"><del></div>
                                    <?php }else{ ?>
                                    <div class="price"><del><?php echo number_format($cheap_product['product_price']) ?>đ</div>
                                    <?php  } ?>
                                    <div class="promotion"><?php echo number_format($cheap_product['product_promotion']) ?>đ</div>
                                </div>
                                <?php
                                    $sale = round(($cheap_product['product_price']-$cheap_product['product_promotion'])/$cheap_product['product_price']*100);
                                    if($sale>=10){

                                ?>
                                <div class="sale">Giảm <?php echo $sale ?> %</div>
                                <?php } ?>
                            </a>
                            <div class="cart-add">
                                    <a href="cart/store/<?php  echo $cheap_product['product_id']?>">
                                        <i class="fas fa-cart-plus"></i>
                                    </a>
                                </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="title"> Xem Nhiều Nhất</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="container">
                    <div class="owl-carousel owl-theme d-block">
                        <?php foreach($data['mosts_view'] as $most_view){?>
                        <div class="item">
                            <a href="home/detail/<?php echo $most_view['product_id'] ?>" class="item-product">
                                <div class="wp-img">
                                    <img src="public/backend/uploads/product/<?php echo $most_view['product_img'] ?>" alt="">
                                    
                                </div>
                                <div class="inf">
                                    <div class="name"><?php echo $most_view['product_name'] ?></div>
                                    <?php if($most_view['product_price'] == $most_view['product_promotion']){ ?>
                                    <div class="price"><del></div>
                                    <?php }else{ ?>
                                    <div class="price"><del><?php echo number_format($most_view['product_price']) ?>đ</div>
                                    <?php  } ?>
                                    <div class="promotion"><?php echo number_format($most_view['product_promotion']) ?>đ</div>
                                </div>
                                <?php
                                    $sale = round(($most_view['product_price']-$most_view['product_promotion'])/$most_view['product_price']*100);
                                    if($sale>=10){

                                ?>
                                <div class="sale">Giảm <?php echo $sale ?> %</div>
                                <?php } ?>
                            </a>
                            <div class="cart-add">
                                    <a href="cart/store/<?php  echo $most_view['product_id']?>">
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