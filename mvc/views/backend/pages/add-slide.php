<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <form method="POST" action="admin/postaddslide" enctype="multipart/form-data">
            
            </div>
            <div class="form-group">
                <label for="img">Thêm Slide</label>
                <input type="file" required class="form-control" id="img" aria-describedby="emailHelp"  name="slide_img">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" required class="form-control" id="link" aria-describedby="emailHelp" placeholder="Nhập đường dẫn" name="slide_link">
            </div>
            
            <div class="form-group">
                <label for="des">Mô tả</label>
                <textarea type="text" required class="form-control ckeditor" id="des" aria-describedby="emailHelp"  name="slide_des"></textarea>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="status">Trạng thái</label>
                    </div>
                    <select class="custom-select" id="status" name="slide_status">
                        <option value="1" selected >Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
        </form>
    </div>
</div>