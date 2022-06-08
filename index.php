<?php
require_once 'fungsi/file.php';
require_once 'fungsi/perhitungan.php';


$filename = 'cetak/CetakAll.txt';
$result = getData($filename, "circle");

// get data from file
$data_all = getData($filename) ?? [];

$triangle = [
    "total" => calculateTotalOfEachshape($data_all, "triangle"),
    "percentage" => percentage($data_all, "triangle")
];
$square = [
    "total" => calculateTotalOfEachshape($data_all, "square"),
    "percentage" => percentage($data_all, "square")
];
$circle = [ 
    "total" => calculateTotalOfEachshape($data_all, "circle"),
    "percentage" => percentage($data_all, "circle")
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>JWP | Azqia</title>
</head>

<body>
    <!-- //untuk membuat nav -->
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand active" href="index.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link "  href="view/segitiga/v_segitiga.php">Segitiga</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="view/persegi/v_persegi.php">Persegi</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="view/lingkaran/v_lingkaran.php">Lingkaran</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li> -->
</ul>
        </div>
    </div>
    </nav>
    <!-- membuat card body -->
    <!-- Card Analisis Total dan Persentase -->
    <div class="card p-3 bg-light mb-3">
            <div class="card-body">
                <div class="row mb-3">

                    <!-- Segitiga -->
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header bg-light text-navy">
                                Perhitungan Segitiga Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $triangle["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $triangle["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Persegi -->
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header bg-light text-navy">
                                Perhitungan Persegi Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $square["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $square["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lingkaran -->
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="card text-center">
                            <div class="card-header bg-light text-navy">
                                Perhitungan Lingkaran Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $circle["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $circle["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>
</html>