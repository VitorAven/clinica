<?php // print_r($noticias);die();      ?>
<!--
            Array
(
    [0] =&gt; Array
        (
            [id] =&gt; 1
            [nome] =&gt; teste
            [url] =&gt; www.google.com.br
            [img] =&gt; teste.png
            [ativo] =&gt; 1
            [desc] =&gt; 
        )
data-remote='<?php //echo site_url('galeria/interna') . "/" . $gal['id'];    ?>'
)-->

<script>
    $(document).ready(function () {

        $(".galerias").colorbox({iframe: true, width: "80%", height: "80%"});
         $(".noticias").colorbox({iframe: true, width: "500px", height: "80%"});

    });
</script>

<div class="flexslider">
    <ul class="slides">
        <?php foreach ($banners as $ban): ?>
            <li>
                <?php if (!empty($ban['url'])): ?>
                    <a  href="<?php echo $ban['url']; ?>">
                    <?php endif; ?>
                    <img src="<?php echo base_url('/admin/assets/uploads/banners') . "/" . "tumb_" . $ban['img']; ?>" alt="">
                    <div class="flex-caption">
                        <h2><?php echo $ban['nome']; ?></h2>
                        <span></span>
                        <p><?php echo!empty($ban['desc']) ? $ban['desc'] : ''; ?></p>
                    </div>
                    <?php if (!empty($ban['url'])): ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div id="services" class="section-cotent">
    <div class="container">
        <div class="title-section text-center">
            <h2>Nossos Serviços</h2>
            <span></span>
        </div> <!-- /.title-section -->
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <div class="service-header">
                        <i class="fa fa-umbrella"></i>
                        <h3>Clean Design</h3>
                    </div>
                    <div class="service-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, sapiente, saepe, velit, repellendus doloribus blanditiis repudiandae nobis optio quasi nulla aliquam nisi voluptatibus.
                    </div>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <div class="service-header">
                        <i class="fa fa-desktop"></i>
                        <h3>Fully Responsive</h3>
                    </div>
                    <div class="service-description">
                        <a href="http://www.templatemo.com/preview/templatemo_454_compass" target="_parent">Compass</a> is free responsive mobile website template from templatemo website. You can use this template for your websites. Please tell your friends about our website. Thank you for visiting us.
                    </div>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <div class="service-header">
                        <i class="fa fa-cogs"></i>
                        <h3>Easy to Edit</h3>
                    </div>
                    <div class="service-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, sapiente, saepe, velit, repellendus doloribus blanditiis repudiandae nobis optio quasi nulla aliquam nisi voluptatibus.
                    </div>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <div class="service-header">
                        <i class="fa fa-heart"></i>
                        <h3>Quick Support</h3>
                    </div>
                    <div class="service-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, sapiente, saepe, velit, repellendus doloribus blanditiis repudiandae nobis optio quasi nulla aliquam nisi voluptatibus.
                    </div>
                </div> <!-- /.service-item -->
            </div> <!-- /.col-md-3 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#services -->

<div id="portfolio" class="section-content">
    <div class="container">
        <div class="title-section text-center">
            <h2>Galerias de fotos</h2>
            <span></span>
        </div> <!-- /.title-section -->
        <div class="row">
            <?php foreach ($galerias as $gal): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">

                        <a class='galerias' href="<?php echo site_url('galeria/interna') . "/" . $gal['id']; ?>" >
                            <img src="<?php echo base_url('/admin/assets/uploads/galeria') . "/tumb_" . $gal['capa']; ?>" alt="<?php echo $gal['nome']; ?>">
                            <div class="overlay">
                                <div class="inner">
                                    <h4><?php echo $gal['nome']; ?></h4>
                                    <span></span>
                                </div>
                            </div> <!-- /.overlay -->                    
                        </a>
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
            <?php endforeach; ?>
        </div> <!-- /.row -->

    </div> <!-- /.container -->
</div> <!-- /#portfolio -->

