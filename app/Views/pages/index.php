<h2><?= esc($name); ?></h2>

<?php if (! empty($pages) && is_array($pages)) : ?>

    <?php foreach ($pages as $item): ?>

        <h3><?= esc($item['name']); ?></h3>

     

        <div class="main">
            <?= esc($item['github']); ?>
        </div>

        <div class="main">
            <?= esc($item['website']); ?>
        </div>

        <div class="main">
            <?= esc($item['description']); ?>
        </div>

        <div class="main">
            <?= esc($item['image']); ?>
        </div>

  
        <img src="/image/<?= esc($item['image']); ?>"></img>
        <p><a href="/pages/<?= esc($item['id'], 'url'); ?>">szczegóły</a></p>
        <p><a href="/pages/<?= esc($item['id'], 'url'); ?>/edit">edytuj</a></p>
        <p><a href="/pages/<?= esc($item['id'], 'url'); ?>/destroy">usuń</a></p>
    <?php endforeach; ?>

<?php else : ?>

    <h3>Brak stron</h3>

    <p>Dodaj nową stronę.</p>

<?php endif ?>