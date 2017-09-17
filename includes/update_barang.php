<form action="" method="post">
  <div class="form-group">

    <?php
      if(isset($_GET['edit'])){
      $cat_id = $_GET['edit'];

      $query = "SELECT * FROM barang WHERE id_barang = $id_barang";
      $select_categories_id= mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_categories_id)){
        $id_barang = $row['id_barang'];
        $kategori = $row['kategori'];
      $nama_barang = $row['nama_barang'];
      $stock = $row['stok'];
      $harga_jual = $row['harga_jual'];
    ?>
    <label for="cat_title">Edit Kategori</label>
    <input class="form-control" type="text" name="kategori" value="<?php if(isset($kategori)){echo $kategori;} ?>">
    <label for="cat_title">Edit Nama Barang</label>
    <input class="form-control" type="text" name="nama_barang" value="<?php if(isset($nama_barang)){echo $nama_barang;} ?>">
    <label for="cat_title">Stock</label>
    <input class="form-control" type="text" name="stock" value="<?php if(isset($stock)){echo $stock;} ?>">
    <label for="cat_title">Harga Jual</label>
    <input class="form-control" type="text" name="harga_jual" value="<?php if(isset($harga_jual)){echo $harga_jual;} ?>">
    <?php }} ?>

    <?php
    if(isset($_POST['update_category'])){
      $kategori = $_POST['kategori'];
      $nama_barang = $_POST['nama_barang'];
      $stock= $_POST['stock'];
      $harga_jual = $_POST['harga_jual'];
      $query = "UPDATE barang SET kategori = '{$kategori}',nama_barang = '{$nama_barang}',
      stok = '{$stock}',harga_jual = '{$harga_jual}' WHERE id_barang = {$id_barang} ";
      $update_query = mysqli_query($connection,$query);
      if(!$update_query){
        die("Query Failed" . mysqli_error($connection));
      }
    }

     ?>
  </div>
  <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_category" value="Update Category" >
  </div>

</form>
