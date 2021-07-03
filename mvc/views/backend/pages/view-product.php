<?php foreach($data['product'] as $product){ ?>
<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Chi tiết sản phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Tên</th>
                                    <td><?php  echo $product['product_name']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Ảnh</th>
                                    <td><img  style="width:100px" src="public/backend/uploads/product/<?php  echo  $product['product_img']?>" alt=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mô tả</th>
                                    <td><?php  echo $product['product_des']?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Giá gốc</th>
                                    <td><?php  echo number_format($product['product_price'])?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Giá khuyến mãi</th>
                                    <td><?php  echo number_format($product['product_promotion'])?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nổi bật</th>
                                    <td>
                                    <?php 
                                        if($product['product_featured']==1){
                                            echo "Có";
                                        }else{
                                            echo 'Không';
                                        }
                                        
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Hiện thị</th>
                                    <td>
                                    <?php 
                                        if($product['product_status']==1){
                                            echo "Có";
                                        }else{
                                            echo 'Không';
                                        }
                                        
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tùy chọn</th>
                                    <td>
                                    <a href="admin/editproduct/<?php echo $product['product_id'] ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php }?>