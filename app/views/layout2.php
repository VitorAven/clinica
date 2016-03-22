<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
<![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <title>Compass Responsive Web Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <!-- 
        Compass Template
        http://www.templatemo.com/preview/templatemo_454_compass
        -->
        <meta charset="UTF-8">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

        <!-- CSS Bootstrap & Custom -->
        <link href="<?php echo base_url('/assets'); ?>/css/bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/templatemo-misc.css">
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/templatemo-main.css">
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/custom2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css">    

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo base_url('/assets'); ?>/img/ico/favicon.ico">

        <!-- JavaScripts -->
        <script src="<?php echo base_url('/assets'); ?>/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
        <!--[if lt IE 8]>
            <div style=' clear: both; text-align:center; position: relative;'>
                <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
            </div>
        <![endif]-->
    </head>
    <body>
        <script>
            $(document).ready(function () {


                $("#noticias_home").owlCarousel({
                    pagination: true,
                    autoPlay: true,
                    navigation: false, // Show next and prev buttons
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: false,
                    navigationText: ["<<", ">>"],
                    // "singleItem:true" is a shortcut for:
                    items: 3
                            // itemsDesktop : false,
                            // itemsDesktopSmall : false,
                            // itemsTablet: false,
                            //itemsMobile : false

                });

            });
        </script>

        <div id="home">
            <div class="site-header">
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="left-header">
                                    <span><i class="fa fa-phone"></i>14 3322 9999</span>
                                    <span><i class="fa fa-envelope"></i>info@company.com</span>
                                </div> <!-- /.left-header -->
                            </div> <!-- /.col-md-6 -->
                            <div class="col-md-6 col-sm-6">
                                <div class="right-header text-right">
                                    <ul class="social-icons">
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-google-plus"></a></li>
                                    </ul>
                                </div> <!-- /.left-header -->
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div> <!-- /.top-header -->
                <div class="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="logo">
                                    <h1><a href="#home"  title="Dreri"><img style="width: 150px;" src="<?php echo base_url(); ?>assets/img/logo.jpg" class="img-responsive"/></a></h1>
                                </div> <!-- /.logo -->
                            </div> <!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-8 col-xs-6">
                                <div class="menu text-right hidden-sm hidden-xs">
                                    <ul>
                                        <li><a href="#home">Home</a></li>
                                        <li><a href="#services">Serviços</a></li>
                                        <li><a href="#portfolio">Fotos</a></li>
                                        <li><a href="#about">Sobre</a></li>
                                        <li><a href="#noticias">Notícias</a></li>
                                        <li><a href="#contact">Contato</a></li>
                                        <!--  <li><a href="http://www.google.com" class="external">External</a></li>-->
                                    </ul>
                                </div> <!-- /.menu -->
                            </div> <!-- /.col-md-8 -->
                        </div> <!-- /.row -->
                        <div class="responsive-menu text-right visible-xs visible-sm">
                            <a href="#" class="toggle-menu fa fa-bars"></a>
                            <div class="menu">
                                <ul>
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#services">Serviços</a></li>
                                    <li><a href="#portfolio">Fotos</a></li>
                                    <li><a href="#about">Sobre</a></li>
                                    <li><a href="#noticias">Notícias</a></li>
                                    <li><a href="#contact">Contato</a></li>
                                    <li><a href="http://www.google.com" class="external">External</a></li>
                                </ul>
                            </div> <!-- /.menu -->
                        </div> <!-- /.responsive-menu -->
                    </div> <!-- /.container -->
                </div> <!-- /.header -->
            </div> <!-- /.site-header -->
        </div> 
        <!-- /#home -->
        <div id="conteudo">
            <?php $this->load->view($pag); ?>
        </div>
        <!-- /#home -->
        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <p>Copyright &copy; 2015 Company Name</p>
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="go-top">
                            <a href="#" id="go-top">
                                <i class="fa fa-angle-up"></i>
                                Voltar para o inicio
                            </a>
                        </div>
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-footer -->

        <script src="<?php echo base_url('/assets'); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/plugins.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/jquery.lightbox.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/custom_1.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/jquery.colorbox.js"></script>
        <script type="text/javascript">

            function initialize() {
                var mapOptions = {
                    scrollwheel: false,
                    zoom: 15,
                    center: new google.maps.LatLng(13.758468, 100.567481)
                };

                var map = new google.maps.Map(document.getElementById('map-canvas'),
                        mapOptions);
            }

            function loadScript() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
                        'callback=initialize';
                document.body.appendChild(script);
            }

            window.onload = loadScript;
        </script>

    </body>
</html>