<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh Sách User</h2>
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
                                <?php foreach($data['users'] as $user){ ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $user['user_name'] ?> </td>
                                    <td class=" "><?php echo $user['user_email'] ?> </td>
                                   
                                    <td class=" last">
                                        <a  onclick="return confirm('Bạn có muốn xóa user này không ?')" href="admin/deleteuser/<?php echo $user['user_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                    <li class="page-item"><a class="page-link" href="admin/listuser/<?php echo $i ?>"><?php  echo $i?></a></li>
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