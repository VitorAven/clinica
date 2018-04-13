<?php
$estados = $this->data['estados'];
?>
<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Bairro</label>
    <input type="text" class="form-control" id="tx_bairro" name="tx_bairro" placeholder="Digite o Bairro" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Endereço</label>
    <input type="text" class="form-control" id="tx_endereco" name="tx_endereco" placeholder="Digite o Endereço" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Número</label>
    <input type="number" class="form-control" id="nr_endereco" name="nr_endereco" placeholder="" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Estado</label>

    <select type="text" name="id_estado" id="id_estado" placeholder="Selecione o estado" onchange="retornaCidades();" class="form-control" required>
        <option value="" >Selecione um estado</option>
        <?php
        if(!empty($estados)):
        foreach ($estados as $est):
            ?>
            <option value="<?= $est['id_estado']; ?>" ><?= $est['tx_uf'] . '-' . $est['tx_nome']; ?></option>
            <?php
        endforeach;
        endif;
        ?>
    </select>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Cidade</label>

    <select type="text" name="id_cidade" id="id_cidade" placeholder="Selecione uma cidade" class="form-control" required>
        <option value="" >Selecione uma cidade</option>
<?php
        if(!empty($cidades)):
        foreach ($cidades as $cid):
            ?>
            <option value="<?= $cid['id_municipio']; ?>" ><?=  $cid['tx_nome']; ?></option>
            <?php
        endforeach;
        endif;
        ?>
    </select>
</div>

<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Telefone contato</label>
    <input type="text" name="tx_telefone" id="tx_telefone" placeholder="Digite o telefone para contato"  class="form-control" data-inputmask='"mask": "(99) 9 9999-9999"' data-mask required>
</div>

<script>
    $("#tx_cpf").change(function () {
        $.ajax({url: "<?= site_url('pessoa/validacpf'); ?>" + '/' + $('#tx_cpf').val(),
            success: function (result) {
                //alert('cpf ja existente');
                result = $.parseJSON(result);

                $.confirm({
                    title: 'CPF Já existente!',
                    content: 'Deseja carregar as informaçoes da pessoa?',
                    buttons: {
                        Sim: function () {
                            //"tx_rg":"48.760.209-00","tx_sobrenome":"borges basseto"}
                            $('#id_pessoa').val(result.id_pessoa);
                            $('#tx_nome').val(result.tx_nome);
                            $('#dt_nasc').val(result.dt_nasc);
                            $('#tx_cpf').val(result.tx_cpf);
                            $('#tx_rg').val(result.tx_rg);
                            $('#tx_sobrenome').val(result.tx_sobrenome);
                            $.alert('Dados Carregados com sucesso!' + result.id_pessoa);
                        },
                        Nao: function () {
                            $('#id_pessoa').val(result.id_pessoa);
                            $.alert('Os dados salvos irão substituir os dados atuais');
                        },
                    }
                });


            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            },
            complete: function (jqXHR, textStatus) {
//                        alert(textStatus);
            }

        });
    }
    );
</script>