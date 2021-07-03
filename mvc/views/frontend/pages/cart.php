<div class="main">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6>Thông tin giỏ hàng</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(empty($_SESSION['user'])){ ?>
                        <div class="text-center text-danger">Đăng nhập để xem giỏ hàng</div>
                        <?php }elseif(empty($_SESSION['cart'][$_SESSION['user']])){ ?>
                        <div class="text-center text-danger">Không có sản phẩm giỏ hàng</div>
                        <?php }else{ ?>
                        <form action="cart/update" method="post">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giá tiền</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng giá</th>
                                        <th scope="col">Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($_SESSION['cart'][$_SESSION['user']] as $cart){?>
                                    <tr>
                                        <td><img src="public/backend/uploads/product/<?php echo  $cart['product_img'] ?>" alt=""></th>
                                        <td><?php echo $cart['product_name'] ?></td>
                                        <td><?php echo number_format($cart['product_promotion']) ?></td>
                                        <td><input name="qty[<?php echo $cart['product_id'] ?>]" type="number" min="1" value="<?php echo $cart['qty'] ?>"></td>
                                        <td><?php echo number_format($cart['product_promotion']*$cart['qty']) ?></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa giỏ hàng ')" href="cart/delete/<?php echo $cart['product_id'] ?>" class="fas fa-window-close"></a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="6">
                                    Tổng cộng: 
                                    <?php 
                                        $total =0;
                                        foreach($_SESSION['cart'][$_SESSION['user']] as $cart){
                                            $total += $cart['product_promotion']*$cart['qty'];
                                        }
                                        echo number_format($total);
                                    ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="cart/order" class="btn btn-outline-secondary btn-sm"> Đặt hàng</a>
                            <input class="btn btn-outline-secondary btn-sm" type="submit" value="cập nhật">
                            <a href="cart/destroy" onclick="return confirm('Bạn có muốn xóa hết giỏ hàng ')" class="btn btn-outline-secondary btn-sm"> Xóa tất cả</a>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>