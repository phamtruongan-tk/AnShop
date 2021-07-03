<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-4 col-sm-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm Admin</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <form method="POST" action="admin/postaddadmin" >
                    <div class = 'text-center'>
                    </div>
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên admin" name="admin_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email" name="admin_email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật Khẩu</label>
                        <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mật khẩu" name="admin_password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh Sách Admin</h2>
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
                                    <th class="column-title">Email </th>
                                    <th class="column-title no-link last"><span class="nobr">Tùy Chọn</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['admins'] as $admin){ ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $admin['admin_name'] ?> </td>
                                    <td class=" "><?php echo $admin['admin_email'] ?> </td>
                                   
                                    <td class=" last">
                                        <a  onclick="return confirm('Bạn có muốn xóa admin này không ?')" href="admin/deleteadmin/<?php echo $admin['admin_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                    <li class="page-item"><a class="page-link" href="admin/listadmin/<?php echo $i ?>"><?php  echo $i?></a></li>
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