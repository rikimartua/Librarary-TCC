<!DOCTYPE html>
<html>
<?php
include "database.php";
$db = new database();
if (isset($_GET['pesan'])) {
  $sumber = $_GET['sumber'];
  $aksi = $_GET['aksi'];
  if ($_GET['pesan'] == "berhasil") {
    $respon = "Berhasil melakukan " . $aksi . " data " . $sumber . "!";
  } else {
    $respon = "Gagal melakukan " . $aksi . " data " . $sumber . "!";
  }
}
?>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Dashboard Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>

<body>
  <div class="p-3 mb-2 bg-info text-dark">
    <div class="alert alert-info" role="alert">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">HOME<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php">INPUT BUKU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">INPUT PEMINJAM</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </nav>

      <div class="div">
        <center>
          <img src="img/R.jpg" alt="" height="300px" width="100%">
          <h1>WELCOME TO PERPUS BERJALAN</h1>
        </center>
      </div>
      <br>

      <?php
      if (isset($respon)) :
      ?>
        <center>
          <h2><?= $respon ?></h2>
        </center>
      <?php endif; ?>

      <table class="table">
        <h2>Daftar Buku</h2>
        <thead class="table-primary">
          <th>No</th>
          <th>Judul Buku</th>
          <th>Penulis</th>
          <th>Tahun Terbit</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php
          $no = 1;
          if ($db->tabel_tb_buku() == null) die;
          foreach ($db->tabel_tb_buku() as $data) :
          ?>
            <tr>
              <td><?= $no; ?>.</td>
              <td><?= $data['judul']; ?></td>
              <td><?= $data['penulis']; ?></td>
              <td><?= $data['tahun_terbit']; ?></td>
              <td>
                <a href="edit_menu.php?id=<?= $data['id_buku']; ?>"><button class="btn btn-primary">Edit</button></a>
                <a href="proses.php?aksi=delete_menu&id=<?= $data['id_buku']; ?>"><button class="btn btn-danger">Delete</button></a>
              </td>
            </tr>
          <?php
            $no++;
          endforeach;
          ?>
        </tbody>
      </table>


      <table class="table">
        <h3>Peminjam</h3>
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          if ($db->tabel_peminjam() == null) die;
          foreach ($db->tabel_peminjam() as $data) :
          ?>
            <tr>
              <td><?= $no; ?>.</td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['jenis_kelamin']; ?></td>
              <td><?= $data['no_hp']; ?></td>
              <td>
                <a href="edit_user.php?id=<?= $data['id_peminjam']; ?>"><button class="btn btn-primary">Edit</button></a>
                <a href="proses.php?aksi=delete_pelanggan&id=<?= $data['id_peminjam']; ?>"><button class="btn btn-danger">Delete</button></a>
              </td>
            </tr>
          <?php
            $no++;
          endforeach;
          ?>
        </tbody>
      </table>

</body>

</html>