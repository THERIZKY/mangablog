<?= $this->extend('admin/layoutAdmin/template') ?>
<?= $this->section('dashboard') ?>
<button id="sidebar-toggle" class="sidebar-toggle"><i class="fa fa-bars"></i></button>
<div id="sidebar" class="sidebar">
    <button id="close-sidebar" class="close-sidebar"><i class="fa fa-times"></i></button>
    <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Dashboard</a>
    <a href="#"><i class="fa fa-fw fa-list"></i> Daftar Manga</a>
    <a href="#"><i class="fa fa-fw fa-user"></i> Profile Admin</a>
    <a href="#"><i class="fa fa-fw fa-file-text"></i> Daftar Chapter</a>
    <a href="#"><i class="fa fa-fw fa-bars"></i> Lain-lain</a>
</div>
<?= $this->endSection(); ?>