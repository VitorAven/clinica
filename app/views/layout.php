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
        <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/colorbox.css">


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



        <!-- /#home -->
        <div id="conteudo">
            <?php $this->load->view($pag); ?>
        </div>
        <!-- /#home -->
        <script src="<?php echo base_url('/assets'); ?>/js/jquery.colorbox.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/plugins.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/jquery.lightbox.js"></script>
        <script src="<?php echo base_url('/assets'); ?>/js/custom_1.js"></script>
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