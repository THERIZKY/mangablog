<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-row flex-wrap mt-2">
                <?php foreach ($mangas as $manga) : ?>
                    <div class="card m-3" style="width: 18rem">
                        <img src="<?= $manga['cover']; ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $manga['mangaTitle']; ?></h5>
                            <p class="card-text"><?= $manga['deskripsi']; ?></p>
                        </div>
                        <a href="/manga/<?= $manga['slug']; ?>" class="btn btn-primary m-4">Baca Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>