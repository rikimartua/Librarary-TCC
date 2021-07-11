<!DOCTYPE html>
<html>
<?php
include "database.php";
$db = new database();
$data = $db->cari_tb_buku($_GET['id']);

?>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Edit Buku</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>

<body>
  <div class="p-3 mb-2 bg-info text-dark">
    <div class="alert alert-info" role="alert">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php">HOME<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="menu.php">INPUT BUKU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">INPUT PEMINJAM</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </nav>
      <div class="div">
        <center>
          <h1>WELCOME TO PERPUS BERJALAN</h1>
        </center>
      </div>

      <br>

      <form method="POST" action="proses.php">
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Judul Buku</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="judul" required value="<?= $data['judul']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Penulis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="penulis" required value="<?= $data['penulis']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Tahun Terbit</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tahun_terbit" required value="<?= $data['tahun_terbit']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="Edit" class="btn btn-primary" value="update-buku" name="aksi">Edit</button>
          </div>
        </div>
      </form><br><br>

</body>

</html>