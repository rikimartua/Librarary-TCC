<?php
include "database.php";
$db = new database();

$pesan = "inisial";

if (isset($_POST['aksi'])) {
  $aksi = $_POST['aksi'];
  if ($aksi == "tambah-menu") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $pesan = $db->tambah_tb_buku($judul, $penulis, $tahun);
    header("location:home.php?pesan=$pesan&aksi=menambahkan&sumber=buku");
  } else if ($aksi == "update-buku") {
    $id = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $pesan = $db->edit_tb_buku($id, $judul, $penulis, $tahun);
    header("location:home.php?pesan=$pesan&aksi=merubah&sumber=buku");
  } else if ($aksi == "tambah-pelanggan") {
    $jk = $_POST['jk'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $pesan = $db->tambah_peminjam($nama, $jk, $hp);
    header("location:home.php?pesan=$pesan&aksi=menambahkan&sumber=pelanggan");
  } else if ($aksi == "update-peminjam") {
    $id = $_POST['id_peminjam'];
    $jk = $_POST['jenis_kelamin'];
    $nama = $_POST['nama'];
    $hp = $_POST['no_hp'];
    $pesan = $db->edit_peminjam($id, $nama, $jk, $hp);
    header("location:home.php?pesan=$pesan&aksi=merubah&sumber=peminjam");
  }
} else if (isset($_GET['aksi'])) {
  $aksi1 = $_GET['aksi'];
  if ($aksi1 == "delete_menu") {
    $id = $_GET['id_buku'];
    $pesan = $db->delete_tb_buku($id);
    header("location:home.php?pesan=$pesan&aksi=menghapus&sumber=buku");
  } else if ($aksi1 == "delete_pelanggan") {
    $id = $_GET['id'];
    $pesan = $db->delete_peminjam($id);
    header("location:home.php?pesan=$pesan&aksi=menghapus&sumber=peminjam");
  }
}
