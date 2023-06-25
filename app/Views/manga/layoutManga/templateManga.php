<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/41dbd92bf9.js" crossorigin="anonymous"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
</head>

<body>
    <?= $this->include('manga/layoutManga/navManga'); ?>
    <?= $this->renderSection('manga'); ?>
    <footer id="navigation">
        <?= $this->include('manga/layoutManga/footerManga'); ?>
    </footer>

    <button id="back-to-top"><i class="fa-solid fa-chevron-up fa-2xl"></i></button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <!-- My Js -->
    <script src="/js/script.js"></script>
</body>

</html>