<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12 ">
            <div class="row d-flex flex-row-reverse"  >
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" class="form-control search-bill" placeholder="Tìm kiếm theo tên khách hàng...">
                    </div>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách đơn hàng</h2>
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
                                    <th class="column-title">ID </th>
                                    <th class="column-title">Mã đơn hàng </th>
                                    <th class="column-title">Tên </th>
                                    <th class="column-title">Email </th>
                                    <th class="column-title">Số Đt </th>
                                    <th class="column-title">Địa chỉ </th>
                                    <th class="column-title">Ngày đặt </th>
                                    <th class="column-title">Trạng thái </th>
                                    <th class="column-title no-link last"><span class="nobr">Tùy chọn</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <?php foreach($data['bills'] as $bill){ ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $bill['bill_id'] ?></td>
                                    <td class=" "><?php echo $bill['bill_code'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_name'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_email'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_phone'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_address'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_date'] ?> </td>
                                    <td class=" "><?php echo $bill['bill_status'] ?> </td>
                                    
                                   
                                    <td class=" last">
                                        <a href="admin/viewbill/<?php echo $bill['bill_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-list"></i></a>
                                        <a  onclick="return confirm('Bạn có muốn xóa đơn hàng này không ?')" href="admin/deletebill/<?php echo $bill['bill_id'] ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                        <a onclick="return confirm('Thay đổi trạng thái đơn hàng về đang xử lý ?')" href="admin/updatestatusProcessing/<?php echo $bill['bill_id'] ?>" class="btn btn-info btn-sm">Đang xử lý</a>
                                        <a onclick="return confirm('Thay đổi trạng thái đơn hàng về đã nhận ?')" href="admin/updatestatusReceived/<?php echo $bill['bill_id'] ?>" class="btn btn-dark btn-sm">Đã nhận</a>
                                        <a onclick="return confirm('Thay đổi trạng thái đơn hàng về đã giao  ?')" href="admin/updatestatusDelivered/<?php echo $bill['bill_id'] ?>" class="btn btn-success btn-sm">Đã giao</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for( $i=1 ; $i<=$data['numberPage'];$i++){ ?>
                                    <li class="page-item"><a class="page-link" href="admin/listbill/<?php echo $i ?>"><?php  echo $i?></a></li>
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