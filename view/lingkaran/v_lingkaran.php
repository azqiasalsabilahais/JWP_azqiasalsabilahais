<?php
//memanggil file folder fungsi
require_once '../../fungsi/file.php';
require_once '../../fungsi/perhitungan.php';

$filename = '../../cetak/CetakAll.txt';
$result = getData($filename, "circle") ?? [];
$circle_total = calculateTotalOfEachshape($result, "circle");
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
                <a class="nav-link " aria-current="page" href="../segitiga/v_segitiga.php">Segitiga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../persegi/v_persegi.php">Persegi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="v_lingkaran.php">Lingkaran</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li> -->
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav -->
    <div class="p-5 mb-3 rounded">
    <div class="container text-dark">
                <h1 class="display-6 fw-bolder text-uppercase">Lingkaran</h1>

                <p>Rekap data lingkaran yang sudah dilakukan</p>
    </div>
    <div class="container">
    <a class="mb-2 btn btn-primary" href="tambah_lingkaran.php" role="button">Tambah Perhitungan</a>
    <table class="table table-striped">
    
        <thead>
        <tr class="text-center">
                            <th scope="col">No</th>
                            
                            <th scope="col">Jari-jari (r)</th>
                            <th scope="col">Hasil</th>
                            <th scope="col">Waktu</th>
                        </tr>
        </thead>
        </thead>
        <tbody>
            <!-- PHP START HERE -->
            <?php
                        if (is_array($result) && $circle_total != 0) {

                            foreach ($result as $key => $values) {

                                if (!empty($values["id_circle"])) {

                                    echo "<tr class='text-center'>";

                                    foreach ($values as $keyData => $data) {
                                        if (!empty($data)) {

                                            if ($keyData === "datetime") {
                                                // change the date format to day/month/year hours:minute
                                                $date = date_create($data);
                                                echo "<td>" . date_format($date, "d/m/Y H:i") . "</td>";
                                            } else {
                                                if ($keyData === "result") {
                                                    echo "<td>" . $data . " cm2</td>";
                                                } else {
                                                    echo "<td>" . $data . "</td>";
                                                }
                                            }
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "<td colspan='5' class='p-4 bg-light text-center text-danger fw-bold'>Data Tidak Ditemukan</td>";
                        }
                        ?>
                        <!-- PHP END HERE -->
        </tbody>
    </table>                
    </div>
    </div>

    <!-- agar dapat mengakses bootstrap -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>
</html>