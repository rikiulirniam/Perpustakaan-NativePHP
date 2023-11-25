<?php
include 'connect.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.css" />
  </head>
<body>
<header class="px-5 py-3 d-flex align-items-center">
      <div class="text-white line-height-2">
        <h2 class="heading">Perpustakaan</h2>
        <h5>Harapan Pati</h5>
      </div>
      <div class="nav-left d-flex">
      <nav class="navbar text-white d-flex align-items-center">
        <a class="nav-heading" href="<?php
        if(isset($_GET['dadm'])){
          echo 'homeadmin.php';
        } else{
          echo 'index.php';
        }
        ?>">BERANDA</a>
        <div class="d-flex align-items-center nav-drop-par ms-5">
          <div
            class="d-flex justify-content-between align-items-center nav-drop pt-2"
          >
            <div
              class="nav-head d-flex justify-content-between align-items-center"
            >
              <h6 class="nav-heading">KATEGORI</h6>
              <h6 class="px-2">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </h6>
            </div>
            <div class="sub-drop">
              <a href="novel.php">NOVEL</a>
              <a href="dongeng.php">DONGENG</a>
              <a href="panduan.php">PANDUAN</a>
            </div>
          </div>
        </div>
      </nav>
      <a href="<?php
        if(isset($_GET['dadm'])){
          echo 'index.php';
        } else{
          echo 'login.php';
        }
        ?>" class="d-flex align-items-center bar-login ms-5">
      <?php
        if(isset($_GET['dadm'])){
        ?>
        <h6 class="text-white mt-2 px-3">Log-out</h6>
        <?php
        } else{
          ?>
            <h6 class="text-white mt-2 px-3">Guest</h6>
          <?php
        }
        ?>
        <i
          class="fa fa-user-circle text-white fs-1 user-select-none"
          aria-hidden="true"
        ></i>
      </a>
    </div>
    </header>
      <main>
        <div class="container">
          <div class="header-content d-flex flex-column mt-5 px-2 py-3">
          <h3 class="fw-bold">Detail Buku</h3>
          <?php
            if(isset($_GET['dadm'])){
              ?>
              <form class=" d-flex align-items-center" action="function.php" method="POST">
                <a href="edit.php?edit&<?php
                  if(isset($_GET['nov'])){
                    echo 'nov';
                  }elseif(isset($_GET['pan'])){
                    echo 'pan';
                  }elseif(isset($_GET['don'])){
                    echo 'don';
                  }
                ?>=<?php
                if(isset($_GET['nov'])){
                  echo $_GET['nov'];
                }elseif(isset($_GET['pan'])){
                  echo $_GET['pan'];
                }elseif(isset($_GET['don'])){
                  echo $_GET['don'];
                }
                ?>" class=" btn btn-warning"><i class="fa fa-pencil p-1" aria-hidden="true"></i>Edit</a>
                <button class="m-2 btn btn-danger" name="delete"><i class="fa fa-trash p-1" aria-hidden="true"></i>Delete</button>
                <input type="hidden" name="edit_id" value="<?php
                if(isset($_GET['nov'])){
                  echo $_GET['nov'];
                  echo ',';
                  echo 'novel';
                  echo ',';
                  echo 'id_novel';
                }elseif(isset($_GET['pan'])){
                  echo $_GET['pan'];
                  echo ',';
                  echo 'panduan';
                  echo ',';
                  echo 'id_panduan';
                }elseif(isset($_GET['don'])){
                  echo $_GET['don'];
                  echo ',';
                  echo 'dongeng';
                  echo ',';
                  echo 'id_dongeng';
                }
                ?>">
              </form>
              <?php
            }
          ?></div>
          <?php
          if(isset($_GET['nov'])){
          $id = $_GET['nov'];
          $detail = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM novel WHERE id_novel = '$id'"));
          ?>
            <div class="border p-3 d-flex book-list">
            <img
              src="<?= $detail['cover']?>"
              alt="cover"
              class="img-cover"
            />
            <div class="p-3 book-text
             d-flex flex-column justify-content-between
             px-5">
              <div class="book-detail">
                <h3><b><?= $detail['judul_buku']?></b></h3>
                <h6 class="mt-3 mb-5">Karya <b><?= $detail['penulis']?></b></h6>
                <h6 class="my-3"><b>Penerbit : </b><?=$detail['penerbit']?></h6>
                <h6 class="my-3"><b>Tanggal Terbit : </b><?= date("j F Y" ,   strtotime($detail['tahun_terbit']))?></h6>
                <h6 class="my-3"><b>ISBN : </b><?= $detail['isbn']?></h6>
                <div class="abstrak my-4">
                  <h6 class="mb-0"><b>Abstrak: </b></h6>
                  <p><?= $detail['abstrak']?></p>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>


          <?php
          if(isset($_GET['don'])){
          $id = $_GET['don'];
          $detail = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM dongeng WHERE id_dongeng = '$id'"));
          ?>
          <div class="border p-3 d-flex book-list">
            <img
              src="<?= $detail['cover']?>"
              alt="cover"
              class="img-cover"
            />
            <div class="p-3 book-text
             d-flex flex-column justify-content-between
             px-5">
              <div class="book-detail">
                <h3><b><?= $detail['judul_buku']?></b></h3>
                <h6 class="mt-3 mb-5">Karya <b><?= $detail['penulis']?></b></h6>
                <h6 class="my-3"><b>Penerbit : </b><?=$detail['penerbit']?></h6>
                <h6 class="my-3"><b>Tanggal Terbit : </b><?= date("j F Y" ,   strtotime($detail['tahun_terbit']))?></h6>
                <h6 class="my-3"><b>ISBN : </b><?= $detail['isbn']?></h6>
                <div class="abstrak my-4">
                  <h6 class="mb-0"><b>Abstrak: </b></h6>
                  <p><?= $detail['abstrak']?></p>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>


          <?php
          if(isset($_GET['pan'])){
          $id = $_GET['pan'];
          $detail = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM panduan WHERE id_panduan = '$id'"));
          ?>
          <div class="border p-3 d-flex book-list">
            <img
              src="<?= $detail['cover']?>"
              alt="cover"
              class="img-cover"
            />
            <div class="p-3 book-text
             d-flex flex-column justify-content-between
             px-5">
              <div class="book-detail">
                <h3><b><?= $detail['judul_buku']?></b></h3>
                <h6 class="mt-3 mb-5">Karya <b><?= $detail['penulis']?></b></h6>
                <h6 class="my-3"><b>Penerbit : </b><?=$detail['penerbit']?></h6>
                <h6 class="my-3"><b>Tanggal Terbit : </b><?= date("j F Y" ,   strtotime($detail['tahun_terbit']))?></h6>
                <h6 class="my-3"><b>ISBN : </b><?= $detail['isbn']?></h6>
                <div class="abstrak my-4">
                  <h6 class="mb-0"><b>Abstrak: </b></h6>
                  <p><?= $detail['abstrak']?></p>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
        </div>>
       </main>
</body>
</html>