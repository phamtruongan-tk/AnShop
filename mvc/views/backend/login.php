<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="http://localhost/AnShop/">
        <title>Đăng nhập | </title>
        <!-- Bootstrap -->
        <link href="public/backend/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="public/backend/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="public/backend/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="public/backend/gentelella-master/vendors/animate.css/animate.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="public/backend/gentelella-master/build/css/custom.min.css" rel="stylesheet">
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="POST" action="admin/login">
                            <h1>Đăng nhập </h1>
                            <?php
                                if(isset($_SESSION['mes'])){
                                    echo $_SESSION['mes'];
                                    unset($_SESSION['mes']);
                                }
                            ?>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
                            </div>
                            <div> 
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required="" />
                            </div>
                            <div>
                                <button class="btn btn-success submit" type="submit" >Đăng nhập</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">
                                    <a href="#signup" class="to_register"> Quên mật khẩu</a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>