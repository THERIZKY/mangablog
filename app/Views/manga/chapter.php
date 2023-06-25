<?= $this->extend('manga/layoutManga/templateManga'); ?>
<?= $this->section('manga'); ?>
<div class="manga-image-container">
    <?php foreach ($chapters as $ch) : ?>
        <div class="manga-image no-click">
            <?= $ch->image; ?>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
<!-- <div class="manga-image no-click">
    <?php foreach ($chapters as $ch) : ?>
        <?= $ch->image; ?>
    <?php endforeach; ?>
</div> -->