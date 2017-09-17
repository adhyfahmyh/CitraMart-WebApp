<?php

function insert_barang(){
  global $connection;
  if(isset($_POST['submit'])){
    $kategori = $_POST['kategori'];
    $nama_barang = $_POST['nama_barang'];
    $stock = $_POST['stock'];
    $harga_jual = $_POST['harga_jual'];
    if($nama_barang == "" || empty($nama_barang) || $harga_jual == "" || empty($harga_jual) || $stock == "" || empty($stock)){
      echo "This field should not empty";
    }else {
      $query = "INSERT INTO barang(kategori,nama_barang,stok,harga_jual) ";
      $query .= "VALUE('{$kategori}','{$nama_barang}','{$stock}','{$harga_jual}') ";

      $create_category_query = mysqli_query($connection,$query);
      if(!$create_category_query){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}


function findAllBarang(){
  global $connection;
  $query = "SELECT * FROM barang";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_barang = $row['id_barang'];
  $kategori = $row['kategori'];
  $nama_barang = $row['nama_barang'];
  $stok = $row['stok'];
  $harga_jual = $row['harga_jual'];


  echo "<tr>";
  echo "<td>{$id_barang}</td>";
  echo "<td>{$kategori}</td>";
  echo "<td>{$nama_barang}</td>";
  echo "<td>{$stok}</td>";
  echo "<td>{$harga_jual}</td>";
  echo "<td><a href='../view/kelola_barang.php?delete={$id_barang}'>Delete</a></td>";
  echo "<td><a href='../view/kelola_barang.php?edit={$id_barang}'>Edit</a></td>";
  echo "</tr>";

  if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM barang WHERE id_barang = {$the_cat_id} ";
    header("Location: ../view/kelola_barang.php"); //header
    $delete_query = mysqli_query($connection,$query);
    }
  }
}

function getAllBarang(){
  global $connection;
  $query = "SELECT * FROM barang";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_barang = $row['id_barang'];
  $kategori = $row['kategori'];
  $nama_barang = $row['nama_barang'];
  $stok = $row['stok'];
  $harga_jual = $row['harga_jual'];


  echo "<tr>";
  echo "<td>{$id_barang}</td>";
  echo "<td>{$kategori}</td>";
  echo "<td>{$nama_barang}</td>";
  echo "<td>{$stok}</td>";
  echo "<td>{$harga_jual}</td>";
  echo "</tr>";
  }
}

function getAllUsers(){
  global $connection;
  $query = "SELECT * FROM users";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_user = $row['id_user'];
  $nama = $row['nama'];
  $username = $row['username'];
  $status = $row['status'];
  $alamat = $row['alamat'];


  echo "<tr>";
  echo "<td>{$id_user}</td>";
  echo "<td>{$nama}</td>";
  echo "<td>{$username}</td>";
  echo "<td>{$status}</td>";
  echo "<td>{$alamat}</td>";
  echo "</tr>";
  }
}

function insert_users(){
  global $connection;
  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    if(empty($nama) || empty($username) || empty($password) || empty($status) || empty($alamat)){
      echo "This field should not empty";
    }else {
      $query = "INSERT INTO users(nama,username, password, status, alamat) ";
      $query .= "VALUE('{$nama}','{$username}','{$password}','{$status}','{$alamat}') ";

      $create_category_query = mysqli_query($connection,$query);
      if(!$create_category_query){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}

function findAllUsers(){
  global $connection;
  $query = "SELECT * FROM users";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_user = $row['id_user'];
  $nama = $row['nama'];
  $username = $row['username'];
  $status = $row['status'];
  $alamat = $row['alamat'];


  echo "<tr>";
  echo "<td>{$id_user}</td>";
  echo "<td>{$nama}</td>";
  echo "<td>{$username}</td>";
  echo "<td>{$status}</td>";
  echo "<td>{$alamat}</td>";
  echo "<td><a href='../view/kelola_pengguna.php?delete={$id_user}'>Delete</a></td>";
  echo "<td><a href='../view/kelola_pengguna.php?edit={$id_user}'>Edit</a></td>";
  echo "</tr>";

  if(isset($_GET['delete'])){
    $the_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE id_user = {$the_id} ";
    header("Location: ../view/kelola_pengguna.php"); //header
    $delete_query = mysqli_query($connection,$query);
    }
  }
}

function getAllPenjualan(){
  global $connection;
  $query = "SELECT * FROM penjualan";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $tanggal_penjualan = $row['tanggal_penjualan'];
  $total_penjualan = $row['total_penjualan'];
  $total_laba = $row['total_laba'];


  echo "<tr>";
  echo "<td>{$tanggal_penjualan}</td>";
  echo "<td>{$total_penjualan}</td>";
  echo "<td>{$total_laba}</td>";
  echo "</tr>";
  }
}

