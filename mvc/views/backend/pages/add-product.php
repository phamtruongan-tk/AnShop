<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm Sản Phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <form method="POST" action="admin/postaddproduct" enctype="multipart/form-data">
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
                            <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="inputGroupSelect01">Danh Mục</label>
                        <div class="input-group mb-3">
                            
                            <select class="custom-select" id="inputGroupSelect01" required name="cate_id">
                                <?php foreach($data['cates'] as $cate){ ?>
                                <option value="<?php echo $cate['cate_id'] ?>"><?php echo mb_convert_case($cate['cate_name'],MB_CASE_TITLE) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="des">Mô Tả</label>
                        <textarea  type="text" required class="form-control ckeditor" id="des medo" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="product_des"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Hình Ảnh</label>
                        <input type="file" required class="form-control" id="img" aria-describedby="emailHelp"  name="product_img">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Gốc</label>
                        <input type="text" required class="form-control" id="price" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm" name="product_price">
                    </div>
                    <div class="form-group">
                        <label for="promotion">Giá Khuyến Mãi</label>
                        <input type="text"  class="form-control" id="promotion" aria-describedby="emailHelp" placeholder="Nhập giá sau khuyến mãi" name="product_promotion">
                    </div>
                    <div class="form-group">
                        <label  for="inputGroupSelect01"  >Nổi Bật</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="product_featured">
                                <option value="1" >Có </option>
                                <option value="0"selected>Không</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="inputGroupSelect01">Trạng Thái</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="product_status">
                                <option value="1" selected >Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>