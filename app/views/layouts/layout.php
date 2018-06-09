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
                        <h1><a href="<?php echo site_url(); ?>">AgroHelp</a></h1>
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
                        <li class=" cadMenu"><a href="<?php echo base_url('admin') ?>">Cadastre-se</a></li>
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
                    
                    <iframe frameborder="0" allowtransparency="yes" scrolling="no" width="300" height="200" src="http://www.tempoagora.com.br/ta-widgets?cidades=Ourinhos-SP&amp;tipo=horizontal"></iframe>
                    </div>
                    <?php
//                        require_once '';
                    $this->load->model('Praga_model', 'praga');
                    
                    $dataPragasMilho=array();
                    $dataPragasMilho['limit'] = 5;
                    $dataPragasMilho['st_milho'] = 1;
                    $dataPragasMilho['order'] = 'nr_acesso DESC';

                    $cincoMaispragasMilho = $this->praga->getDataGrid($dataPragasMilho);

                    $dataPragasSoja=array();
                    $dataPragasSoja['limit'] = 5;
                    $dataPragasSoja['st_soja'] = 1;
                    $dataPragasSoja['order'] = 'nr_acesso DESC';

                    $cincoMaispragasSoja = $this->praga->getDataGrid($dataPragasSoja);
//        echo '<pre>';
//        print_r($pragas);
//        die();
                    ?>
                    <div id="fbox1" class="3u">

                        <section>
                            <header>
                                <h2>Mais acessadas do milho</h2>
                            </header>
                            <ul class="default">
                                <?php foreach ($cincoMaispragasMilho as $pragas) { ?>
                                    <li class="fa fa-angle-right"><a href="<?= site_url('praga').'/' . $pragas['id_praga'] ?>"><?= $pragas['tx_nomecientifico']?></a></li>
                                <?php } ?>
                            </ul>
                        </section>
                    </div>
                    <div id="fbox2" class="3u">
                        <section>
                            <header>
                                <h2>Mais acessadas da soja</h2>
                            </header>
                           <ul class="default">
                                <?php foreach ($cincoMaispragasSoja as $pragas) { ?>
                                    <li class="fa fa-angle-right"><a href="<?= site_url('praga') .'/' . $pragas['id_praga'] ?>"><?= $pragas['tx_nomecientifico'] ?></a></li>
                                <?php } ?>
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
                    Desebvolvido para faculdade: <a href="https://fatecourinhos.edu.br" target="_black">Fetec Ourinhos</a>
                </section>
            </div>
        </div>

        <div class="example-modal">
            <div class="modal modal-warning">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal Warning</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline confirmModal"  data-dismiss="modal">OK</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->

        <div class="example-modal">
            <div class="modal modal-success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal Success</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline confirmModal"  data-dismiss="modal">OK</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->

        <div class="example-modal">
            <div class="modal modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal Danger</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline confirmModal" data-dismiss="modal" >OK</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->

        <script type="text/javascript">


            function modalOpen(modal, mensagem, titulo) {
                $('.modal-' + modal).modal('show');
                $('.modal-' + modal + ' .modal-body').html(mensagem);
                $('.modal-' + modal + ' .modal-title').html(titulo);
            }
            /**
             * Comment
             */
            function modalClose(modal) {
                $('.modal-' + modal).modal('hide');
            }
            $(document).ready(function () {


<?php
if (!empty($jquery)) {
    echo $jquery;
}

if (!empty($danger)) {
    echo "$('.modal-danger').modal();";
    echo "$('.modal-danger .modal-body').html({$danger['texto']});";
    echo "$('.modal-danger .modal-title').modal({$danger['titulo']});";
}
if (!empty($alerta)) {
    echo "$('.modal-warning').modal();";
    echo "$('.modal-warning .modal-body').html({$alerta['texto']});";
    echo "$('.modal-warning .modal-title').html({$alerta['titulo']});";
}
if (!empty($sucess)) {
    echo "$('.modal-success').modal();";
    echo "$('.modal-successs .modal-body').html({$sucess['texto']});";
    echo "$('.modal-successs .modal-title').html({{$sucess['texto']}});";
}

function percorreArray($array, $tx_caminho) {
    foreach ($array as $ind => $arr) {
        if (is_array($arr)) {
            $tx_caminho .=$ind . '-';
            percorreArray($arr, $tx_caminho);
        } else {
            ?>
                            $('#<?= $tx_caminho . $ind ?>').val("<?= $arr ?>");
            <?php
        }
    }
}

if (!empty($populateForm)) {
    percorreArray($populateForm, '');
}
?>

            });
        </script>
    </body>
</html>