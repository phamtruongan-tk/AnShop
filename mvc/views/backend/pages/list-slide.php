<div class="">
    <div class="row" style="display: block;">
    <div class="col-md-5 col-sm-5">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm slide</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"></a>
                    </li>
                </ul>
                
                <div class="clearfix"></div>
            </div>
            <form method="POST" action="admin/postaddslide" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="img">Ảnh</label>
                    <input type="file" required class="form-control" id="img" aria-describedby="emailHelp"  name="slide_img">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" required class="form-control" id="link" aria-describedby="emailHelp" placeholder="Nhập đường dẫn" name="slide_link">
                </div>
                
                <div class="form-group">
                    <label for="des">Mô Tả</label>
                    <textarea type="text" required class="form-control ckeditor" id="des" aria-describedby="emailHelp"  name="slide_des"></textarea>
                </div>
                <div class="form-group">
                    <label  for="status">Trạng Thái</label>
                    <div class="input-group mb-3">
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
    <div class="col-md-7 col-sm-7 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh Sách Slide</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <div class = 'text-center text-success'>
                    <?php
                        if(isset($_SESSION['mes'])){
                            echo $_SESSION['mes'];
                            unset($_SESSION['mes']);
                        }
                    ?>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Ảnh </th>
                                    <th class="column-title">Hiển Thị </th>
                                    <th class="column-title no-link last"><span class="nobr">Tùy Chọn</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['slides'] as $slide){ ?>
                                <tr class="even pointer">
                                    <td class=" "><img style="width:150px" src="public/backend/uploads/slide/<?php echo $slide['slide_img'] ?>" alt=""> </td>
                                    <?php if($slide['slide_status']==1){ ?>
                                        <td class=" "> <a href="admin/unactiveslide/<?php echo $slide['slide_id'] ?>">Hiện <i class="far fa-thumbs-up"></i></a></i></td>
                                    <?php } else{?>
                                        <td class=" "> <a href="admin/activeslide/<?php echo $slide['slide_id'] ?>">Ẩn <i class="far fa-thumbs-down"></i></a></i></td>
                                    <?php }?>
                                   
                                    <td class=" last">
                                        <a href="admin/viewslide/<?php echo $slide['slide_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-list"></i></a>
                                        <a href="admin/editslide/<?php echo $slide['slide_id'] ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                        <a  onclick="return confirm('Bạn có muốn xóa slide này không ?')" href="admin/deleteslide/<?php echo $slide['slide_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                    <li class="page-item"><a class="page-link" href="admin/listslide/<?php echo $i ?>"><?php  echo $i?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>