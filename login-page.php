
<?php 
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['nama'];
    $password = md5($_POST['password']);

    $sql = "SELECT password FROM kader WHERE nama = ?";
    $row = $koneksi->execute_query($sql, [$username])->fetch_assoc();

    if (@$password == @$row['password']){
        header('location:data-bayi.php');
    } elseif ($username == "admin" && $password == md5("admin123")){
        header('location:admin-page.php');
    } else {
        echo "<script>alert('Password atau nama salah');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu PPLG</title>
    <link rel="stylesheet" href="login-page.css">
</head>

<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU PPLG</h1>
    </header>
    <div class="isi">
        <h1 style="position: relative; top:45px">Hi,</h1>
        <h1 style="position: relative; top:20px">ini adalah Log in page</h1>
        <form class="login" action="" method="post">
            <div class="form-item">
                <label for="nama">Name</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" >
            </div>
            <button style="max-width: 80px; font-size:larger; font-weight:600; color:grey; margin-top:10px; border:rgb(195, 195, 195) solid 1px; background-color:rgb(243, 243, 243); border-radius: 5px;" type="submit">Log in</button>
        </form>
    </div>
</body>
</html>

