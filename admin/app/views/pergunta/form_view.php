
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
        <li><a href="<?php echo site_url('pergunta'); ?>">Perguntas</a></li>
        <li class="active">
            <?php
            if (!empty($populateForm)) {
                echo $populateForm['pergunta']['tx_nome'];
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
                    <input type="hidden" name="pergunta[id_pergunta]" id="pergunta-id_pergunta">
                    <div class="box-body">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome</label>
                            <input type="text" class="form-control" id="pergunta-tx_nome" name="pergunta[tx_nome]" placeholder="Digite o Nome" value="" readonly="">
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Data pergunta</label>
                            <input type="text" class="form-control " data-date-format="mm/dd/yyyy" id="pergunta-dt_pergunta" name="pergunta[dt_pergunta]" placeholder="Digite o Sobrenomeome" value=""  readonly="">
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">   
                            <label for="exampleInputNome">Pergunta</label>

                            <textarea id="pergunta-tx_pergunta" name="pergunta[tx_pergunta]" class="pergunta-tx_pergunta" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" readonly=""></textarea>
                        </div>



                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">

                            <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Resposta<small><br>Entes de enviar revise se está nas normas</small></h3>
                                    <!-- tools box -->
                                    <!--                                    <div class="pull-right box-tools">
                                                                            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                                                            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                                                        </div> /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>

                                    <textarea id="pergunta-tx_resposta" name="pergunta[tx_resposta]" class="pergunta-tx_resposta" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                </div>
                            </div>

                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <a href="<?php echo site_url('pergunta'); ?>" class="btn btn-success">Voltar</a>
                        </div>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>          </div>   <!-- /.row -->
</section><!-- /.content -->

<script>

    $(function () {



//        $(".pergunta-tx_descricao").wysihtml5();
    });
</script>