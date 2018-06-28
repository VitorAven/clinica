<?php
//echo '<pre>';
//print_r($pragas);
//die();
?>
<style>
    .table tr td{
        border-collapse: collapse;
        border: 1px solid #000;
    }
</style>
<table  class="table" >
    <tr >
        <td colspan="4">Relatorio - acessos por pragas</td>
    </tr >
    <tr >
        <td>Nome científico</td>
        <td>Nome comum</td>
        <td>Culturas</td>
        <td>Qnt de acessos</td>

    </tr>
    <?php foreach ($pragas as $key => $value) { ?>
        <tr >
            <td><?php echo $value['tx_nomecientifico'] ?></td>
            <td><?php echo $value['tx_nomecomum'] ?></td>
            <td>
                <?php
                if ($value['st_milho'] != 0 && $value['st_soja'] != 0) {
                    echo 'Soja/ Milho';
                } elseif ($value['st_milho'] != 0) {
                    echo 'Milho';
                } elseif ($value['st_soja'] != 0) {
                    echo 'Soja';
                }
                ?>
            </td>
            <td><?php echo $value['nr_acesso'] ?></td>

        </tr>
    <?php } ?>
</table>


<?php ?>