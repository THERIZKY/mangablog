<?= $this->extend('admin/layoutAdmin/template') ?>
<?= $this->section('dashboard') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col ">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Manga Di Upload</h5>
                    <h2 class="card-text"><?= $jumlahManga ?> Manga</h2>
                    <br>
                    <a href="/admin/manga" class="card-link">See All Manga</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Chapter Di Upload</h5>
                    <h2 class="card-text"><?= $jumlahChapter ?> Chapter</h2>
                    <br>
                    <a href="#" class="card-link">See All Chapter</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Blog Di Upload</h5>
                    <h2 class="card-text">Blog Is Comming Soon</h2>
                    <a href="#" class="card-link">See All Manga</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>