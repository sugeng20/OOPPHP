<?php
// Koneksi ke file koneksi.php
include "koneksi.php";

// Inisialisasi class Database
$db = new Database();
$data_barang = $db->tampil_data();

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel Barang</title>
</head>

<body>
    <a href="tambah_data.php">Tambah Data</a>
    <table border="1" cellspacing="0">
        <tr>
            <td>NO</td>
            <td>Barang</td>
            <td>Stok</td>
            <td>Harga Beli</td>
            <td>Harga Jual</td>
            <td>Action</td>
        </tr>
        <?php foreach ($data_barang as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['stok'] ?></td>
                <td><?= $row['harga_beli'] ?></td>
                <td><?= $row['harga_jual'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_barang'] ?>">edit</a>
                    <a href="proses_barang.php?action=delete&id=<?= $row['id_barang'] ?>" onclick="return confirm('Apakah anda yakin?')">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>`

</html>