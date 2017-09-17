<?php include "db.php" ?>
<?php
if(isset($_POST['commit'])){
  // username and password sent from form
  $username=$_POST['username'];
  $password=$_POST['password'];

  // To protect MySQL injection (more detail about MySQL injection)
  $username = mysqli_real_escape_string($connection,$username);
  $password = mysqli_real_escape_string($connection,$password);
  $sql="SELECT * FROM users WHERE username='$username' and password='$password'";
  $result=mysqli_query($connection,$sql);

  // Mysql_num_row is counting table row
  $count=mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  $status = $row['status'];

  // If result matched $username and $password, table row must be 1 row
  if($count==1 && $status == 'admin' ){
    $_SESSION['admin']=$row['nama'];
     echo "<meta http-equiv='refresh' content='1;url=view/index_pengguna.php'>";
  } elseif($count==1 && $status == 'staf_barang' ){
    $_SESSION['gudang']=$row['id_user'];
    $_SESSION['gudang_name']=$row['nama'];
    echo "<meta http-equiv='refresh' content='2;url=view/index_barang.php'>";
  }elseif($count==1 && $status == 'kasir' ){
    $_SESSION['kasir']=$row['id_user'];
    $_SESSION['kasir_name']=$row['nama'];
    echo "<meta http-equiv='refresh' content='3;url=view/index_penjualan.php'>";
  }elseif($count==1 && $status == 'suplier' ){
    $_SESSION['suplier']=$row['id_user'];
    $_SESSION['suplier_name']=$row['nama'];
    echo "<meta http-equiv='refresh' content='3;url=view/index_supplier.php'>";
  }
} 
 ?>