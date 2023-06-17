<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1><?= $mangatitle; ?></h1>
            <img src="<?= $cover ?>" class="cover" />
            <div class="alert" role="alert"><?= $deskripsi ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>Daftar Chapter</h1>
            <div class="bg-body-tertiary p-3 overflow-auto mb-5" style="max-height: 450px; height: 450px;">
                <?php if (empty($chapters)) : ?>
                    <div class="alert alert-warning text-center">Manga Tidak Memiliki Chapter</div>
                <?php else : ?>
                    <?php foreach ($chapters as $ch) : ?>
                        <a href="/manga/<?= $ch->slug ?>/<?= $ch->chapter ?>">
                            <div class="alert alert-secondary text-center"><?= $ch->judul; ?></div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>