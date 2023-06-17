<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>"><i class="fa-solid fa-house"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-itz  em">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter - 1 === 0) ? "" : $chapters[0]->chapter - 1; ?>"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manga/<?= $chapters[0]->slug; ?>/<?= ($chapters[0]->chapter + 1 > $countChapter) ? "" : $chapters[0]->chapter + 1; ?>"><i class="fa-solid fa-arrow-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>