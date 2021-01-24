
<form action="/pages/delete" method="post">
<label for="name">ID</label>
    <input type="input" name="id" value=<?= esc($pages['id']); ?> readonly /><br />
    <input type="input" name="image" value=<?= esc($pages['image']); ?> readonly /><br />
<input type="submit" name="submit" value="Usuń" />
</form>