<div class="main">
        <div class="y-order">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6>Đơn hàng của bạn</h6>
                    </div>
                </div>
                <?php if(empty($data['bills'])){ ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-danger">Không có đơn hàng</div>
                        </div>
                    </div>
                    
                <?php }else{ ?>
                <div class="row">
                    <?php foreach($data['bills'] as $bill){?>
                    <div class="col-12">
                        <div class="inf">
                            <div>
                                <p>Mã đơn hàng : <?php echo $bill['bill_code']?></p>
                                <p>Ngày đặt : <?php echo $bill['bill_date'] ?></p>
                                <p>Trạng thái :  <?php echo $bill['bill_status'] ?> </p>
                            </div>
                            <div>
                                <span class="view_order" id="<?php echo $bill['bill_id'] ?>" style="margin-right: 20px;">Xem đơn hàng</span>
                                <a href="cart/destroyorder/<?php echo $bill['bill_id'] ?>" onclick=" return confirm('Bạn muốn xóa đơn hàng này')" class="destroy_order"  >Hủy đơn</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 loadbilldetail-<?php echo $bill['bill_id'] ?>">
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>