<?php foreach($data['slide'] as $slide){ ?>
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Sửa Slide</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"></a>
                </li>
            </ul>
            
            <div class="clearfix"></div>
        </div>
        <form method="POST" action="admin/posteditslide/<?php echo $slide['slide_id'] ?>" enctype="multipart/form-data">
            <div class = 'text-center text-success'>
                    <?php
                        if(isset($_SESSION['mes'])){
                            echo $_SESSION['mes'];
                            unset($_SESSION['mes']);
                        }
                    ?>
                </div>
            <div class = 'text-center'>
            </div>
            <div class="form-group">
                <label for="img">Ảnh</label>
                <input type="file"  class="form-control" id="img" aria-describedby="emailHelp"  name="slide_img">
                <img style="width:150px; margin-top:20px" src="public/backend/uploads/slide/<?php  echo $slide['slide_img']?>" alt="">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" required class="form-control" id="link" aria-describedby="emailHelp" placeholder="Nhập đường dẫn" name="slide_link" value="<?php echo $slide['slide_link'] ?>">
            </div>
            
            <div class="form-group">
                <label for="des">Mô Tả</label>
                <textarea type="text" required class="form-control ckeditor" id="des" aria-describedby="emailHelp"  name="slide_des"><?php echo $slide['slide_des'] ?></textarea>
            </div>
            <div class="form-group">
                <label  for="status">Trạng Thái</label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="status" name="slide_status">
                    <?php if($slide['slide_status']==1){ ?>
                        <option value="1" selected >Hiện</option>
                        <option value="0">Ẩn</option>
                    <?php }else{ ?>
                        <option value="1"  >Hiện</option>
                        <option value="0" selected>Ẩn</option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Sửa</button>
        </form>
    </div>
</div>
<div class="clearfix"></div>
<?php } ?>