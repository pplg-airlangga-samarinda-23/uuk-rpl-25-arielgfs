<?php 
require "koneksi.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kader WHERE id = ?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $password = md5($_POST["password"]);
    $id = $_GET["id"];

    $sql = "UPDATE kader SET nama=?, password=? WHERE id=?";
    $row = $koneksi->execute_query($sql, [$nama, $password, $id]);
    header("location:admin-page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu PPLG</title>
    <link rel="stylesheet" href="kader-edit.css">
</head>
<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU PPLG</h1>
    </header>
    <article>
        <h1>EDIT DATA KADER</h1>
        <form action="" method="post">
            <div class="form-kader">
                <label for="nama">Nama Kader</label>
                <input type="text" name="nama" id="nama" value="<?=$row['nama']?>" >
            </div>
            <div class="form-kader">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?=$row['password']?>" >
            </div>
            <button type="submit" style="max-width: 80px; font-size:larger; font-weight:600; color:grey; margin-top:10px; border:rgb(195, 195, 195) solid 1px; background-color:rgb(243, 243, 243); border-radius: 5px;">Submit</button>
        </form>
        <footer>
            <h1 class="profil">Hi, Hai!</h1>
            <div class="tam-log">
                <a href="admin-page.php">Kembali</a>
            </div>
        </footer>
    </article>
</body>
</html>