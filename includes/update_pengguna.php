<form action="" method="post">
  <div class="form-group">

    <?php
      if(isset($_GET['edit'])){
      $user_id = $_GET['edit'];

      $query = "SELECT * FROM users WHERE id_user = $user_id";
      $select_user_id= mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_user_id)){
        $id_user = $row['id_user'];
        $nama = $row['nama'];
        $username = $row['username'];
        $status = $row['status'];
        $alamat = $row['alamat'];
    ?>
    <label for="cat_title">Edit Nama</label>
    <input class="form-control" type="text" name="nama" value="<?php if(isset($nama)){echo $nama;} ?>">
    <label for="cat_title">Edit Username</label>
    <input class="form-control" type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>">
    <label for="cat_title">Status</label>
    <input class="form-control" type="text" name="status" value="<?php if(isset($status)){echo $status;} ?>">
    <label for="cat_title">Alamat</label>
    <input class="form-control" type="text" name="alamat" value="<?php if(isset($alamat)){echo $alamat;} ?>">
    <?php }} ?>

    <?php
    if(isset($_POST['update_pengguna'])){
      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $status= $_POST['status'];
      $alamat = $_POST['alamat'];
      $query = "UPDATE users SET nama = '{$nama}',username = '{$username}',
      status = '{$status}',alamat = '{$alamat}' WHERE id_user = {$id_user} ";
      $update_query = mysqli_query($connection,$query);
      if(!$update_query){
        die("Query Failed" . mysqli_error($connection));
      }
    }

     ?>
  </div>
  <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_pengguna" value="Update Category" >
  </div>

</form>
