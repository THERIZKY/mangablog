<?= $this->extend('admin/layoutAdmin/template'); ?>
<?= $this->section('dashboard'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Tambah Manga</h1>
            <form action="/admin/save/manga" method="post">
                <div class="mb-3">
                    <label for="mangaTitle" class="form-label">Judul Manga : </label>
                    <input type="text" class="form-control" id="mangaTitle" name="mangaTitle" placeholder="Masukan Judul Manga Disini">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>