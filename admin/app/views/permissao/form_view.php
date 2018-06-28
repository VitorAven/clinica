
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
        <li><a href="<?php echo site_url('permissao'); ?>">Permissao</a></li>
        <li class="active">
            <?php
            if (!empty($populateForm)) {
                echo $populateForm['permissao']['tx_nome_menu'];
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
                    <input type="hidden" name="permissao[id_permissao]" id="permissao-id_permissao">
                    <div class="box-body">

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Usuario</label>
                            <select type="text" class="form-control" id="permissao-id_usuario" name="permissao[id_usuario]" placeholder="Digite o Nome" value="" >
                                <?php foreach ($usuario as $usu) { ?>
                                    <option value="<?php echo $usu['id_usuario']; ?>"><?php echo $usu['id_usuario']; ?> - <?php echo $usu['tx_nome_usuario']; ?> - <?php echo $usu['tx_email_usuario']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
//                        echo '<pre>';
//                        print_r($populateForm);
//                        die();
                        ?>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Menu</label>
                            <select type="text" class="form-control" id="permissao-id_menu" name="permissao[id_menu]" placeholder="Digite o Nome" value="" >
                                <?php foreach ($menu as $m) { ?>
                                    <option value="<?php echo $m['id_menu']; ?>"><?php echo $m['tx_nome_menu']; ?></option>
                                <?php } ?>
                            </select>
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

                            <a href="<?php echo site_url('permissao'); ?>" class="btn btn-success">Voltar</a>
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
                    url: '<?php echo site_url('permissao/excluir') ?>',
                    data: {id_permissao: $('#permissao-id_permissao').val()}
                }).done(function () {
                    window.location.replace("<?php echo site_url('permissao'); ?>");
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