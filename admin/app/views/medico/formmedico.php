
<?php
$especialidades = $this->data['especialidades'];
?>

<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">CRM</label>
    <input type="text" name="nr_crm" id="nr_crm" placeholder="Digite o CRM" class="form-control" required>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Especialidade 1</label>

    <select type="text" name="id_especialidade1" id="id_especialidade1" placeholder="Digite o CRM" class="form-control" required>
        <option value="" >Selecione uma especialidade</option>
        <?php
        foreach ($especialidades as $esp):
            ?>
            <option value="<?= $esp['id_especialidade']; ?>" ><?= $esp['tx_nomeespecialidade']; ?></option>
            <?php
        endforeach;
        ?>
    </select>
</div>
<div class="form-group col-lg-6  col-md-6 col-sm-12 col-xs-12">
    <label for="exampleInputNome">Especialidade 2</label>
    <select type="text" name="id_especialidade2" id="id_especialidade2" placeholder="Digite o CRM" class="form-control" required>
        <option value="" >Selecione uma especialidade</option>
        <?php
        foreach ($especialidades as $esp):
            ?>
            <option value="<?= $esp['id_especialidade']; ?>" ><?= $esp['tx_nomeespecialidade']; ?></option>
            <?php
        endforeach;
        ?>
    </select>   
</div>