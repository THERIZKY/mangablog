<?= $this->extend('manga/layoutManga/templateManga'); ?>
<?= $this->section('manga'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach ($chapters as $ch) : ?>
                <p class="no-click object-fit-cover"><?= $ch->image; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>