<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Médico
        <small>Listagem de Médico</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Noticias</li>
        <li class="active">Listagem</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>RG</th>
                                <th>CPF</th>
                                <th>CRM</th>
                                <th>Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $li): ?>
                                <tr>
                                    <th><?php echo $li['tx_nome']; ?></th>
                                    <th><?php echo $li['tx_rg']; ?></th>
                                    <th><?php echo $li['tx_cpf']; ?></th>
                                    <th><?php echo $li['nr_crm']; ?></th>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <a href="<?php echo site_url('medico') . '/' . $li['id_pessoa']; ?>">
                                                    <button class="btn  btn-success ">Editar</button>
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Titulo</th>
                                <th>Subititulo</th>
                                <th>Açoes</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
