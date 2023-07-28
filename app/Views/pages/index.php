<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-3 text-uppercase"><span class="text-primary-emphasis">Latest</span> Manga</h1>
            <div class="d-flex gap-4 flex-wrap justify-content-center justify-content-md-start">
                <?php $i = 0; ?>
                <?php foreach ($latest as $manga) : ?>
                    <a href="/manga/<?= $slug[$i]; ?>">
                        <div class="card" style="width: 15rem; height: 27rem;">
                            <img src="<?= $manga->cover; ?>" class="card-img-top">
                            <div class="card-body">
                                <p class="text-center"><b><?= $manga->title; ?></b></p>
                            </div>
                        </div>
                    </a>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>