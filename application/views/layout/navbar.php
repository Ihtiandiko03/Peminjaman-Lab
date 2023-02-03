<nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100" style="background-color: #263061;">
    <div class="container-fluid">
        <img src="<?php echo base_url("assets/"); ?>beranda/logo-lab.png" width="120"> <a class="navbar-brand text-light" href="/">| Peminjaman Lab</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" aria-current="page" href="#">Lihat Roadster</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" href="#">Buat Peminjaman Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" href="/main/kontak">Kontak</a>
                </li>
                <li class="nav-item ml-2">
                    <div class="subnav" style="background-color: #E8AA42; border-radius:3px;" tes>
                        <a class="nav-link mx-2 text-light" href=" <?php echo base_url('auth'); ?> ">Masuk</a>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                <li class="nav-item mx-2">
                    <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-google-plus-square"></i></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-facebook-square"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>