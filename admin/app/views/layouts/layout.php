<?php
$usuarioLogado = $this->session->userdata;
$usuario = $usuarioLogado['admin']
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title><?php echo $titulo; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url('assets') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets') ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <!-- daterange picker -->
        <link href="<?php echo base_url('assets') ?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap time Picker -->
        <link href="<?php echo base_url('assets') ?>/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

        <!-- DATA TABLES -->
        <link href="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Color Picker -->
        <link href="<?php echo base_url('assets') ?>/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Theme style -->
        <link href="<?php echo base_url('assets') ?>/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('assets') ?>/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!--/" rel="stylesheet" type="text/css" />-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url('assets') ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?php echo base_url('assets') ?>/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets') ?>/dist/js/app.min.js" type="text/javascript"></script>
        <!--DATA TABLE SCRIPT-->
        <script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <!-- Demo -->
        <script src="<?php echo base_url('assets') ?>/dist/js/demo.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


        <script src="<?php echo base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url('assets') ?>/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url('assets') ?>/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?php echo base_url('assets') ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <!-- custom -->
        <script src="<?php echo base_url('assets') ?>/js/custom.js"></script>
        <!-- =============================================== -->
    </head>
    <body class="skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url('assets') ?>/index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Sis</b>A.</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Sistema</b> AgroHelp</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <span class="hidden-xs"><?php echo $usuario["nome"]; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">

                                        <p>
                                            <?php echo $usuario["nome"]; ?> - <?php echo $usuario["email"]; ?>
                                           <!-- <small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Listar Usuários</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Listar Permissões</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Listar Páginas</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Meu usuário</a>
                                        </div>                                        <div class="pull-right">
                                            <a href="<?php echo site_url('logout'); ?>" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <!-- Control Sidebar Toggle Button -->
                            <!--<li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>-->
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <!--<div class="pull-left image" >
                          <img src="<?php echo base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                       </div>-->
                        <div class="pull-left info" >
                            <p><?php echo $usuario["nome"]; ?></p>

                            <i class="fa fa-circle text-success"></i> Online
                        </div>
                    </div>


                    <ul class="sidebar-menu">
                        <li class="header">Menu Principal</li>
                        <?php foreach ($usuarioLogado['permissao'] as $permi) { ?>
                            <li class="treeview">
                                <a href="<?php echo site_url($permi['tx_nome_controller']) ?>">
                                    <i class="fa fa-list"></i> <span><?php echo $permi['tx_nome_menu'] ?></span> <i class="fa fa-angle-right pull-right"></i>
                                </a>

                            </li>
                        <?php } ?>
                        <!--
                        <?php if ($usuario['admin']) { ?>
                                                        <li class="treeview">
                                                            <a href="#">
                                                                <i class="fa fa-calendar"></i> <span>Relatorios</span> <i class="fa fa-angle-left pull-right"></i>
                                                            </a>
                                                            <ul class="treeview-menu">
                                                                <li><a href="<?php echo site_url('relatorio/1') ?>"><i class="fa fa-list"></i>Rel. de Acesso por praga</a></li>
                                                                <li><a href="<?php echo site_url('relatorio/2') ?>"><i class="fa fa-list"></i>Rel. de perguntas por praga</a></li>
                                                             <li><a href="<?php echo site_url('relatorio/2') ?>"><i class="fa fa-list"></i>Rel. de pragas milho</a></li>
                                                                   <li><a href="<?php echo site_url('relatorio/2') ?>"><i class="fa fa-list"></i>Rel. de perguntas</a></li>
                                                                   <li><a href="<?php echo site_url('relatorio/2') ?>"><i class="fa fa-list"></i>Rel. de perguntas respondidas</a></li>
                                                            </ul>
                                                        </li>
                        <?php } ?>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-image"></i> <span>Banners</span> <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                        
                                                        <li><a href="<?php echo site_url("banner"); ?>/list"><i class="fa fa-list"></i> Listar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-bullhorn"></i> <span>Notícias</span> <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="<?php echo site_url('noticia') ?>/add"><i class="fa fa-plus-circle"></i> Adicionar</a></li>
                                                        <li><a href="<?php echo site_url('noticia') ?>/list"><i class="fa fa-list"></i> Listar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-image"></i> <span>Galeria</span> <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="<?php echo site_url('galeria') ?>/add"><i class="fa fa-plus-circle"></i> Adicionar</a></li>
                                                        <li><a href="<?php echo site_url('galeria') ?>/list"><i class="fa fa-list"></i> Listar</a></li>
                                                    </ul>
                                                </li>-->
                        <!--<li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Layout Options</span>
                                <span class="label label-primary pull-right">4</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo base_url('assets') ?>/documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                        <li class="header">LABELS</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span> <span class="label label-primary pull-right">4</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php if (!empty($mensagem)) { ?>
                    <div class="alert alert-<?= $mensagem['tipo'] ?>">
                        <strong><?= $mensagem['titulo'] ?></strong> <?= $mensagem['texto'] ?>
                    </div>
                <?php } ?>
                <!-- Content Header (Page header) -->


                <?php echo $conteudo; ?>





            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Versão</b> 04.055.16
                </div>
                <strong>Copyright &copy; 2016 
                    <a href="fatecourinhos.edu.br">AgroHelp (FATEC)</a>
                    .</strong>
                Todos os direitos reservados.
            </footer>

            <!-- Control Sidebar -->      
            <aside class="control-sidebar control-sidebar-dark">                
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class='control-sidebar-menu'>
                            <li>
                                <a href='javascript::;'>
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href='javascript::;'>
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href='javascript::;'>
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href='javascript::;'>
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3> 
                        <ul class='control-sidebar-menu'>
                            <li>
                                <a href='javascript::;'>               
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>                                    
                                </a>
                            </li> 
                            <li>
                                <a href='javascript::;'>               
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>                                    
                                </a>
                            </li> 
                            <li>
                                <a href='javascript::;'>               
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-waring pull-right">50%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>                                    
                                </a>
                            </li> 
                            <li>
                                <a href='javascript::;'>               
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>                                    
                                </a>
                            </li>               
                        </ul><!-- /.control-sidebar-menu -->         

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">            
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Some information about this general settings option
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Other sets of options are available
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div><!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked />
                                </label>                
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right" />
                                </label>                
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>                
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class='control-sidebar-bg'></div>
        </div><!-- ./wrapper -->

        <!--<div class="modal ">-->
        <div class="modal modal-primary img-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Praga</h4>
                    </div>
                    <div class="modal-body-img">
                        <center><img src=""  class="img-modal-destino"  width="100%" height="100%" > </center>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--</div> /.example-modal -->

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
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-outline confirmModal">OK</button>
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
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-outline confirmModal">OK</button>
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
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-outline confirmModal">OK</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->

        <script type="text/javascript">

            function validaCpf() {
                var id_pessoa = '';
                $.ajax({url: "<?= site_url('pessoa/validacpf'); ?>" + '/' + $('#tx_cpf').val(),
                    success: function (result) {
                        //alert('cpf ja existente');
                        result = $.parseJSON(result);
                        id_pessoa = result.id_pessoa;
                        $.confirm({
                            title: 'CPF Já existente!',
                            content: 'Deseja carregar as informaçoes da pessoa?',
                            buttons: {
                                Sim: function () {
                                    //"tx_rg":"48.760.209-00","tx_sobrenome":"borges basseto"}
                                    $('#id_pessoa').val(result.id_pessoa);
                                    $('#tx_nome').val(result.tx_nome);
                                    $('#dt_nasc').val(result.dt_nasc);
                                    $('#tx_cpf').val(result.tx_cpf);
                                    $('#tx_rg').val(result.tx_rg);
                                    $('#tx_sobrenome').val(result.tx_sobrenome);
                                    $.alert('Dados Carregados com sucesso!');
                                },
                                Nao: function () {
                                    $('#id_pessoa').val(result.id_pessoa);
                                    $.alert('Os dados salvos irão substituir os dados atuais');
                                }
                            }
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }, complete: function (jqXHR, textStatus) {
                        //                        alert(textStatus);
                    }
                });
            }
            function retornaCidades() {
                if ($('#id_estado').val() != '') {
                    $.ajax({url: "<?= site_url('pessoa/retornaCidade'); ?>" + '/' + $('#id_estado').val(),
                        success: function (result) {
                            //alert('cpf ja existente');
                            $('#id_cidade').html(result);

                        }, error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        },
                        complete: function (jqXHR, textStatus) {
                            //                            alert(textStatus);
                        }

                    });
                } else {
                    $.alert({
                        title: 'Alerta!',
                        content: 'Selecione um estado',
                    });
                }

            }
            /**
             * Comment
             */
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
if (!empty($success)) {
    echo "$('.modal-success').modal();";
    echo "$('.modal-success .modal-body').html({$success['texto']});";
    echo "$('.modal-success .modal-title').html({{$success['titulo']}});";
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
                $('.img_listagem').click(function () {
                    console.log($(this).attr('src'));
                    $('.img-modal-destino').attr('src', $(this).attr('src'));
                    $('.img-modal').modal('show');
                });
            });
        </script>
    </body>
</html>