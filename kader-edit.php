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
    <title>Posyandu pplg</title>
</head>
<body>
    <h1>EDIT DATA KADER</h1>
    <form action="" method="post">
        <div class="form-kader">
            <label for="nama">Nama Kader</label>
            <input type="text" name="nama" id="nama" value="<?=$row['nama']?>" required>
        </div>
        <div class="form-kader">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?=$row['password']?>" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    <a href="admin-page.php">Kembali</a>
</body>
</html>