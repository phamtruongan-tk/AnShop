
    <?php foreach($data['product'] as $product) { ?>
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sửa Sản Phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <form method="POST" action="admin/posteditproduct/<?php  echo $product['product_id']?>" enctype="multipart/form-data">
                    <div class = 'text-center text-success'>
                    <?php
                        if(isset($_SESSION['mes'])){
                            echo $_SESSION['mes'];
                            unset($_SESSION['mes']);
                        }
                    ?>
                    </div>
                
                    <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm" name="product_name" value="<?php echo $product['product_name'] ?>">
                    </div>
                    <div class="form-group">
                    <label  for="inputGroupSelect01">Danh mục</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" required name="cate_id">
                                <?php foreach($data['cates'] as $cate){ ?>
                                <option 
                                    <?php if($cate['cate_id']==$product['cate_id']){echo 'selected' ;} ?>
                                value="<?php echo $cate['cate_id'] ?>"><?php echo $cate['cate_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="des">Mô tả</label>
                        <textarea  type="text" required class="form-control ckeditor" id="des medo" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="product_des"><?php  echo $product['product_des']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Hình ảnh</label>
                        <input type="file"  class="form-control" id="img" aria-describedby="emailHelp"  name="product_img">
                        <img style="width:100px" src="public/backend/uploads/product/<?php echo $product['product_img'] ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá gốc</label>
                        <input type="text" required class="form-control" id="price" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm" name="product_price" value="<?php echo $product['product_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="promotion">Giá khuyến mãi</label>
                        <input type="text"  class="form-control" id="promotion" aria-describedby="emailHelp" placeholder="Nhập giá sau khuyến mãi" name="product_promotion" value=" <?php echo $product['product_promotion']?>" >
                    </div>
                    <div class="form-group">
                        <label  for="inputGroupSelect01"  >Nổi bật</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="product_featured">
                            <?php if($product['product_featured']==1){ ?>
                                <option value="1" selected>Có </option>
                                <option value="0">Không</option>
                            <?php } else{ ?>
                                <option value="1" >Có </option>
                                <option value="0" selected>Không</option>
                            <?php } ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="inputGroupSelect01">Trạng thái</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="product_status">
                            <?php if($product['product_status']==1){ ?>
                                <option value="1" selected>Hiện </option>
                                <option value="0">Ẩn</option>
                            <?php } else{ ?>
                                <option value="1" >Hiện </option>
                                <option value="0" selected>Ẩn</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php } ?>
</div>