<?= \Config\Services::validation()->listErrors(); ?>



<form action="/start/send" method="post">
    <?= csrf_field() ?>

    <label for="name">Imię</label>
    <input type="input" name="name" /><br />

    <label for="github">Email</label>
    <input type="input" name="email" /><br />

    <label for="message">Wiadomość</label>
    <textarea name="message"></textarea><br />

    <input type="submit" name="submit" value="Wyślij" />


</form>
