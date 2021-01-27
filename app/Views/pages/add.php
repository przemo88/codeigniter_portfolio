<?= \Config\Services::validation()->listErrors(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pages.css'); ?>">
<section>
<div class="container">
        <div class="row">
        <h1 class="col-lg-4 offset-lg-4 title">Dodaj stronę</h1>
        <form class="col-lg-12 col-12" action="/pages/add" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
    
            <div class="col-lg-8 offset-lg-2">
                <label for="name" class="col-lg-4 offset-lg-4 form_text">Nazwa</label>
                <input type="input" name="name" class="col-lg-12" />
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="description" class="col-lg-4 offset-lg-4 form_text">Opis</label>
                <textarea name="description" class="col-lg-12 text_area"></textarea>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="github" class="col-lg-4 offset-lg-4 form_text">Github</label>
                <input type="input" class="col-lg-12" name="github" />
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="website" class="col-lg-4 offset-lg-4 form_text">Strona</label>
                <input type="input" class="col-lg-12" name="website"/>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="image" class="col-lg-4 offset-lg-4 form_text">Zdjęcie</label>
                <input type="file" name="image" value=<?= esc($pages['image']); ?> />
                <input type="submit" name="submit" class="col-lg-2 offset-lg-5 mt-50" value="Zapisz" />
       
        </form>
        
        <div class="link"><a href="/pages">Powrót</div>
    </div>
</div>

</section>