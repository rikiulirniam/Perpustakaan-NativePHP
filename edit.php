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
        <a class="nav-heading" href="homeadmin.php">BERANDA</a>
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
              <a href="novel.php?s=admin">NOVEL</a>
              <a href="dongeng.php?s=admin">DONGENG</a>
              <a href="panduan.php?s=admin">PANDUAN</a>
            </div>
          </div>
        </div>
      </nav>
      <a href="index.php" class="d-flex align-items-center bar-login ms-5">
        <h6 class="text-white mt-2 px-3">Log-out</h6>
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
            if(isset($_GET['add'])){
              ?>
              <h3 class="header-content fw-bold mt-5 px-2 py-3">
                <?php
                if($_GET['add'] == 'novel'){
                    echo "Tambah Buku";
                    $cat = 'novel';
                } elseif($_GET['add'] == 'dongeng') {
                  echo "Tambah Buku";
                    $cat = 'dongeng';
                } elseif($_GET['add'] == 'panduan'){
                  echo "Tambah Buku";
                    $cat = 'panduan';
                }
            ?>
          </h3>
          <div class="border p-3 d-flex book-list">
              <form class="book-detail d-flex flex-column justify-content-between" action="function.php?add=<?= $cat?>" method="POST" enctype="multipart/form-data">
                <div class="content-book-detail d-flex justify-content-between">
                <div class="left-book-detail mx-4">
                  <div class="d-flex justify-content-between my-4">
                  <h6 class="me-3"><b>Cover Buku : </b></h6>
                    <input class="edit-input" required type="file" name="cover" accept="image/*"  value="">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Judul Buku : </b></h6>
                    <input class="edit-input" required type="text"name="judul" value="">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penulis : </b></h6>
                    <input class="edit-input" required type="text" name="penulis" value="">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penerbit : </b></h6>
                    <input class="edit-input" required type="text" name="penerbit" value="">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Tanggal Terbit : </b></h6>
                    <input class="edit-input" required type="date" name="tahun" value="">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>ISBN : </b></h6>
                    <input class="edit-input" required type="text" name="isbn" value=""></div>
                </div>
                <div class="right-book-detail mx-4">
                  <div class="d-flex flex-column justify-content-between my-4">
                    <h6 class="me-3"><b>Abstrak : </b></h6><br>
                    <textarea class="edit-input" name="abstrak" cols="30" rows="10" value=""></textarea>
                  </div>
                </div>
              </div>
              <button required type="submit" name="add" class="btn btn-primary align-self-end me-5">Simpan</button>
              </form>
          </div>
          <?php
            }
          ?>
          <h3 class="header-content fw-bold mt-5 px-2 py-3">
            <?php
            // if(isset($_GET['edit'])){
              if(isset($_GET['edit'])){
                echo "Edit Buku";
                
            ?>
          </h3>
          <?php
          if(isset($_GET['nov'])){
            $id = $_GET["nov"];
            $detailEdit = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM novel WHERE id_novel  = '$id'"));
          ?>
          <div class="border p-3 d-flex book-list">
              <form class="book-detail d-flex flex-column justify-content-between" action="function.php?nov=<?=$detailEdit['id_novel']?>" method="POST" required enctype="multipart/form-data">
                <div class="content-book-detail d-flex justify-content-between">
                <div class="left-book-detail mx-4">
                  <div class="d-flex justify-content-between my-4">
                  <h6 class="me-3"><b>Cover Buku : </b></h6>
                    <input class="edit-input" type="file" name="cover" accept="image/*"  value="<?= $detailEdit['cover']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Judul Buku : </b></h6>
                    <input class="edit-input" required type="text"name="judul" value="<?= $detailEdit['judul_buku']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penulis : </b></h6>
                    <input class="edit-input" required type="text" name="penulis" value="<?= $detailEdit['penulis']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penerbit : </b></h6>
                    <input class="edit-input" required type="text" name="penerbit" value="<?= $detailEdit['penerbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Tanggal Terbit : </b></h6>
                    <input class="edit-input" required type="date" name="tahun" value="<?= $detailEdit['tahun_terbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>ISBN : </b></h6>
                    <input class="edit-input" required type="text" name="isbn" value="<?= $detailEdit['isbn']?>">
              </div>
                </div>
                <div class="right-book-detail mx-4">
                  <div class="d-flex flex-column justify-content-between my-4">
                    <h6 class="me-3"><b>Abstrak : </b></h6><br>
                    <textarea class="edit-input" name="abstrak" cols="30" rows="10" value=""><?= $detailEdit['abstrak']?></textarea>
                  </div>
                </div>
              </div>
              <button required type="submit" name="edit" class="btn btn-primary align-self-end me-5">Simpan</button>
              </form>
          </div>
          <?php
          } elseif(isset($_GET['pan'])){
            $id = $_GET["pan"];
            $detailEdit = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM panduan WHERE id_panduan  = '$id'"));
          ?>
          <div class="border p-3 d-flex book-list">
              <form class="book-detail d-flex flex-column justify-content-between" action="function.php?pan=<?= $detailEdit['id_panduan']?>" method="POST" required enctype="multipart/form-data">
                <div class="content-book-detail d-flex justify-content-between">
                <div class="left-book-detail mx-4">
                  <div class="d-flex justify-content-between my-4">
                  <h6 class="me-3"><b>Cover Buku : </b></h6>
                    <input class="edit-input" type="file" name="cover" accept="image/*"  value="<?= $detailEdit['cover']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Judul Buku : </b></h6>
                    <input class="edit-input" required type="text"name="judul" value="<?= $detailEdit['judul_buku']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penulis : </b></h6>
                    <input class="edit-input" required type="text" name="penulis" value="<?= $detailEdit['penulis']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penerbit : </b></h6>
                    <input class="edit-input" required type="text" name="penerbit" value="<?= $detailEdit['penerbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Tanggal Terbit : </b></h6>
                    <input class="edit-input" required type="date" name="tahun" value="<?= $detailEdit['tahun_terbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>ISBN : </b></h6>
                    <input class="edit-input" required type="text" name="isbn" value="<?= $detailEdit['isbn']?>">
              </div>
                </div>
                <div class="right-book-detail mx-4">
                  <div class="d-flex flex-column justify-content-between my-4">
                    <h6 class="me-3"><b>Abstrak : </b></h6><br>
                    <textarea class="edit-input" name="abstrak" cols="30" rows="10" value=""><?= $detailEdit['abstrak']?></textarea>
                  </div>
                </div>
              </div>
              <button required type="submit" name="edit" class="btn btn-primary align-self-end me-5">Simpan</button>
              </form>
          </div>
          <?php
          } elseif($_GET['don']){
            $id = $_GET["don"];
            $detailEdit = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM dongeng WHERE id_dongeng  = '$id'"));
          ?>
          <div class="border p-3 d-flex book-list">
              <form class="book-detail d-flex flex-column justify-content-between" action="function.php?don=<?= $detailEdit['dongeng']?>" method="POST" en requiredctype="multipart/form-data">
                <div class="content-book-detail d-flex justify-content-between">
                <div class="left-book-detail mx-4">
                  <div class="d-flex justify-content-between my-4">
                  <h6 class="me-3"><b>Cover Buku : </b></h6>
                    <input class="edit-input"  type="file" name="cover" accept="image/*"  value="<?= $detailEdit['cover']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Judul Buku : </b></h6>
                    <input class="edit-input" required type="text"name="judul" value="<?= $detailEdit['judul_buku']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penulis : </b></h6>
                    <input class="edit-input" required type="text" name="penulis" value="<?= $detailEdit['penulis']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Penerbit : </b></h6>
                    <input class="edit-input" required type="text" name="penerbit" value="<?= $detailEdit['penerbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>Tanggal Terbit : </b></h6>
                    <input class="edit-input" required type="date" name="tahun" value="<?= $detailEdit['tahun_terbit']?>">
                  </div>
                  <div class="d-flex justify-content-between my-4">
                    <h6 class="me-3"><b>ISBN : </b></h6>
                    <input class="edit-input" required type="text" name="isbn" value="<?= $detailEdit['isbn']?>">
              </div>
                </div>
                <div class="right-book-detail mx-4">
                  <div class="d-flex flex-column justify-content-between my-4">
                    <h6 class="me-3"><b>Abstrak : </b></h6><br>
                    <textarea class="edit-input" name="abstrak" cols="30" rows="10" value=""><?= $detailEdit['abstrak']?></textarea>
                  </div>
                </div>
              </div>
              <button required type="submit" name="edit" class="btn btn-primary align-self-end me-5">Simpan</button>
              </form>
          </div>
          <?php
          }
        }
          ?>


        </div>
       </main>
</body>
</html>