<!DOCTYPE html>
<html>
<head>
  <title>JKTRANS</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/7c32c656cb.js" crossorigin="anonymous"></script>
   <style type="text/css">
    *{
      font-family: Times New Roman;
    }
  </style>
</head>
<body>
   <div class="container pt-5">
    <h1>DATA REKAPAN</h1>

     <a class="tombol" href="tambahrekap.php"><button class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Data Baru</button> </a>

     
     <h3>Data user</h3>
     <table border="1" class="table">
     <tr>
     <th class="text-center">No</th>
     <th class="text-center">Kode</th>
     <th class="text-center">Colli</th>
     <th class="text-center">Berat</th>
     <th class="text-center">Confrankert</th>
     <th class="text-center">Penerima Barang</th> 
     <th class="text-center">Keterangan</th> 
     <th class="text-center" colspan="2">Aksi</th> 
     </tr>
    <?php 
     include "koneksi.php";
     $query_mysqli = mysqli_query($kon,"SELECT * FROM rekap")or die(mysqli_error());
     $nomor = 1;
     while($data = mysqli_fetch_array($query_mysqli)){
     ?>
     <tr>
     <td> <?php echo $nomor++; ?></td>
     <td> <?php echo $data['kode_rekap']; ?></td>
     <td> <?php echo $data['colli']; ?></td>
     <td> <?php echo $data['berat']; ?></td>
     <td> <?php echo $data['confrankert']; ?></td>
     <td> <?php echo $data['penerima']; ?></td>
     <td> <?php echo $data['keterangan']; ?></td>
     
     <td class="text-center">
      <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">
        <button type="submit" class="btn btn-primary" name="edit">
          <i class="fas fa-edit"></i>  Edit  
        </button>
      </a>
      <a  href="?hapus?id=<?php echo $data['id']; ?>" class="btn btn-danger">
         <button type="submit"  name="hapus">
          <i class="fas fa-trash-alt"></i>  Hapus  
          </button>
      </a>
     
     </td>
     </tr>
      <?php } ?>
     </table>



  </div>


</body>
</html>

<?php
if (isset($_POST["hapus"])) {
  $id = $_GET['id'];
  echo $id;
   $query= "DELETE FROM rekap WHERE id='$id'";
    $sql=mysqli_query($kon,$query);

    if($sql){
           echo "<script>alert('Berhasil  Menghapus Data');document.location.href='index.php';</script>"; 
    }else{
          echo "<script>alert('Gagal Menghapus Data');history.go(-1);</script>";
    }
}

?>