<!-- <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>"><?= $chapters[0]->mangaTitle; ?> </a>
                </li>
                <li class="nav-item">
                    <p class="nav-link"><?= $chapters[0]->judul; ?></p>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter - 1 === 0) ? "" : $chapters[0]->chapter - 1; ?>"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter + 1 > $countChapter) ? "" : $chapters[0]->chapter + 1; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
<nav id="navigation">
    <div class="content">
        <h4><?= $chapters[0]->judul; ?></h4>
        <a href="/manga/<?= $chapters[0]->slug; ?>"><?= $chapters[0]->mangaTitle; ?></a>
    </div>
    <div class="navButton">
        <a href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter - 1 === 0) ? "" : $chapters[0]->chapter - 1; ?>"><i class="fa-solid fa-backward"></i>Previous Chapter </a>

        <!-- Next -->
        <a href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter + 1 > $countChapter) ? "" : $chapters[0]->chapter + 1; ?>">Next Chapter<i class="fa-solid fa-forward"></i></a>
    </div>
</nav>