<?= $this->extend('admin/layoutAdmin/template'); ?>
<?= $this->section('dashboard'); ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5 class="text-center mb-3">Chapter Manga List</h5>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">From Manga</th>
                        <th scope="col">Chapter Number</th>
                        <th scope="col">Judul Chapter</th>
                        <th scope="col">Published At</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <?php foreach ($chapterList as $chlist) : ?>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row"><?= $chlist->mangaTitle; ?></th>
                            <td><?= $chlist->chapter; ?></td>
                            <td><?= $chlist->judul; ?></td>
                            <td><?= $chlist->published_at; ?></td>
                            <td>
                                <a href="" class="btn btn-danger">Delete Chapter</a>
                                <a href="" class="btn btn-warning">Edit Chapter</a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>