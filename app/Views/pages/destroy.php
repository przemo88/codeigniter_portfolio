<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pages.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/static.css'); ?>">
<section>
    <div class="container">
        <div class="row">
            <h1 class="col-lg-4 offset-lg-4 title">Usuń stronę</h1>
        </div>
        <div class="row form_border">
            <div class="col-12 col-lg-12 col-12 "><?= esc($pages['name']); ?></div>
            <form action="/pages/delete" method="post">
                <input type="submit" name="submit" value="Usuń" />
                    <input type="input" name="id" value=<?= esc($pages['id']); ?> hidden />
                    <input type="input" name="image" value=<?= esc($pages['image']); ?> hidden />
            </form>
            <form action="/pages" method="post">
                <input type="submit" name="submit" value="Powrót" />
            </form>
        </div>
        <div class="row">
            <p class="col-lg-4 offset-lg-4 text-center title">Czy na pewno chesz usunąć tę stronę ?</p>
        </div>
    </div>
</section>