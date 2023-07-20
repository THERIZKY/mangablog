<?= $this->extend('admin/layoutAdmin/template') ?>
<?= $this->section('dashboard') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col ">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Manga Di Upload</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">See All Manga</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Chapter Di Upload</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">See All Manga</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-success" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Blog Di Upload</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">See All Manga</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>