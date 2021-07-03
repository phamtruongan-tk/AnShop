<div class="main">
        <div class="order">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6>Thông tin giao hàng</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-12">
                        <form action="cart/postorder" method="post">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" required class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Nhập số điện thoại " name="phone">
                            </div>
                            <div class="form-group">
                                <label for="phone">Địa chỉ giao hàng</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tỉnh/Thành phố</label>
                                    </div>
                                    <select class="custom-select provice" id="inputGroupSelect01" name="provice">
                                        <option selected>Chọn tỉnh/thành phố</option>
                                        <?php foreach($data['provices'] as $provice){?>
                                        <option value="<?php echo $provice['matp'] ?>"><?php echo $provice['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Quận/Huyện</label>
                                    </div>
                                    <select class="custom-select district" id="inputGroupSelect01" name="district">
                                        <option selected>Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Phường/Xã</label>
                                    </div>
                                    <select class="custom-select ward" id="inputGroupSelect01" name="ward">
                                        <option selected>Chọn xã/phường/thị trấn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village">Số nhà/Thôn/Xóm</label>
                                <input type="text" required class="form-control" id="village" aria-describedby="emailHelp" placeholder="Nhập địa chỉ cụ thể" name="vallige">
                            </div>
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea type="text" class="form-control" id="note" aria-describedby="emailHelp" placeholder="Ghi chú" name="note"></textarea>
                            </div>
                            <input  type="submit" class="btn btn-outline-secondary" value="Gửi">
                        </form>
                    </div>
                    <div class="col-12 col-lg-6 col-md-12">
                        <p>Để đảm bảo cho việc giao hàng, vui lòng chọn đúng quận và phường
                            Mọi sự cố sẽ không được giải quyết nếu như khách hàng không chọn đúng địa chỉ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>