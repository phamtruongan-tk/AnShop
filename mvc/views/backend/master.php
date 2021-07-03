<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <base href="http://localhost/AnShop/">
        <title>Dashboard </title>
        <!-- Bootstrap -->
        <link href="public/backend/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="public/backend/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <!-- NProgress -->
        <link href="public/backend/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="public/backend/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="public/backend/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="public/backend/gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="public/backend/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="public/backend/gentelella-master/build/css/custom.min.css" rel="stylesheet">
        <!-- style css -->
        <link href="public/backend/css/style.css" rel="stylesheet">
        
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <?php include_once './mvc/views/backend/layouts/sidebar.php' ?>
                </div>
                <!-- top navigation -->
                <?php include_once './mvc/views/backend/layouts/header.php' ?>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php include_once './mvc/views/backend/pages/'.$data['page'].'.php' ?>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <?php include_once './mvc/views/backend/layouts/footer.php' ?>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="public/backend/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="public/backend/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="public/backend/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="public/backend/gentelella-master/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="public/backend/gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="public/backend/gentelella-master/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="public/backend/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="public/backend/gentelella-master/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="public/backend/gentelella-master/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="public/backend/gentelella-master/vendors/Flot/jquery.flot.js"></script>
        <script src="public/backend/gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="public/backend/gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
        <script src="public/backend/gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="public/backend/gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="public/backend/gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="public/backend/gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="public/backend/gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="public/backend/gentelella-master/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="public/backend/gentelella-master/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="public/backend/gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="public/backend/gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="public/backend/gentelella-master/vendors/moment/min/moment.min.js"></script>
        <script src="public/backend/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="public/backend/gentelella-master/build/js/custom.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <!-- custom js -->
        <script src="public/backend/js/script.js"></script>
    </body>
</html>