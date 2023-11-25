<?php
include 'connect.php';

if(isset($_POST['delete'])){

    $edit_id = explode(',', $_POST['edit_id']);
    $id = $edit_id[0];
    $table = $edit_id[1];
    $idAtribute = $edit_id[2];
    $dir_foto = mysqli_fetch_assoc(mysqli_query($connect, "SELECT cover FROM $table WHERE $idAtribute = '$id'"));
    
    unlink($dir_foto['cover']);

      $Qdelete = mysqli_query($connect, "DELETE FROM $table WHERE $idAtribute = '$id'");

    header('location:homeadmin.php');
}
if(isset($_POST['add'])){

    $uploadDirectory = 'asset/buku/';
    $uploadedFile = $_FILES['cover']['tmp_name'];
    $fileName = uniqid() . '_' . $_FILES['cover']['name'];
    $destination = $uploadDirectory . $fileName;
    move_uploaded_file($uploadedFile, $destination);
    $imagePath = mysqli_real_escape_string($connect, $destination);

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $isbn = $_POST['isbn'];
    $abstrak = $_POST['abstrak'];

    if($_GET['add'] == 'novel'){
      $query = "INSERT INTO novel VALUES (null,'$imagePath', '$judul', '$penulis', '$penerbit', '$tahun', '$isbn', '$abstrak')";
      mysqli_query($connect, $query);
    } elseif($_GET['add'] == 'panduan'){
      $query = "INSERT INTO panduan VALUES (null,'$imagePath', '$judul', '$penulis', '$penerbit', '$tahun', '$isbn', '$abstrak')";
      mysqli_query($connect, $query);
    }
    elseif($_GET['add'] == 'dongeng'){
      $query = "INSERT INTO dongeng VALUES (null,'$imagePath', '$judul', '$penulis', '$penerbit', '$tahun', '$isbn', '$abstrak')";
      mysqli_query($connect, $query);
    }
    header('location:homeadmin.php');
}
if(isset($_POST['edit'])){
  function updateBook($connect, $table, $idColumn, $idValue, $cover, $judul, $penulis, $penerbit, $tahun, $isbn, $abstrak) {
    $uploadDirectory = 'asset/buku/';
    $imagePath = $uploadDirectory . uniqid() . '_' . $cover['name'];
    move_uploaded_file($cover['tmp_name'], $imagePath);
    
    $query = "UPDATE $table SET cover=?, judul_buku=?, penulis=?, penerbit=?, tahun_terbit=?, isbn=?, abstrak=? WHERE $idColumn=?";
    $stmt = mysqli_prepare($connect, $query);

    mysqli_stmt_bind_param($stmt, 'sssssssi', $imagePath, $judul, $penulis, $penerbit, $tahun, $isbn, $abstrak, $idValue);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header('location: homeadmin.php');
}

if (isset($_POST['edit']) && isset($_GET['nov'])) {
    $id = $_GET['nov'];
    updateBook(
        $connect,
        'novel',
        'id_novel',
        $id,
        $_FILES['cover'],
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun'],
        $_POST['isbn'],
        $_POST['abstrak']
    );
}

if (isset($_POST['edit']) && isset($_GET['pan'])) {
    $id = $_GET['pan'];
    updateBook(
        $connect,
        'panduan',
        'id_panduan',
        $id,
        $_FILES['cover'],
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun'],
        $_POST['isbn'],
        $_POST['abstrak']
    );
}

if (isset($_POST['edit']) && isset($_GET['don'])) {
    $id = $_GET['don'];
    updateBook(
        $connect,
        'dongeng',
        'id_dongeng',
        $id,
        $_FILES['cover'],
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun'],
        $_POST['isbn'],
        $_POST['abstrak']
    );
}
}
if(isset($_POST['login'])){
  session_start();
  $username = $_POST['username'];
  $password = md5($_POST['password']);    

  $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = $connect->query($query);

if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $username;
    header('location:homeadmin.php?s=admin');
} else {
    // Login gagal
    header('location:homeadmin.php?s=admin'); 
}

}
?>  