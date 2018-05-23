

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>AgroHelp </b><br>Login de voluntario</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Preencha os campos para acessar o painel</p>



        <form action="<?php echo current_url(); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Login"  name="login[login]"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="login[senha]"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">    
                    <!--                    <div class="checkbox icheck">
                                            <label>
                                                <input type="checkbox" name="login[lembrar]" value="S"> Lembrar senha
                                            </label>
                                        </div>                        -->
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
            </div>
        </form>

        <!-- <div class="social-auth-links text-center">
             <p>- OR -</p>
             <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
             <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
         </div><!-- /.social-auth-links -->

        <a href="#">Recuperar senha</a><br>
        <a href="#" onclick="$('.modal-novo-registro').modal('show');">Registrar</a><br>
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<div class="example-modal">
    <div class="modal modal-novo-registro">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastro de voluntario</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo current_url(); ?>" id="formcadastro" method="post">
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Nome</label>
                            <input type="text" class="form-control" id="usuario-tx_nome_usuario" name="usuario[tx_nome_usuario]" placeholder="Digite seu nome" value=""  required=""/>
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Data nascimento</label>
                            <input type="date" class="form-control" id="usuario-dt_nasc_usuario" name="usuario[dt_nasc_usuario]" placeholder="Digite data de nascimento" value=""  required=""/>
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Senha</label>
                            <input type="password" class="form-control " id="usuario-tx_senha_usuario" name="usuario[tx_senha_usuario]" placeholder="Digite seu email" value="" required="">
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12 has-error">
                            <label for="exampleInputNome">Repita a senha</label>
                            <input type="password" class="form-control  has-success" id="usuario-tx_senha_usuario_rep" name="usuario[tx_senha_usuario_rep]" placeholder="Digite seu email" value="" required="">
                        </div>
                        <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputNome">Email</label>
                            <input type="email" class="form-control validate[tx_email]" id="usuario-tx_email_usuario" name="usuario[tx_email_usuario]" placeholder="Digite seu email" value="" required="">
                        </div>
                        <div class="row">
                            <div class="col-xs-8">    
                                <button type="reset" class="btn btn-primary  btn-flat" data-dismiss="modal">Cancelar</button>


                            </div><!-- /.col -->
                            <div class="col-xs-4">
                                <button type="button" class="btn btn-primary btn-block btn-flat" onclick="enviarCadastro();">Enviar</button>
                            </div><!-- /.col -->
                        </div>
                    </form> 
                </div>
                <div class="modal-footer">
                    <label>
                        Seu cadastro pasará por aprovação antes de ser liberado
                    </label>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets') ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets') ?>//bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets') ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
                                    /**
                                     * Comment
                                     */
                                    function enviarCadastro() {
                                        $('#formcadastro').submit();
                                    }
                                    $(function () {
                                        $('#formcadastro').submit(function (e) {
                                            e.preventDefault();
                                            form = $('#formcadastro').serializeArray();
                                            if ($('#usuario'))
                                                console.log(form);
                                        });
                                    });
                                    $('#usuario-tx_senha_usuario_rep').keyup(function () {

                                        $('#usuario-tx_senha_usuario_rep').val();
                                        console.log($('#usuario-tx_senha_usuario').val());
                                        console.log($('#usuario-tx_senha_usuario_rep').val());
                                        if ($('#usuario-tx_senha_usuario_rep').val() == $('#usuario-tx_senha_usuario').val()) {
                                            console.log('funcionou');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').removeClass('has-error');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').addClass('has-success');
                                        } else {
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').removeClass('has-success');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').addClass('has-error');
                                        }

                                    });
                                    $('#usuario-tx_senha_usuario').keyup(function () {
                                        if ($('#usuario-tx_senha_usuario_rep').val() == $('#usuario-tx_senha_usuario').val()) {
                                            console.log('funcionou');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').removeClass('has-error');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').addClass('has-success');
                                        } else {
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').removeClass('has-success');
                                            $('#usuario-tx_senha_usuario_rep').parent('.form-group').addClass('has-error');
                                        }

                                    });
                                    $('.modal-novo-registro').on('shown.bs.modal', function () {
                                        $('.modal-novo-registro').trigger('focus')
                                    })
                                    $(function () {
                                        $('input').iCheck({
                                            checkboxClass: 'icheckbox_square-blue',
                                            radioClass: 'iradio_square-blue',
                                            increaseArea: '20%' // optional
                                        });
                                    });
</script>