<div id="about" class="section-cotent">
    <div class="container">
        <div class="title-section text-center">
            <h2>Sobre a Expoair</h2>
            <span></span>
        </div> <!-- /.title-section -->
        <div class="row">
            <div class="col-md-8">
                <h4 class="widget-title">Company Background</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, ex, amet, quisquam magni quasi modi sint accusamus architecto velit veritatis nobis autem repellat dolore quis atque totam laudantium ab sed impedit beatae esse error culpa voluptatem eius et. <br><br>Aut, nulla, debitis voluptates doloribus quisquam maiores repudiandae nam culpa voluptatibus alias earum magnam numquam. Consectetur, ratione, ipsam totam et nesciunt atque temporibus fuga quos rem deserunt tempore dolore eaque dolorum a doloremque optio nihil pariatur aliquid ex id officiis aliquam sed.</p>
            </div> <!-- /.col-md-3 -->
            <div class="col-md-4 our-skills">
                <h4 class="widget-title">Our Skills</h4>
                <ul class="progess-bars">
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">Design 90%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">HTML CSS 75%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">WordPress 85%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">Marketing 95%</div>
                        </div>
                    </li>
                </ul>
            </div> <!-- /.col-md-3 -->
        </div> <!-- /.row -->

    </div> <!-- /.container -->
</div> <!-- /#about -->



<div id="noticias" class="section-cotent">
    <div class="container">
        <div class="title-section text-center">
            <h2>Notícias</h2>
            <span></span>
        </div> <!-- /.title-section item -->

        <div class="row">
            <div class="our-team">
                <div id="noticias_home" class="owl-carousel owl-theme">

                    <?php foreach ($noticias as $not): ?>
                        <div class="item col-md-12 col-sm-12">

                            <div class="team-member">
                                <div class="member-img">
                                    
                                        <img src="<?php echo base_url('/admin/assets/uploads/noticias') . "/tumb_" . $not['capa']; ?>" alt="Tracy">
                                    
                                    <div class="overlay">
                                        <ul class="social">
                                            <li><a href="#" class="fa fa-facebook"></a></li>
                                            <li><a href="#" class="fa fa-twitter"></a></li>
                                            <li><a href="#" class="fa fa-instagram"></a></li>
                                        </ul>
                                    </div> <!-- /.overlay -->
                                </div>
                                <div class="inner-content">
                                    <h5><?php echo $not['titulo']; ?></h5>
                                    
                                    <span><?php echo $not['sub']; ?></span>
                                    <a class="noticias" href="<?php echo site_url('noticias')."/interna/".$not['id'];?>">  <p>Veja mais</p></a>
                                </div>
                            </div> 

                            <!-- /.team-member -->
                        </div> <!-- /.col-md-4 -->
                    <?php endforeach; ?>




                </div><!-- Noticia-->
            </div> <!-- /.our-team -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#about -->

<div id="contact" class="section-cotent">
    <div class="container">
        <div class="title-section text-center">
            <h2>Contato</h2>
            <span></span>
        </div> <!-- /.title-section -->
        <div class="row">
            <div class="col-md-7 col-sm-6">
                <h4 class="widget-title">Envie sua mensagem</h4>
                <div class="contact-form">
                    <p class="full-row">
                        <label for="name-id">Nome:</label>
                        <input type="text" id="name-id" name="name-id">
                    </p>
                    <p class="full-row">
                        <label for="email-id">Email:</label>
                        <input type="text" id="email-id" name="email-id">
                    </p>
                    <p class="full-row">
                        <label for="subject-id">Titulo  :</label>
                        <input type="text" id="subject-id" name="subject-id">
                    </p>
                    <p class="full-row">
                        <label for="message">Mensagem:</label>
                        <textarea name="message" id="message" rows="6"></textarea>
                    </p>
                    <input class="mainBtn" type="submit" name="" value="Enviar">
                </div>
            </div> <!-- /.col-md-3 -->
            <div class="col-md-5 col-sm-6">
                <h4 class="widget-title">Endereço</h4>
                <div class="map-holder">
                    <div class="google-map-canvas" id="map-canvas" style="height: 250px;">
                    </div>
                </div> <!-- /.map-holder -->
                <div class="contact-info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, modi, non ducimus nesciunt in commodi similique aliquam omnis ea at!</p>
                    <span><i class="fa fa-home"></i>390 In luctus justo vel nisi, Duis mattis 10440</span>
                    <span><i class="fa fa-phone"></i>010-020-0340</span>
                    <span><i class="fa fa-envelope"></i>info@company.com</span>
                </div>
            </div> <!-- /.col-md-3 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#contact -->