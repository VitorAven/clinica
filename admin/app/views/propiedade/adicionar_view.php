<section class="content-header">
    <h1>
        Adicionar Propriedade

    </h1>
    <div></div>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('propiedade/list'); ?>">Propriedade</a></li>
        <li class="active">Adicionar</li>
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

                <form role="form"  method="post" action="" enctype="multipart/form-data" >
                    <input type="hidden" value="" id="id_propiedade" name="id_propiedade">
                    <div class="box-body">
                        <?php
                        $this->load->view('propiedade/formpropiedade', $this);
                        ?>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>          </div>   <!-- /.row -->
</section><!-- /.content -->
