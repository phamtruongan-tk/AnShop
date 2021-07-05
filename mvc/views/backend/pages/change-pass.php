<div class="">
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class = 'text-center text-success'>
                        <?php
                            if(isset($_SESSION['mes'])){
                                echo $_SESSION['mes'];
                                unset($_SESSION['mes']);
                            }
                        ?>
                    </div>
                    <h2>Thêm slide</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <form method="POST" action="admin/postchangepass">
                    <div class="form-group">
                        <label for="old_pass">Mật khẩu cũ</label>
                        <input type="password" required class="form-control" id="old_pass" aria-describedby="emailHelp" placeholder="Nhập mật khẩu cũ" name="old_pass">
                    </div>
                    <div class="form-group">
                        <label for="new_pass">Mật khẩu mới</label>
                        <input type="password" required class="form-control" id="new_pass" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới" name="new_pass">
                    </div>
                    <div class="form-group">
                        <label for="re-pass">Xác nhận mật khẩu</label>
                        <input type="password" required class="form-control" id="re-pass" aria-describedby="emailHelp" placeholder="Nhập lại mật khẩu mới" name="re_pass">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Thay đổi</button>
                </form>
                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>





