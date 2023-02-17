<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            background-image: url("<?php echo base_url('assets/'); ?>beranda/main.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

        }

        .judul {


            position: absolute;
            width: 499px;
            height: 96px;
            left: 71px;
            top: 200px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 32px;
            line-height: 48px;

            color: #FFFFFF;


        }

        .deskripsi {
            position: absolute;
            width: 575px;
            height: 62px;
            left: 71px;
            top: 323px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;

            color: #FFFFFF;
        }

        .gedung {
            position: absolute;
            width: 1233px;
            height: 903px;
            left: 685px;
            top: 58px;

        }
    </style>
</head>

<body id="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100" style="background-color: #263061;">
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
                        <div class="subnav" style="background-color: #E8AA42; border-radius:3px;" tes>
                            <a class="nav-link mx-2 text-light" href="<?php echo base_url('auth'); ?>">Masuk</a>
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

    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-6 hero-tagline my-auto">
                <h1 class="judul">Sistem Informasi Peminjaman Ruang Laboratorium</h1>
                <h1 class="deskripsi">Sistem infromasi peminjaman ruang laboratorium berfungsi untuk peminjaman ruang laboratorium prodi, laboratorium komputer dasar, dan laboratorium teknik di Institut Teknologi Sumatera</h1>
                <img src="<?php echo base_url("assets/"); ?>beranda/labtek.png" class="position-absolute end-0 bottom-0 img-hero" width="1000">
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>