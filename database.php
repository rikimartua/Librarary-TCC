<?php
class database
{
    var $host = "buku_db";
    var $host2 = "peminjam_db";
    var $user = "riki";
    var $pass = "riki";
    var $database1 = "peminjam_buku";
    var $database2 = "buku";

    //BAGIAN peminjam  DB1
    function tambah_peminjam($nama, $jk, $hp)
    {
        $link = new mysqli($this->host, $this->user, $this->pass, $this->database1);
        $query = mysqli_query($link, "INSERT into peminjam (`nama`, `jenis_kelamin`, `no_hp`) VALUES ('$nama','$jk','$hp')") or die(mysqli_error($link));
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }

    function tabel_peminjam()
    {
        $link = new mysqli($this->host, $this->user, $this->pass, $this->database1);
        $query = mysqli_query($link, "SELECT * from peminjam");
        $hasil = null;
        while ($dt = mysqli_fetch_array($query)) {
            $hasil[] = $dt;
        }
        return $hasil;
    }

    function cari_peminjam($id)
    {
        $link = new mysqli($this->host, $this->user, $this->pass, $this->database1);
        $query = mysqli_query($link, "SELECT * from peminjam where id_peminjam = $id");
        $hasil = mysqli_fetch_array($query);
        return $hasil;
    }

    function edit_peminjam($id, $nama, $jk, $hp)
    {
        $link = new mysqli($this->host, $this->user, $this->pass, $this->database1);
        $query = mysqli_query($link, "UPDATE peminjam SET `nama` = '$nama', `jenis_kelamin` = '$jk', `no_hp` = '$hp' WHERE id_peminjam = '$id'") or die(mysqli_error($link));
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }

    function delete_peminjam($id)
    {
        $link = new mysqli($this->host, $this->user, $this->pass, $this->database1);
        $query = mysqli_query($link, "DELETE from peminjam where id_peminjam='$id'");
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }

    // BAGIAN RM  tb_buku  DB2
    function tambah_tb_buku($judul, $penulis, $tahun)
    {
        $link = new mysqli($this->host2, $this->user, $this->pass, $this->database2);
        $query = mysqli_query($link, "INSERT INTO `tb_buku` (`judul`, `penulis`, `tahun_terbit`) VALUES ('$judul','$penulis','$tahun')") or die(mysqli_error($link));
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }

    function tabel_tb_buku()
    {
        $link = new mysqli($this->host2, $this->user, $this->pass, $this->database2);
        $query = mysqli_query($link, "SELECT * from tb_buku");
        $hasil = null;
        while ($dt = mysqli_fetch_array($query)) {
            $hasil[] = $dt;
        }
        return $hasil;
    }

    function cari_tb_buku($id)
    {
        $link = new mysqli($this->host2, $this->user, $this->pass, $this->database2);
        $query = mysqli_query($link, "SELECT * from tb_buku where id_buku = $id");
        $hasil = mysqli_fetch_array($query);
        return $hasil;
    }

    function edit_tb_buku($id, $judul, $penulis, $tahun)
    {
        $link = new mysqli($this->host2, $this->user, $this->pass, $this->database2);
        $query = mysqli_query($link, "UPDATE `tb_buku` SET `judul` = '$judul', `penulis` = '$penulis', `tahun_terbit` = '$tahun' WHERE id_buku = '$id'") or die(mysqli_error($link));
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }

    function delete_tb_buku($id)
    {
        $link = new mysqli($this->host2, $this->user, $this->pass, $this->database2);
        $query = mysqli_query($link, "DELETE from tb_buku where id_buku='$id'");
        if ($query) {
            $pesan = "berhasil";
        } else {
            $pesan = "gagal";
        }
        return $pesan;
    }
}
