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
    <link rel="stylesheet" href="public/frontend/css/add.css">
    
    <title>Home</title>
</head>
<body>
    <?php  require_once './mvc/views/frontend/layouts/header.php'?>
    <?php  require_once './mvc/views/frontend/layouts/navbar.php'?>
    <?php  require_once './mvc/views/frontend/layouts/slide.php'?>
    <?php  require_once './mvc/views/frontend/pages/'.$data['page'].'.php'?>
    <?php  require_once './mvc/views/frontend/layouts/footer.php'?>
    
    <span class="btn_topTop"><i class="fas fa-chevron-up"></i></span>
    
    <script src="public/frontend/js/sell.js"></script>
    <script src="public/frontend/js/add.js"></script>
   
</body>
</html>