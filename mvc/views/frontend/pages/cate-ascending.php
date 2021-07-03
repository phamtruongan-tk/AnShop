<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="title"><?php echo mb_convert_case($data['products'][0]['cate_name'],MB_CASE_TITLE)  ?></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="container">
                    <div class="col-2">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <select class="custom-select price-filter" id="inputGroupSelect01">
                                    <option value="home/cate/<?php echo $data['cate_id'] ?>" >Tất cả</option>
                                    <option value="home/catedecrease/<?php  echo $data['cate_id']?>">Giá Giảm dần</option>
                                    <option value="home/cateascending/<?php  echo $data['cate_id']?>">Giá tăng dần</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <?php foreach($data['products'] as $product){ ?>
                <div class="col-lg-3 col-md-4 col-6 my-3 xoay">
                    <a href="home/detail/<?php echo $product['product_id'] ?>" class="item-product  " style="width:100%">
                        <div class="wp-img">
                            <img src="public/backend/uploads/product/<?php echo $product['product_img'] ?>" alt="">
                            
                        </div>
                        <div class="inf">
                            <div class="name"><?php echo $product['product_name'] ?></div>
                            <?php if($product['product_price']===$product['product_promotion']){ ?>
                            <div class="price"></div>
                            <?php }else{ ?>
                            <div class="price"><del><?php echo number_format($product['product_price']) ?></del>đ</div>
                            <?php } ?>
                            <div class="promotion"><?php echo number_format($product['product_promotion']) ?>đ</div>
                            
                        </div>
                        <?php
                            $sale = round(($product['product_price']-$product['product_promotion'])/$product['product_price']*100);
                            if($sale>=10){
                        ?>
                        <div class="sale" >Giảm <?php echo $sale ?> %</div>
                        <?php } ?>
                    </a>
                    <div class="cart-add">
                        <a href="cart/store/<?php echo $product['product_id'] ?>">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                    </div> 
                </div>
                <?php } ?>
            </div>
            <div class="append row"></div>
            
            <div class="row  text-center">
                <div class="col-12">
                    <div class="ascending" id="<?php  echo $data['cate_id']?>" >Xem thêm</div>
                </div>
            </div>
        </div>
    </div>