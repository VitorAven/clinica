
<head>
    <title><?php echo $noticia->titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <meta property="og:url"           content="<?php echo site_url('/noticias/interna') . '/' . $noticia->id; ?>" />
    <meta property="og:type"          content="Noticias" />
    <meta property="og:title"         content="<?php echo $noticia->titulo; ?>" />
    <meta property="og:description"   content="<?php echo $noticia->sub; ?>" />
    <meta property="og:image"         content="<?php echo base_url('/admin/assets/uploads/noticias') . "/" . $noticia->capa; ?>" />

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


    <style>
        .title{
            font-size: 18px;
            font-weight: 600;
            color: #e3722e;
            margin-bottom: 10px;
        }

    </style>

</head>
<body>
    <!-- /#home -->
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

s
<?php //print_r($noticia);die();    ?>

        <div class="fb-share-button" 
             data-href="<?php echo site_url('/noticias/interna') . '/' . $noticia->id; ?>" 
             data-layout="button_count">
        </div>
        <div id="noticias_int" class="team-member">
            <div class="member-img" style="text-align: center;">

                <img style="width: 100%; display: inline-block;" src="<?php echo base_url('/admin/assets/uploads/noticias') . "/" . $noticia->capa; ?>" alt="Tracy">

                <div class="overlay">
                    <ul class="social">
                        <li>
                        </li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div> <!-- /.overlay -->
            </div>
            <div class="inner-content">
                <h5 class="title"><?php echo $noticia->titulo; ?></h5>

                <span><?php echo $noticia->sub; ?></span>
                <p><?php echo $noticia->desc; ?></p>
            </div>
        </div> 

        <!-- /.team-member -->
    </div>
    <!-- /#home -->

</body>
</html>


