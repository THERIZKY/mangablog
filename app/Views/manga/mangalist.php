<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-row flex-wrap justify-content-center justify-content-lg-start gap-3">
                <?php foreach ($mangas as $manga) : ?>
                    <a href="/manga/<?= $manga['slug']; ?>">
                        <div class="mlist card border-dark m-3">
                            <img src="<?= $manga['cover']; ?>" class="card-img-top" />
                            <div class="card-body">
                                <h4 class="card-title text-center"><?= $manga['mangaTitle']; ?></h4>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>