<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissão
        <small>Listagem de Permissão</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permissão</li>
        <li class="active">Listagem</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title">Lista</h3>
                    <a class="btn btn-info pull-right " href="<?php echo site_url('permissao/adicionar'); ?>">Adicionar nova Permissao</a>
                </div> 
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 20px;">ID</th>
                                <th>Nome do usuario</th>                                
                                <th>Email</th>                                                              
                                <th>Nome do menu</th>
                                <th colspan="2" style="width: 120px;">Açoes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($lista as $li): ?>
                                <tr>
                                    <th><?php echo $li['id_permissao']; ?></th>
                                   <th><?php echo $li['tx_nome_usuario']; ?></th>
                                   <th><?php echo $li['tx_email_usuario']; ?></th>                                   
                                   <th><?php echo $li['tx_nome_controller']; ?></th>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <a href="<?php echo site_url('permissao') . '/' . $li['id_permissao']; ?>" class="btn  btn-default " title="teste"> 
                                                    <i class="glyphicon glyphicon-edit">
                                                    </i><span class="">Editar</span>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    
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
