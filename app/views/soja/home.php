<div id="main">

    <!-- Featured -->
    <div class="container">
        <header>
            <h2>Soja</h2>
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
                    De acordo com a Embrapa (2017), a soja é originária do Leste da Ásia, prin-cipalmente ao longo do Yangtse, na China. A Instituição afirma que a soja comoconhecemos hoje é cruzamento de duas espécies de soja selvagem, que foram modifi-cadas e melhoradas por cientistas chineses, a importância da soja na alimentação paraa antiga civilização chinesa era tal, que a soja era considerada sagrada assim comooutros tipos de grãos, os primeiros relatos do grão datam do período 2883 e 2838 AC.    
                    
                    </p>
                    <p>
                        Segundo Embrapa (2017), somente na década de 60, o Brasil passa a enxergara soja como um fator importante para o desenvolvimento econômico, como sucessorda produção do trigo no sul do Brasil. Ainda segundo o autor, a produção de soja já era
18uma necessidade estratégica, com produção de 500 mil toneladas do grão no país. Emmeados de 1970, com o aumento do preço do grão de soja no mercado internacional,segundo o autor Embrapa (2017), o aumento do preço faz com que os produtores eo governo despertarem o interesse na produção de soja, a safra Brasileira ocorre naentressafra AmericanaSegundo Embrapa (2017), graças aos investimentos em pesquisa levaram àadaptação da soja para climas tropicais, assim permitindo a produção do mesmo noBrasil, em regiões de baixas latitudes e entre os tópicos, assim os cientistas brasileirosrevolucionaram a história da soja mundial, fazendo com que o impacto de sua produçãono mercado, se tornasse importante, nas décadas de 80 e 90. Ainda o autor ressaltaque atualmente os líderes mundiais de produção de soja são, Estados Unidos, Brasil,Argentina, China, Índia e Paraguai.Conforme Freitas (2017) a soja foi introduzida no Brasil pelos japoneses imigran-tes no ano de 1908, porém sua produção só ganhou foco em 1970, devido pais estarfocado na produção de café. O autor ainda diz que a soja só obteve esse crescimentona produção no ano de 1970 devido à necessidade do mercado internacional.De acordo com o autor, o Centro-Oeste surgiu com uma nova opção de cultivoda soja, pois surgiram insumos que corrigiram as alterações ou as deficiências dosolo, deixando-o apto para o cultivo da soja. O Centro-Oeste hoje é o segundo maiorprodutor de soja do país, ocupando uma condição geopolítica que favorece a produçãodo grão (FREITAS, 2017).
                    </p>
                </section>
            </div>
        </div>

    </div>
    <!-- /Main Content -->

</div>
<script>
    $('#banner').css('background', "#333 url(<?php echo base_url('admin/assets/img/culturas/soja.jpg'); ?>) no-repeat center ");
     $('.active').removeClass('active');
      $('.sojaMenu').addClass('active');
        $('#banner').css('background-size', "100%");
</script>