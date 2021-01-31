<?php if(\Config\Services::validation()->listErrors()): ?>
<div class="alert alert-danger text-center"><?= \Config\Services::validation()->listErrors(); ?></div>
<?php endif; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pages.css'); ?>">

<section>
<div class="container">
        <div class="row">
        <h1 class="col-lg-6 offset-lg-3 title">Formularz kontaktowy</h1>
        <form class="col-lg-12 col-12" action="/statics/send" method="post">
            <?= csrf_field() ?>
    
            <div class="col-lg-8 offset-lg-2">
                <label for="name" class="col-lg-4 offset-lg-4 form_text">Imię</label>
                <input type="input" name="name" class="col-lg-12" />
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="github" class="col-lg-4 offset-lg-4 form_text">Email</label>
                <input type="input" name="email" class="col-lg-12"/>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label for="message" class="col-lg-4 offset-lg-4 form_text">Wiadomość</label>
                <textarea class="col-lg-12 text_area" name="message"></textarea>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <input type="submit" name="submit" class="col-lg-2 offset-lg-5 mt-50 btn btn-outline-primary" value="Wyślij" />
        </form>
        
        <div class="link"><a href="/">Powrót</div>
    </div>
</div>
<section>




