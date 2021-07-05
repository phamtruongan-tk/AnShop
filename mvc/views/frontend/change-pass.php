<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/AnShop/">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- owl -->
    <link rel="stylesheet" href="public/frontend/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/frontend/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <script src="public/frontend/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <!--slick slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!-- css style -->
    <link rel="stylesheet" href="public/frontend/css/style.css">
    <title>Thay đổi mật khẩu</title>
</head>
<body>
    <div class="login">
        <form method="post" action="home/postChangePass">
            <h3>Thay đổi mật khẩu </h3>
            <?php
                if(isset($_SESSION['mes'])){
                    echo $_SESSION['mes'];
                    unset($_SESSION['mes']);
                }
            ?>
            <div class="form-group">
                <label for="old_pass">Mật khẩu cũ</label>
                <input type="password" required class="form-control m-0" id="old_pass" aria-describedby="emailHelp" placeholder="Nhập mật khẩu cũ" name="old_pass">
            </div>
            <div class="form-group">
                <label for="new_pass">Mật khẩu mới</label>
                <input type="password" required class="form-control m-0" id="new_pass" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới" name="new_pass">
            </div>
            <div class="form-group">
                <label for="re-pass">Xác nhận mật khẩu</label>
                <input type="password" required class="form-control m-0" id="re-pass" aria-describedby="emailHelp" placeholder="Nhập lại mật khẩu mới" name="re_pass">
            </div>
            <a href="" class='btn btn-sm'>Về trang chủ</a>
            <button type="submit" class="btn btn-primary btn-sm">Thay đổi</button>
        </form>
    </div>
    
    <script src="public/frontend/js/sell.js"></script>
    <script src="public/frontend/js/home.js"></script>
</body>
</html>