<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pragas
        <small>Listagem de Pragas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pragas</li>
        <li class="active">Listagem</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Pesquisa</h3>
                </div><!-- /.box-header -->
                <form action="" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputNome">Pequisa</label>
                            <input type="text" class="form-control" id="praga-tx_nomepraga" name="praga[tx_nomepraga]" placeholder="Digite o Nome" required="">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info  pull-right">Pesquisar</button>

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title">Lista</h3>
                    <a class="btn btn-info pull-right " href="<?php echo site_url('praga/adicionar'); ?>">Adicionar nova praga</a>
                </div> 
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 20px;">ID</th>
                                <th>Nome cientifico</th>
                                <th style="width: 120px;">Nome comum</th>
                                <th colspan="2" style="width: 120px;">Açoes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($lista as $li): ?>
                                <tr>
                                    <th><?php echo $li['id_praga']; ?></th>
                                    <th><?php echo $li['tx_nomecientifico']; ?></th>
                                    <th><?php echo $li['tx_nomecomum']; ?></th>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <a href="<?php echo site_url('praga') . '/' . $li['id_praga']; ?>" class="btn  btn-default " title="teste"> 
                                                    <i class="glyphicon glyphicon-edit">
                                                    </i><span class="">Editar</span>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <a href="<?php echo site_url('praga/imagens') . '/' . $li['id_praga']; ?>" class="btn  btn-info "> 
                                                    <i class="glyphicon glyphicon-picture">
                                                    </i><span class="">Imagens</span>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
<!--                                    <th>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <a href="<?php echo site_url('praga') . '/' . $li['id_praga']; ?>" class="btn  btn-success "> 
                                                    <i class="glyphicon glyphicon-tint">
                                                    </i><span >Tratamentos</span>
                                                </a>
                                            </div>
                                        </div>
                                    </th>-->
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Identificacao</th>
                                <th>Nome comum</th>
                                <th>Nome cientifico</th>
                                <th colspan="3">Açoes</th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php echo $pagi; ?>
                </div> 
            </div>
        </div> 
    </div> 
</section> 
</div><!-- /.content-wrapper -->
