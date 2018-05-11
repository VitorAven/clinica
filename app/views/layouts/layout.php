<!DOCTYPE HTML>
<!--
        Colorized by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>AgroHelp</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php echo base_url('/assets/js') ?>/skel.min.js"></script>
        <script src="<?php echo base_url('/assets/js') ?>/skel-panels.min.js"></script>
        <script src="<?php echo base_url('/assets/js') ?>/init.js"></script>
         <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <link href="<?php echo base_url('assets') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url('/assets/css') ?>/skel-noscript.css" />
        <link rel="stylesheet" href="<?php echo base_url('/assets/css') ?>/style.css" />
        <link rel="stylesheet" href="<?php echo base_url('/assets/css') ?>/custom.css" />
        <link rel="stylesheet" href="<?php echo base_url('/assets/css') ?>/style-desktop.css" />

        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    </head>
    <body class="homepage">

        <!-- Header -->
        <div id="header">
            <div id="logo-wrapper">
                <div class="container">

                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="#">AgroHelp</a></h1>
                        <span>Desenvolvido por Vitor</span>
                    </div>

                </div>
            </div>			
            <div class="container">
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li  class="homeMenu"><a href="<?php echo site_url() ?>">Home</a></li>
                        <li class=" milhoMenu"><a href="<?php echo site_url('cultura/milho') ?>">Milho</a></li>
                        <li class=" sojaMenu"><a href="<?php echo site_url('cultura/soja') ?>">Soja</a></li>
                        <li class=" sobreMenu"><a href="<?php echo site_url('sobre') ?>">sobre</a></li>
                        <li class=" cadMenu"><a href="<?php echo site_url('cadastre') ?>">Cadastre-se</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Header -->

        <!-- Banner -->
        <div id="banner">
            <div class="container">

            </div>
        </div>
        <!-- /Banner -->

        <!-- Main -->
        <?php echo $conteudo ?>
        <!-- /Main -->

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="6u">
                        <section>
                            <header>
                                <h2>Elementum facilisis</h2>
                            </header>
                            <a href="#" class="image full"><img src="<?php echo base_url('assets/img') ?>/pics05.jpg" alt=""></a>
                            <p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Pellentesque tristique ante ut risus. Quisque dictum. Integer nisl risus, sagittis convallis, rutrum id, elementum.</p>
                        </section>
                    </div>
                    <div id="fbox1" class="3u">
                        <section>
                            <header>
                                <h2>Praesent mattis</h2>
                            </header>
                            <ul class="default">
                                <li class="fa fa-angle-right"><a href="#">Vestibulum luctus venenatis dui</a></li>
                                <li class="fa fa-angle-right"><a href="#">Integer rutrum nisl in mi</a></li>
                                <li class="fa fa-angle-right"><a href="#">Etiam malesuada rutrum enim</a></li>
                                <li class="fa fa-angle-right"><a href="#">Aenean elementum facilisis ligula</a></li>
                                <li class="fa fa-angle-right"><a href="#">Ut tincidunt elit vitae augue</a></li>
                                <li class="fa fa-angle-right"><a href="#">Sed quis odio sagittis leo vehicula</a></li>
                            </ul>
                        </section>
                    </div>
                    <div id="fbox2" class="3u">
                        <section>
                            <header>
                                <h2>Maecenas luctus</h2>
                            </header>
                            <ul class="default">
                                <li class="fa fa-angle-right"><a href="#">Vestibulum luctus venenatis dui</a></li>
                                <li class="fa fa-angle-right"><a href="#">Integer rutrum nisl in mi</a></li>
                                <li class="fa fa-angle-right"><a href="#">Etiam malesuada rutrum enim</a></li>
                                <li class="fa fa-angle-right"><a href="#">Aenean elementum facilisis ligula</a></li>
                                <li class="fa fa-angle-right"><a href="#">Ut tincidunt elit vitae augue</a></li>
                                <li class="fa fa-angle-right"><a href="#">Sed quis odio sagittis leo vehicula</a></li>
                            </ul>
                        </section>
                    </div>
                </div>


            </div>
        </div>
        <!-- /Footer -->

        <!-- Copyright -->
        <div id="copyright">
            <div class="container">
                <section>
                    Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
                </section>
            </div>
        </div>

    </body>
</html>