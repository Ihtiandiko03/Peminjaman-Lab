<!-- <nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100" style="background-color: #263061;">
    <div class="container-fluid">
        <img src="<?php echo base_url("assets/"); ?>beranda/logo-lab.png" width="120"> <a class="navbar-brand text-light" href="/">| Peminjaman Lab</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" aria-current="page" href="<?= base_url('main/roadster')?>">Lihat Roadster</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" href="<?= base_url('main/kapasitasruangan')?>">Kapasitas Ruangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-light" href="<?= base_url('main/kontak')?>">Kontak</a>
                </li>
                <li class="nav-item ml-2">
                    <div class="subnav" style="background-color: #E8AA42; border-radius:3px;">
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
</nav> -->


<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3 mb-3" id="mainNav" style="border-radius: 50px 20px;">
            <div class="container px-4 px-lg-5">
                <!-- <img src="<?php echo base_url("assets/"); ?>beranda/logo-lab.png" width="120"> <a class="navbar-brand text-light" href="/"> | </a> -->
                <a class="navbar-brand" href="/">Peminjaman Lab</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('main/roadster')?>">Lihat Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('main/kapasitasruangan')?>">Kapasitas Ruangan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('main/kontak')?>">Kontak</a></li>
                        <li class="nav-item"><a class="nav-link" style="color:yellow;" href="<?= base_url('auth'); ?>">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>

