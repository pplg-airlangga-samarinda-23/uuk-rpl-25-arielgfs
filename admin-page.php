<?php
require "koneksi.php";

$sql = "SELECT * FROM KADER";

$rows = $koneksi->execute_query($sql, []);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posyandu pplg</title>
</head>
<body>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($kader = $rows->fetch_assoc()) {
            ?>

            <tr>
                <td><?= $no; ?></td>
                <td><?= $kader["nama"]; ?></td>
                <td><?= $kader["password"]; ?></td>
                <td>
                    <a href="kader-edit.php?id=<?=$kader['id']?>">Edit</a>
                    <a href="#">Hapus</a>
                </td>
            </tr>

            <?php
            $no += 1;
            }
            ?>
        </tbody>
    </table>
</body>
</html>