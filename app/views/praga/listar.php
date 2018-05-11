
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