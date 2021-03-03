<?php
include('koneksi.php');

  $id = $_GET['id'];

   $query= "DELETE FROM rekap WHERE id='$id'";
    $sql=mysqli_query($kon,$query);
    if($sql){
           echo "<script>alert('Berhasil  Menghapus Data');document.location.href='index.php';</script>"; 
    }else{
          echo "<script>alert('Gagal Menghapus Data');history.go(-1);</script>";
    }
    

?>