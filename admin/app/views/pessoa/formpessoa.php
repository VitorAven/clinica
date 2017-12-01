<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Nome</label>
    <input type="text" class="form-control" id="tx_nome" name="tx_nome" placeholder="Digite o Nome" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">sobreome</label>
    <input type="text" class="form-control" id="tx_sobrenome" name="tx_sobrenome" placeholder="Digite o Sobrenomeome" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Data de Nascimento</label>
    <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" placeholder="" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">RG</label>
    <input type="text" class="form-control" id="tx_rg" data-inputmask='"mask": "99.999.999-**"' name="tx_rg" placeholder="Digite o RG" data-mask required>
</div>

<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">CPF</label>
    <input type="text" name="tx_cpf" id="tx_cpf" placeholder="Digite o CPF" onfocusout="validaCpf();" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask required>
</div>

