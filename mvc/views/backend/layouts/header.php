<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="public/backend/gentelella-master/production/images/img.jpg" alt=""><?php echo strtoupper($_SESSION['admin']) ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="javascript:;"> Hồ sơ</a>
                        <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Cài đặt</span>
                        </a>
                        <a class="dropdown-item"  href="javascript:;">Trợ giúp</a>
                        <a class="dropdown-item"  href="admin/logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>