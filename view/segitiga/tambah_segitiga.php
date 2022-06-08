<?php
date_default_timezone_set("Asia/Singapore");
require_once '../../fungsi/file.php';
require_once '../../fungsi/perhitungan.php';

// mengolah data hasil import form
if (isset($_POST["submit"])) {

    // filename where to save
    $filename = '../../cetak/CetakAll.txt';

    // fungsi yang ada difolder file, triangle fungsi untuk perhitungan
    $getData = getData($filename, "triangle");

    // fetch the last index of array
    if (!is_null($getData)) {
        $lastRow = count($getData) - 1;
    }

    //  cek id segitiga - untuk ditambahkan (validasi)
    $id = (is_null($getData)) ? 1 : $getData[$lastRow]['id_triangle'] + 1;

    // parameter alas & tinggi
    $cal_result = triangle($_POST["alas"], $_POST["tinggi"]);

    // data array (atribut) yang ingin disimpan ke tabel dan file txt
    $data = [
        'id_triangle' => $id,
        'id_square' =>  null,
        'id_circle' => null,
        'alas' => $_POST["alas"],
        'tinggi' => $_POST["tinggi"],
        'side_square' =>  null,
        'radius_circle' => null,
        'result' => $cal_result,
        'datetime' => date("Y-m-d h:i:sa")
    ];

    // save data on file
    $result = save($filename, "triangle", $data);

    // if the result process is successful
    // or equivalent to true or otherwise false
    // it will raise an alert and redirect user
    // to circle.php
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = '../../view/segitiga/v_segitiga.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = '../../view/segitiga/tambah_segitiga.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>JWP | Azqia</title>
</head>

<body>
    <!-- untuk membuat nav -->
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="v_segitiga.php">Segitiga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../persegi/v_persegi.php">Persegi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../lingkaran/v_lingkaran.php">Lingkaran</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li> -->
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav -->

    <div class="container">

    <!-- <a class="mb-2 btn btn-primary" href="tambah_segitiga.php" role="button">Tambah Perhitungan Segitiga</a> -->
    <table class="table table-striped">
    <form action="" method="POST">
  <div class="mb-3">
    <div class="container text-dark " align="center">
                    <h2 class="display-6 fw-bolder ">Form Hitung Luas Segitiga</h2>
                    <p>Rumus Luas : <b>1/2*Alas*Tinggi</b></p>
    </div>
  </div>
  <div class="mb-3">
                            <label for="alas" class="form-label">Alas</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="alas" name="alas"
                                    placeholder="Masukan nilai tinggi" required>
                                <span class="input-group-text" id="rp-addon1">cm</span>
                            </div>
  </div>
  <div class="mb-3">
                            <label for="alas" class="form-label">Tinggi</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="alas" name="tinggi"
                                    placeholder="Masukan nilai tinggi" required>
                                <span class="input-group-text" id="rp-addon1">cm</span>
                            </div>
                        </div>
                        <div>
  <input type="submit" class="btn btn-primary" name="submit" value="hitung"></input>
  </div>
  
</form>
    </table>                
    </div>

    <!-- agar dapat mengakses bootstrap -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>
</html>