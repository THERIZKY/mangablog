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
                <div class="mb-3">
                    <label for="mangaCover" class="form-label">Cover Manga</label>
                    <input type="text" class="form-control" id="mangaCover" name="mangaCover" placeholder="Masukan Link Cover Manga Disini">
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control" id="mangaDeskripsi" style="height: 100px" name="mangaDeskripsi" placeholder="Masukan Deskripsi Manga"></textarea>
                    <label for="mangaDeskripsi">Masukan Deskripsi Manga</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>