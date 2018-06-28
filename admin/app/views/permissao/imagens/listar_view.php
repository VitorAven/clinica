
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Galeria 
        <small>Listagem de imagens das pragas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('praga'); ?>">Pragas</a></li>
        <li class="active">Imagens</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Informações</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <form role="form" method="post" action="" enctype="multipart/form-data" >
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Selecione o arquivo</label>
                            <input type="file" name="userfile"  id="exampleInputFile" >
                            <p class="help-block"></p>
                            <input type="hidden" name="praga[id_praga]" id="praga-id_praga">
                        </div>
                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox" name="ativo">Ativo
                            </label>
                        </div>-->
                    </div><!-- /.box-body -->

                    <div class="box-footer"> 
                        <a href="<?php echo site_url('praga'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left"></span>Voltar</a>

                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-open"></span>Enviar</button>

                    </div>
                </form>
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>IMG</th>
                                <th>Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                            echo '<pre>';
//                            print_r($lista);
//                            die();
                            ?>
                            <?php foreach ($lista as $li) { ?>
                                <tr>
                                    <th>
                                        <img src="<?php echo base_url("/assets/img/praga") . "/" . $li['tx_url']; ?>" width="100px" height="100px" class="img_listagem" style="cursor: zoom-in">
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <a href="<?php echo site_url('praga/imagens/' . $id_praga . '/excluir/') . '/' . $li['id_imgpraga']; ?>"><button class="btn btn-danger ">Excluir</button></a>

                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Imagens</th>
                                <th>
                                    Açoes
                                </th>
                            </tr>

                        </tfoot>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

