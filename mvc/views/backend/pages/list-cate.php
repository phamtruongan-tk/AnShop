<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-6 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm Danh Mục</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <form method="POST" action="admin/postaddcate" enctype="multipart/form-data">
                    <div class = 'text-center'>
                    </div>
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Danh Mục</label>
                        <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" name="cate_name">
                    </div>
                    <div class="form-group">
                        <label for="img">Ảnh</label>
                        <input type="file"   class="form-control" id="img" aria-describedby="emailHelp"  name="cate_img">
                    </div>
                    <div class="form-group">
                        <label for="des">Mô Tả Danh Mục</label>
                        <textarea type="text"  class="form-control ckeditor" id="des" aria-describedby="emailHelp" placeholder="Nhập mô tả " name="cate_des"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputGroupSelect01">Trạng Thái</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="cate_status">
                                <option value="1" selected >Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh Sách Danh Mục</h2>
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
                                    <th class="column-title">Tên </th>
                                    <th class="column-title">Hiển Thị </th>
                                    <th class="column-title no-link last"><span class="nobr">Tùy Chọn</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['cates'] as $cate){ ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo mb_convert_case($cate['cate_name'],MB_CASE_TITLE) ?> </td>
                                    <?php if($cate['cate_status']==1){ ?>
                                        <td class=" "> <a href="admin/unactivecate/<?php echo $cate['cate_id'] ?>">Hiện  <i  class="far fa-thumbs-up"></i></a></td>
                                    <?php } else{?>
                                        <td class=" "> <a href="admin/activecate/<?php echo $cate['cate_id'] ?>">Ẩn <i  class="far fa-thumbs-down"></i></a></td>
                                    <?php }?>
                                   
                                    <td class=" last">
                                        <a href="admin/viewcate/<?php echo $cate['cate_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-list-ul"></i></a>
                                        <a href="admin/editcate/<?php echo $cate['cate_id'] ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                        <a  onclick="return confirm('Bạn có muốn xóa danh mục này không ?')" href="admin/deletecate/<?php echo $cate['cate_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                    <li class="page-item"><a class="page-link" href="admin/listcate/<?php echo $i ?>"><?php  echo $i?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>