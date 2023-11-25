<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
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
        if(isset($_GET['s']) && ($_GET['s'] == 'admin')){
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
            <?php
              if(isset($_GET['s']) && ($_GET['s'] == 'admin')){
                ?>
                <a href="novel.php?s=admin">NOVEL</a>
                <a href="dongeng.php?s=admin">DONGENG</a>
                <a href="panduan.php?s=admin">PANDUAN</a>
                <?php
              } else{
              ?>
            <a href="novel.php?">NOVEL</a>
              <a href="dongeng.php?">DONGENG</a>
              <a href="panduan.php?">PANDUAN</a>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </nav>
      <a href="<?php
        if(isset($_GET['s']) && ($_GET['s'] == 'admin')){
          echo 'index.php';
        } else{
          echo 'login.php';
        }
        ?>" class="d-flex align-items-center bar-login ms-5">
        <?php
        if(isset($_GET['s']) && ($_GET['s'] == 'admin')){
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
    <?php
          if(isset($_GET['s'])){
            ?>
              <div class="header-content d-flex align-items-center mt-5 px-2 py-3">
                <h3 class="fw-bold mx-3 my-1">Dongeng</h3>
                <div class="act-buku">
                    <i class="fa fa-plus px-2 py-1" aria-hidden="true"></i>
                    <div class="category-act border flex-column">
                        <a href="edit.php?add=novel">Novel</a>
                        <a href="edit.php?add=dongeng">Dongeng</a>
                        <a href="edit.php?add=panduan">Panduan</a>
                    </div>
                </div>
              </div>
            <?php
          } else{
            ?>
                <h3 class="header-content fw-bold mt-5 px-2 py-3">Novel</h3>
            <?php
          }
        ?>
        <div class="book-list-all">
        <?php
          $querydongeng = mysqli_query($connect, "SELECT * FROM dongeng");
          while($result = mysqli_fetch_array($querydongeng)){
            ?>
            <div class="border p-3 d-flex book-list">
            <img
              src="<?= $result['cover']?>"
              alt="cover"
              class="img-cover"
            />
            <div class="p-3 book-text
             d-flex flex-column justify-content-between
             px-5">
              <a href="detail.php?don=<?= $result['id_dongeng']?>&dadm" class="book-title">
                <h4><?= $result['judul_buku']?></h4>
                <h6>ditulis oleh <b><?= $result['penulis']?></b></h6>
              </a>
              <p>...</p>
              <div class="book-date">
                <h6><b>Tanggal Terbit : </b><?= date("j F Y" ,   strtotime($result['tahun_terbit']))?></h6>
              </div>
            </div>
          </div>
            <?php
          }
        ?>
      </div>
    </main>
  </body>
</html>
