<div id="main">

    <!-- Featured -->
    <div class="container">
        <header style="text-align: center">
            <h2>Selecione uma Cultura</h2>
        </header>
        <div class="row">
            <section class="6u div_praga"> 
                <a href="<?php echo site_url('cultura/milho'); ?>" class="pragas_lita imagem">
                    <div class="div_img_over">
                        <img src="<?php echo base_url('admin/assets/img/culturas/milho.jpg'); ?>" alt="" style="">
                    </div>
                </a>

                <b>Milho</b>

            </section>
            <section class="6u div_praga"> 
                <a href="<?php echo site_url('cultura/soja'); ?>" class="pragas_lita imagem">
                    <div class="div_img_over">
                        <img src="<?php echo base_url('admin/assets/img/culturas/soja.jpg'); ?>" alt="" style="">
                    </div>
                </a>

                <b>Soja</b>

            </section>




        </div>

    </div>
    <!-- /Featured -->



    <!-- Main Content -->
    <div class="container">
        <div class="divider"></div>
        <div class="row">
            <div class="6u">
                <section>
                    <header>
                        <h2>Resumo</h2>
                    </header>
                    <p>
                        Este trabalho teve como objetivo o desenvolvimento de um sistema web em linguagemde programação PHP, utilizando o framework CodeIgniter, que auxilia o produtor rural aidentificar e como tratar as pragas das respectivas culturas de milho e soja. Por estarazão o sistema possui informações importantes das pragas, estas informações sãonecessárias para o gerenciamento e tratamento do plantio. O sistema também contaracom os possíveis tratamentos para cada tipo de praga. Para a elaboração do trabalhofoi feito a revisão bibliográfica por meio de pesquisa bibliográfica, o levantamento dosrequisitos do sistema por meio de pesquisa bibliográfica e pesquisa de levantamento,a modelagem do sistema e modelagem do banco de dados, a criação do banco dedados, a programação do sistema e os testes do sistema.
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
    $(function () {
        $('.active').removeClass('active');
        $('.homeMenu').addClass('active');
    });
</script>