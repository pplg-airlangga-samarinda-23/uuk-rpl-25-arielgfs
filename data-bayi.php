<?php
require "koneksi.php";
session_start();

if (!isset($_SESSION['nama'])) {
    header("location:login-page.php");
}

$sql = "SELECT * FROM data_bayi";

$rows = $koneksi->execute_query($sql, []);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu PPLG</title>
    <link rel="stylesheet" href="data-bayi.css">
    <script src="https://kit.fontawesome.com/9644a59faa.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU PPLG</h1>
    </header>
    <article>
        <h1 style="text-align: center; font-family:Arial, Helvetica, sans-serif; font-size: 30px;">DATA ANAK</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tinggi badan</th>
                    <th>Berat badan</th>
                    <th>Tanggal lahir</th>
                    <th>Tanggal input</th>
                    <th>No BPJS</th>
                    <th>Edit/Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($kader = $rows->fetch_assoc()) {
                ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $kader["nama_bayi"]; ?></td>
                    <td><?= $kader["tinggi_badan"]; ?>Cm</td>
                    <td><?= $kader["berat_badan"]; ?>Kg</td>
                    <td><?= $kader["tanggal_lahir"]; ?></td>
                    <td><?= $kader["tanggal_input"]; ?></td>
                    <td><?= $kader["no_bpjs"]; ?></td>
                    <td>
                        <a href="bayi-edit.php?id=<?=$kader['id']?>" class="fa-solid fa-pen" style="margin-left: 10px;"></a>
                        <a href="bayi-hapus.php?id=<?=$kader['id']?>" class="fa-solid fa-trash" style="margin-left: 27px;"></a>
                    </td>
                </tr>

                <?php
                $no += 1;
                }
                ?>
            </tbody>
        </table>
        <footer>
            <h1 class="profil">Hi, <?=$_SESSION['nama']?>!</h1>
            <div class="tam-log">
                <a href="tambah-Data.php">Tambah data</a>
                <a href="logout.php">Log out</a>
            </div>
        </footer>
        
        
    </article>
    
</body>
</html>