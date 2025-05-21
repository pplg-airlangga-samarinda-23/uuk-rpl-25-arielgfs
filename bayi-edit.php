<?php 
require "koneksi.php";
session_start();

if (!isset($_SESSION['nama'])) {
    header("location:login-page.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM data_bayi WHERE id = ?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_bayi = $_POST["nama_bayi"];
    $tinggi_badan = $_POST["tinggi_badan"];
    $berat_badan = $_POST["berat_badan"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tanggal_input = date('y-m-d');
    $no_bpjs = $_POST["no_bpjs"];
    $id = $_GET["id"];

    $sql = "UPDATE data_bayi SET nama_bayi=?, tinggi_badan=?, berat_badan=?, tanggal_lahir=?, tanggal_input=?, no_bpjs=? WHERE id=?";
    $row = $koneksi->execute_query($sql, [$nama_bayi, $tinggi_badan, $berat_badan, $tanggal_lahir, $tanggal_input, $no_bpjs, $id]);
    header("location:data-bayi.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu PPLG</title>
    <link rel="stylesheet" href="bayi-edit.css">
</head>
<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU PPLG</h1>
    </header>
    <article>
        <h1>EDIT DATA KADER</h1>
        <form action="" method="post">
            <div class="form-kader">
                <label for="nama_bayi">Nama</label>
                <input type="text" name="nama_bayi" id="nama_bayi" value="<?=$row['nama_bayi']?>">
            </div>
            <div class="form-kader">
                <label for="tinggi_badan">Tinggi badan</label>
                <input type="number" name="tinggi_badan" id="tinggi_badan" value="<?=$row['tinggi_badan']?>">
            </div>
            <div class="form-kader">
                <label for="berat_badan">Berat badan</label>
                <input type="number" name="berat_badan" id="berat_badan" value="<?=$row['berat_badan']?>">
            </div>
            <div class="form-kader">
                <label for="tanggal_lahir">Tanggal lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?=$row['tanggal_lahir']?>">
            </div>
            <div class="form-kader">
                <label for="no_bpjs">No BPJS</label>
                <input type="text" name="no_bpjs" id="no_bpjs" value="<?=$row['no_bpjs']?>" >
            </div>
            <button type="submit" style="max-width: 80px; font-size:larger; font-weight:600; color:grey; margin-top:10px; border:rgb(195, 195, 195) solid 1px; background-color:rgb(243, 243, 243); border-radius: 5px;">Submit</button>
        </form>
        <footer>
            <h1 class="profil">Hi, <?=$_SESSION['nama']?>!</h1>
            <div class="tam-log">
                <a href="data-bayi.php">Kembali</a>
            </div>
        </footer>
    </article>
</body>
</html>