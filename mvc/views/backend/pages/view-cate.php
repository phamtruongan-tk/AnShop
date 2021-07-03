<?php foreach($data['cate'] as $cate){ ?>
    <div class="">
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chi tiết danh mục</h2>
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
                                        <th scope="col">Mục</th>
                                        <th scope="col">Thông tin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Tên</th>
                                        <td><?php  echo $cate['cate_name']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ảnh</th>
                                        <td><img  style="width:100px" src="public/backend/uploads/cate/<?php  echo  $cate['cate_img']?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mô tả</th>
                                        <td><?php  echo $cate['cate_des']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hiện thị</th>
                                        <td>
                                        <?php 
                                            if($cate['cate_status']==1){
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
                                        <a href="http://localhost/AnShop/admin/editcate/<?php echo $cate['cate_id'] ?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                                        
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