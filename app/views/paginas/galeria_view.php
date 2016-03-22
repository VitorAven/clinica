<?php //print_r($banners);die();     ?>
<?php if(empty($galerias)):?>
<div style="width: 100%; text-align: center; vertical-align: middle; line-height: 200px;">
    <h1 style="color: red; font-size: 35px;font-family: 'Open Sans', sans-serif;">Nenhuma foto encontrada neste album</h1>   
</div>
<?php endif;?>
<div class="flexslider">
    <ul class="slides">
        <?php foreach ($galerias as $img): ?>
            <li>
                <img src="<?php echo base_url('/admin/assets/uploads/galeria') . "/" . "tumb_" .$img['url']; ?>" alt="" class="img-responsive">
            </li>
        <?php endforeach; ?>
    </ul>
</div>
