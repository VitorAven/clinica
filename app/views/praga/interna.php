<?php
$praga = current($praga);
?>
<div id="main">

    <!-- Featured -->
    <div class="container">
        <header>
            <h2><?php echo $praga['tx_nomecientifico']; ?></h2>
        </header>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php foreach ($imgens as $key => $img): ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $key ?>" class="<?php echo $key == 0 ? 'active' : ''; ?>"></li>
                        <?php endforeach; ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <?php foreach ($imgens as $key => $img):
                            ?>
                        <div class="item <?php echo $key == 0 ? 'active' : ''; ?>" style="text-align: center">
                                <img src="<?php echo (!empty($img['tx_url'])) ? base_url('admin/assets/img/praga') . '/' . $img['tx_url'] : base_url('assets/img') . '/pics01.jpg' ?>" alt="<?php echo $praga['tx_nomecientifico']; ?>" style="display: inline-block">
                            </div>

                        <?php endforeach; ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
  
    <div class="divider"></div>
    <div class="row">
        <div class="6u">
            <section>
                <header>
                    <h2>Detalhes</h2>
                </header>
                <p>
                    <?php echo $praga['tx_descricao']; ?>   
                </p>
            </section>
        </div>
        <div id="sidebar1" class="3u">
            <section>
                <header>
                    <h2>Sidebar #1</h2>
                </header>
                <ul class="default alt">
                    <li class="fa fa-angle-right"><a href="#">Vestibulum luctus venenatis dui</a></li>
                    <li class="fa fa-angle-right"><a href="#">Integer rutrum nisl in mi</a></li>
                    <li class="fa fa-angle-right"><a href="#">Etiam malesuada rutrum enim</a></li>
                    <li class="fa fa-angle-right"><a href="#">Aenean elementum facilisis ligula</a></li>
                    <li class="fa fa-angle-right"><a href="#">Ut tincidunt elit vitae augue</a></li>
                </ul>
            </section>
        </div>
        <div id="sidebar2" class="3u">
            <section>
                <header>
                    <h2>Sidebar #2</h2>
                </header>
                <ul class="default alt">
                    <li class="fa fa-angle-right"><a href="#">Integer rutrum nisl in mi</a></li>
                    <li class="fa fa-angle-right"><a href="#">Etiam malesuada rutrum enim</a></li>
                    <li class="fa fa-angle-right"><a href="#">Aenean elementum facilisis ligula</a></li>
                    <li class="fa fa-angle-right"><a href="#">Ut tincidunt elit vitae augue</a></li>
                    <li class="fa fa-angle-right"><a href="#">Sed quis odio sagittis leo vehicula</a></li>
                </ul>
            </section>
        </div>
    </div>

</div>
<!-- /Main Content -->

</div>
<script>
//    $(function () {
//        $('.carousel').carousel({
//            interval: 2000
//        })
//    });
</script>