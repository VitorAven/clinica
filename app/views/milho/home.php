<div id="main">

    <!-- Featured -->
    <div class="container">
        <header>
            <h2>Milho</h2>
        </header>
        <div class="row">

            <div id="main">

                <!-- Featured -->
                <div class="container">
                    <header>
                        <h2>Listagem das pragas</h2>
                    </header>
                    <div class="row">
                        <?php foreach ($pragas as $pra):
                            ?>
                            <section class="3u div_praga"> 
                                <a href="<?php echo site_url('praga/') . '/' . $pra['id_praga']; ?>" class="pragas_lita imagem">
                                    <div class="div_img_over">
                                        <img src="<?php echo (!empty($pra['img']['tx_url'])) ? base_url('admin/assets/img/praga') . '/' . $pra['img']['tx_url'] : base_url('assets/img') . '/pics01.jpg' ?>" alt="">
                                    </div>
                                </a>
                                <?php if (!empty($pra['tx_nomecientifico'])): ?>
                                    <b>Nome Cientifico:</b><p><?php echo $pra['tx_nomecientifico']; ?></p>
                                <?php endif; ?>
                                <?php if (!empty($pra['tx_nomecomum'])): ?>
                                    <b>Nome Comum:</b><p><?php echo $pra['tx_nomecomum']; ?></p>
                                <?php endif; ?>

                            </section>
                        <?php endforeach; ?>

                    </div>
                    <div class="row">
                        <?php echo $pagi; ?>
                    </div>

                </div>
                <!-- /Featured -->





            </div>


        </div>

    </div>
    <!-- /Featured -->



    <!-- Main Content -->
    <div class="container">
        <div class="divider"></div>
        <div class="row">
            <div class="12u">
                <section>
                    <header>
                        <h2>Resumo</h2>
                    </header>
                    <p>
                        A cultura do milho foi a outra das culturas escolhidas durante o planejamentodo sistema devido a sua grande produção no Brasil. As culturas de milho e soja somamaproximadamente 87% da produção de grãos no país. (CONAB, 2017)
                    </p>
                    <p>
                        Segundo o CIB (2017), a partir da gramínea Teosinte originaria do milho, ohomem fazia seleção artificial das plantas que produziam mais grãos forçando assimuma seleção genética, estes cultivados na Região do México, o milho então se tornavadoméstico, assim como conhecemos hoje. A estrutura das plantas que retinha os grãose os organizavam em pequenos pares de fileiras, atraiu os nativos. Assim os nativosfizeram a seleção das espigas com mais grão, fazendo com que a planta evoluísse eproduzisse menos espigas, porém com mais fileiras de grãos.Ainda de acordo com o CIB (2017), com o tempo as plantas mais vigorosas,produtivas e de maior qualidade eram escolhidas e essas variações contribuíram aosurgimento de variedades com capacidade de adaptação para diferentes altitudes.Essa domesticação foi tão intensa que o milho atualmente não é capaz de sobreviverno campo sem a participação do homem.
                    </p>
                </section>
            </div>
        </div>

    </div>
    <!-- /Main Content -->

</div>
<script>
    $('#banner').css('background', "#333 url(<?php echo base_url('admin/assets/img/culturas/milho.jpg'); ?>) no-repeat center ");
    $('.active').removeClass('active');
    $('.milhoMenu').addClass('active');
    $('#banner').css('background-size', "100%");
</script>