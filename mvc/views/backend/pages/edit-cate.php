
<?php foreach($data['cate'] as $cate){?>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sửa Danh Mục</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            <form method="POST" action="admin/posteditcate/<?php echo $cate['cate_id'] ?>" enctype="multipart/form-data">
                    <div class = 'text-center text-success'>
                    <?php
                        if(isset($_SESSION['mes'])){
                            echo $_SESSION['mes'];
                            unset($_SESSION['mes']);
                        }
                    ?>
                    </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Sửa Danh Mục</label>
                    <input type="text" required  class="form-control" value="<?php echo $cate['cate_name']?>"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="cate_name" > 
                </div>
                <div class="form-group">
                    <label for="img">Ảnh</label>
                    <input type="file" class="form-control"  id="img" aria-describedby="emailHelp"  name="cate_img" > 
                    <img style="width:150px; margin-top:20px" src="public/backend/uploads/cate/<?php echo $cate['cate_img'] ?>" alt="">
                </div>
                <div class="form-group">
                    <label for="des">Mô Tả</label>
                    <textarea type="text" required  class="form-control ckeditor"   id="des" aria-describedby="emailHelp"  name="cate_des" ><?php echo $cate['cate_des'] ?></textarea> 
                </div>
                <div class="form-group">
                <label for="inputGroupSelect01">Trạng Thái</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" name="cate_status">
                        <?php if($cate['cate_status']==1){ ?>
                                <option value="1" selected >Hiện</option>
                                <option value="0">Ẩn</option>
                            <?php } else {?>
                                <option value="1"  >Hiện</option>
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