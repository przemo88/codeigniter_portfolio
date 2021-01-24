

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/pages/add" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="name">Nazwa</label>
    <input type="input" name="name" /><br />

    <label for="description">Opis</label>
    <textarea name="description"></textarea><br />

    <label for="github">Github</label>
    <input type="input" name="github" /><br />

    <label for="website">Strona</label>
    <input type="input" name="website" /><br />

    <label for="image">image</label>
    <input type="file" name="image" /><br />

    <input type="submit" name="submit" value="Dodaj" />

</form>