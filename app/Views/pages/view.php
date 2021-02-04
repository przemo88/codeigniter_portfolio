<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pages.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/font-awesome/css/font-awesome.min.css'); ?>">
<section>
        <div class="container">
        <div class="row show">

                <div class="col-lg-6 col-12 col-sm-12 offset-lg-3 show_title"><?= esc($pages['name']); ?></div>

                <div class="col-lg-6 col-12 col-sm-12 offset-lg-3"><img src="/image/<?= esc($pages['image']); ?>"></img></div>

                <div class="col-lg-6 col-6 col-sm-6 offset-lg-3">

                <a href="<?= esc($pages['github']); ?>">
                        <i class="fa fa-github  git fa-2x link link_icon"></i></a>   
                <a href="<?= esc($pages['website']); ?>">
                        <i class="fa fa-camera-retro fa-2x git link link_icon"></i>

                </div>

                <div class="col-lg-6 col-12 col-sm-12 offset-lg-3 link_href">
                <a href="/pages">Powrót</a>    
                <a href="/pages/<?= esc($pages['id']);  ?>/destroy">Usuń</a>
                <a href="/pages/<?= esc($pages['id']);  ?>/edit">Edytuj</a>
                <div class="col-lg-12 col-12 col-sm-12 desc_style">
                <?= esc($pages['description']); ?>
                </div>

                </div>

        </div>
        </div>
</section>