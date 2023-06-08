<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">WPU-CI4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $home; ?>" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $about; ?>" aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $contact; ?>" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $komik; ?>" href="/komik">Komik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $nav_orang; ?>" href="/orang">Orang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>