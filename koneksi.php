<?php

class Database
{
    // Konfigurasi Database
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "db_warung";
    var $koneksi = "";

    function __construct()
    {
        // Koneksi database
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Cek Koneksi database
        if (mysqli_connect_errno($this->koneksi)) {
            echo "koneksi database gagal " . mysqli_connect_error();
        }
    }

    function tampil_data()
    {
        // Mengambil data dari tabel barang
        $data = mysqli_query($this->koneksi, 'SELECT * FROM tb_barang');

        // Melakukan Perulangan data
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual)
    {
        // Menambahkan data ke tabel barang
        mysqli_query(
            $this->koneksi,
            "INSERT INTO tb_barang VALUES(
            '',
            '$nama_barang',
            '$stok',
            '$harga_beli',
            '$harga_jual'
            )"
        );
    }

    function get_by_id($id_barang)
    {
        // Mengambil data dari tabel barang berdasarkan id barang
        $query =  mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
        return $query->fetch_array();
    }

    function update_data($nama_barang, $stok, $harga_beli, $harga_jual)
    {
        // Update data dari tabel barang berdasarkan id barang
        $query = mysqli_query($this->koneksi, "UPDATE tb_barang SET
                                                nama_barang = '$nama_barang',
                                                stok = '$stok',
                                                harga_beli = '$harga_beli',
                                                harga_jual = '$harga_jual'
                                                ");
    }

    function delete_data($id_barang)
    {
        // Hapus data dari tabel barang berdasarkan id barang
        $query = mysqli_query($this->koneksi, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'");
    }
}
