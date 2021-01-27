<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pages.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/font-awesome/css/font-awesome.min.css'); ?>">

<?php if (! empty($pages) && is_array($pages)) : ?>
<section class="portfolio">
<div class="container">
    <div class="row show">
    <?php foreach ($pages as $item): ?>

        <div class="website margin_top margin_xl_top col-lg-5 col-12 offset-lg-1 image">
        <div class="col-lg-12 col-12 col-sm-12 mt50 show_title"><?= esc($item['name']); ?></div>
        <div class="link"><a href="/pages/<?= esc($item['id']);?>">Opis</a></div>
        <div><img src="/image/<?= esc($item['image']); ?>"></img></div>
        </div>
   
        
    <?php endforeach; ?>
   

<?php else : ?>

    <h3 class="show_title">Brak stron</h3>

    <p class="show_title">Dodaj nową stronę.</p>
        </div>
    </div>
</section>
<?php endif ?>