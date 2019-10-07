<?php 
// Koneksi ke file koneksi.php
include "koneksi.php";

// Inisialisasi Database
$db = new Database();
// Mengambil id dari url
$id_barang = $_GET['id'];
// Cek id
if(!is_null($id_barang)) {
    $data_barang = $db->get_by_id($id_barang);
} else {
    header('location: tampil_data.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Barang</title>
</head>

<body>
    <h3>Update Barang</h3>
    <hr>
    <form method="post" action="proses_barang.php?action=update">
        <input type="hidden" name="id_barang" value="<?= $data_barang['id_barang'] ?>">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" value="<?= $data_barang['nama_barang'] ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="text" name="stok" value="<?= $data_barang['stok'] ?>"></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td>:</td>
                <td><input type="text" name="harga_beli" value="<?= $data_barang['harga_beli'] ?>"></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td>:</td>
                <td><input type="text" name="harga_jual" value="<?= $data_barang['harga_jual'] ?>"></td>
            </tr>
            <td>
            <td><button type="submit">Update Data</button></td>
            </td>
        </table>
    </form>
</body>

</html>