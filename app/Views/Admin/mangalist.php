<?= $this->extend('admin/layoutAdmin/template'); ?>
<?= $this->section('dashboard'); ?>
<h1 class="text-center pb-5 text-uppercase">Manga Yang Sudah Di Publish</h1>
<div class="d-flex gap-3 justify-content-center flex-wrap">
    <?php foreach ($manga as $m) : ?>
        <div class="card" style="width: 15rem;">
            <img src="<?= $m['cover'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $m['mangaTitle']; ?></h5>
                <p class="card-text"><?= $m['deskripsi']; ?></p>
            </div>
            <a href="#" class="btn btn-warning m-2">Edit</a>
            <a href="#" class="btn btn-danger m-2">Delete</a>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>