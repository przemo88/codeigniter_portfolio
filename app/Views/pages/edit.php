<?= \Config\Services::validation()->listErrors(); ?>

<form action="/pages/update" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="name">ID</label>
    <input type="input" name="id" value=<?= esc($pages['id']); ?> readonly /><br />

    <label for="name">Nazwa</label>
    <input type="input" name="name" value=<?= esc($pages['name']); ?> /><br />

    <label for="description">Opis</label>
    <textarea name="description"><?= esc($pages['description']); ?></textarea><br />

    <label for="github">Github</label>
    <input type="input" name="github" value=<?= esc($pages['github']); ?> /><br />

    <label for="website">Strona</label>
    <input type="input" name="website" value=<?= esc($pages['website']); ?>/><br />

    <label for="image">image</label>
    <input type="file" name="image" value=<?= esc($pages['image']); ?> /><br />

    <input type="submit" name="submit" value="Edytuj" />

</form>
