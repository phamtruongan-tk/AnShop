<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Chi Tiết đơn hàng</h2>
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
                                    <th class="column-title">Hình ảnh </th>
                                    <th class="column-title">Giá tiền </th>
                                    <th class="column-title">Số lượng  </th>
                                    <th class="column-title">Thành tiền </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['bill_details'] as $bill_detail){ ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo mb_convert_case($bill_detail['product_name'],MB_CASE_TITLE) ?> </td>
                                    <td class=" "><img style="width:100px" src="public/backend/uploads/product/<?php echo $bill_detail['product_img'] ?>" alt=""> </td>
                                    <td class=" "><?php echo number_format($bill_detail['bill_detail_price']) ?> </td>
                                    <td class=" "><?php echo $bill_detail['bill_detail_qty'] ?> </td>
                                    <td class=" "><?php echo number_format($bill_detail['bill_detail_price']*$bill_detail['bill_detail_qty']) ?> </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="6">Tổng cộng:  
                                        <?php
                                        $total = 0;
                                        foreach($data['bill_details'] as $bill_detail ){
                                            $total +=$bill_detail['bill_detail_price']*$bill_detail['bill_detail_qty'];
                                        }
                                        echo number_format($total);
                                        
                                        ?>
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