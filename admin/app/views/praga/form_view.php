
<section class="content-header">
    <h1>
        <?php
        if (empty($titulo)) {
            $titulo = '';
        }
        if (!empty($populateForm)) {
            echo 'Editandor ' . $titulo;
        } else {
            echo 'Inserir ' . $titulo;
        }
        ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('praga'); ?>">Pragas</a></li>
        <li class="active">
            <?php
            if (!empty($populateForm)) {
                echo $populateForm['praga']['tx_nomecomum'];
            } else {
                echo 'Inserindo';
            }
            ?>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class=" col-lg-12 col-md-12 ">

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Informações</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <form role="form" method="post" action="" enctype="multipart/form-data" >
                    <input type="hidden" name="praga[id_praga]" id="praga-id_praga">
                    <div class="box-body">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome Comum</label>
                            <input type="text" class="form-control" id="praga-tx_nomecomum" name="praga[tx_nomecomum]" placeholder="Digite o Nome" value="" required>
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome Cientifico</label>
                            <input type="text" class="form-control" id="praga-tx_nomecientifico" name="praga[tx_nomecientifico]" placeholder="Digite o Sobrenomeome" value="" required>
                        </div>

                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">

                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Descrição<small>da pragas</small></h3>
                                    <!-- tools box -->
                                    <!--                                    <div class="pull-right box-tools">
                                                                            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                                                            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                                                        </div> /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>

                                    <textarea id="praga-tx_descricao" name="praga[tx_descricao]" class="praga-tx_descricao" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                </div>
                            </div>

                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <?php
                        if (!empty($populateForm)) {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-danger btnExcluir">Excluir</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-primary">Inserir</button>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <a href="<?php echo site_url('praga'); ?>" class="btn btn-success">Voltar</a>
                        </div>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>          </div>   <!-- /.row -->
</section><!-- /.content -->

<script>

    $(function () {
<?php
if (!empty($populateForm)) {
    ?>
            $('.btnExcluir').click(function () {
                modalOpen('danger', 'Deseja realmente remover este registro?', 'Excluir');
            });
            $('.modal-danger .confirmModal').click(function () {
                $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('praga/excluir') ?>',
                    data: {id_praga: $('#praga-id_praga').val()}
                }).done(function () {
                    
                     alert("done");
                    modalClose('danger');
                    openModal('success', 'Excluido com sucesso', 'Sucesso');
                }).fail(function () {
                    alert("error");
                }).always(function () {
                     alert("complete");
                    window.location.replace("<?php echo site_url('praga'); ?>");
                });
            });
            $('.modal-success .confirmModal').click(function () {
                modalClose('success');
            });
    <?php
} else {
    ?>
    <?php
}
?>

        $(".praga-tx_descricao").wysihtml5();
    });
</script>