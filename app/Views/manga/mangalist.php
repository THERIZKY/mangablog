<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-row flex-wrap justify-content-center justify-content-lg-start gap-3">
                <?php $i = 0; ?>
                <?php foreach ($mangas as $manga) : ?>
                    <a href="/manga/<?= $slug[$i]; ?>">
                        <div class="mlist card border-dark m-3">
                            <img src="<?= $manga->cover; ?>" class="card-img-top" />
                            <div class="card-body">
                                <h4 class="card-title text-center"><?= $manga->title; ?></h4>
                            </div>
                        </div>
                    </a>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>