
<section class="content-header">
    <h1>
        <?php
        if (empty($titulo)) {
            $titulo = '';
        }
        if (!empty($populateForm)) {
            echo 'Editar ' . $titulo;
        } else {
            echo 'Inserir ' . $titulo;
        }
        ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('menu'); ?>">Perguntas</a></li>
        <li class="active">
            <?php
            if (!empty($populateForm)) {
                echo $populateForm['menu']['tx_nome_menu'];
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
                    <input type="hidden" name="menu[id_menu]" id="menu-id_menu">
                    <div class="box-body">

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome Menu</label>
                            <input type="text" class="form-control" id="menu-tx_nome_menu" name="menu[tx_nome_menu]" placeholder="Digite o Nome" value="" >
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome Controller</label>
                            <input type="text" class="form-control" id="menu-tx_nome_controller" name="menu[tx_nome_controller]" placeholder="Digite o Nome" value="" >
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

                            <a href="<?php echo site_url('menu'); ?>" class="btn btn-success">Voltar</a>
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
                    url: '<?php echo site_url('menu/excluir') ?>',
                    data: {id_menu: $('#menu-id_menu').val()}
                }).done(function () {

                    window.location.replace("<?php echo site_url('menu'); ?>");
                    modalClose('danger');
                    openModal('success', 'Excluido com sucesso', 'Sucesso');
                }).fail(function () {
                    alert("error");
                }).always(function () {
                    alert("complete");

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

       
    });
</script>