<?php

// Memanggil file koneksi.php
include "koneksi.php";

// Inisialisasi class Database
$koneksi = new Database();

// Mengambil nilai action dari url
$action = $_GET['action'];

// Tambah Data
if ($action == 'add') {
    $koneksi->tambah_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header('location: tampil_data.php');
}
// Update data
else if ($action == 'update') {
    $koneksi->update_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header('location: tampil_data.php');
}
// Hapus data
else if ($action == 'delete') {
    $id_barang = $_GET['id'];
    $koneksi->delete_data($id_barang);
    header('location: tampil_data.php');
}
