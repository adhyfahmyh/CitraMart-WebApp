<form action="" method="post">
  <div class="form-group">

    <?php
      if(isset($_GET['edit'])){
      $penjualan_id = $_GET['edit'];

      $query = "SELECT * FROM penjualan WHERE id_penjualan = $penjualan_id";
      $select_user_id= mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_user_id)){
        $id_penjualan = $row['id_penjualan'];
        $total_penjualan = $row['total_penjualan'];
        $total_laba = $row['total_laba'];
    ?>
    <label for="cat_title">Edit Total Penjualan</label>
    <input class="form-control" type="text" name="total_penjualan" value="<?php if(isset($total_penjualan)){echo $total_penjualan;} ?>">
    <label for="cat_title">Edit Username</label>
    <input class="form-control" type="text" name="total_laba" value="<?php if(isset($total_laba)){echo $total_laba;} ?>">
    <?php }} ?>

    <?php
    if(isset($_POST['update_penjualan'])){
      $total_penjualan = $_POST['total_penjualan'];
      $total_laba = $_POST['total_laba'];
      $query = "UPDATE penjualan SET total_penjualan = '{$total_penjualan}',total_laba = '{$total_laba}'
      WHERE id_penjualan = {$id_penjualan} ";
      $update_query = mysqli_query($connection,$query);
      if(!$update_query){
        die("Query Failed" . mysqli_error($connection));
      }
    }

     ?>
  </div>
  <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_penjualan" value="Update Penjualan" >
  </div>

</form>