function insert_Penjualan(){
  global $connection;
  if(isset($_POST['submit'])){
    $id_user = $_SESSION['kasir'];
    $tanggal_penjualan = date('d-m-y');
    $total_penjualan= $_POST['total_penjualan'];
    $total_laba = $_POST['total_laba'];
    if(empty($total_penjualan) || empty($total_laba)){
      echo "This field should not empty";
    }else {
      $query = "INSERT INTO penjualan(id_user,tanggal_penjualan,total_penjualan,total_laba) ";
      $query .= "VALUE('{$id_user}',now(),'{$total_penjualan}','{$total_laba}') ";

      $create_category_query = mysqli_query($connection,$query);
      if(!$create_category_query){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}


function findAllPenjualan(){
  global $connection;
  $query = "SELECT * FROM penjualan";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_penjualan = $row['id_penjualan'];
  $tanggal_penjualan = $row['tanggal_penjualan'];
  $total_penjualan = $row['total_penjualan'];
  $total_laba = $row['total_laba'];


  echo "<tr>";
  echo "<td>{$tanggal_penjualan}</td>";
  echo "<td>{$total_penjualan}</td>";
  echo "<td>{$total_laba}</td>";
  echo "<td><a href='../view/kelola_penjualan.php?delete={$id_penjualan}'>Delete</a></td>";
  echo "<td><a href='../view/kelola_penjualan.php?edit={$id_penjualan}'>Edit</a></td>";
  echo "</tr>";

  if(isset($_GET['delete'])){
    $the_penju_id = $_GET['delete'];
    $query = "DELETE FROM penjualan WHERE id_penjualan = {$the_penju_id} ";
    header("Location: ../view/kelola_penjualan.php"); //header
    $delete_query = mysqli_query($connection,$query);
    }
  }
}

function getAllIdBarang(){
  global $connection;
  $query = "SELECT id_barang FROM barang";
  $select_users= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
  $id_barang = $row['id_barang'];


  echo "<option value=$id_barang>{$id_barang}</option>";
  }
}

function insert_pengadaan(){
  global $connection;
  if(isset($_POST['submit'])){
    $nama = $_POST['nama_suplier'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    if(empty($nama_supplier) || empty($jumlah) || empty($harga_beli_satuan) || empty($id_barang)){
      echo "This field should not empty";
    }else {
      $query = "INSERT INTO users(nama,username, password, status, alamat) ";
      $query .= "VALUE('{$nama}','{$username}','{$password}','{$status}','{$alamat}') ";

      $create_category_query = mysqli_query($connection,$query);
      if(!$create_category_query){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}

function getAllPengadaan(){
  global $connection;
  $query = "SELECT nama, alamat, total_transaksi, tanggal, nama_suplier, status FROM pengadaan,users";
  $select_pengadaan= mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_pengadaan)){
  $nama = $row['nama'];
  $alamat = $row['alamat'];
  $total_transaksi = $row['total_transaksi'];
  $tanggal = $row['tanggal'];
  $nama_suplier = $row['nama_suplier'];
  $status = $row['status'];
  
  if($_SESSION['suplier_name'] == $nama_suplier && $status == 'staf_barang' ){
    echo "<tr>";
    echo "<td>{$nama}</td>";
    echo "<td>{$alamat}</td>";
    echo "<td>{$total_transaksi}</td>";
    echo "<td>{$tanggal}</td>";
    echo "</tr>";
  }
  }
}
 ?>
