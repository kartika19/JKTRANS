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
	<?php
	include('koneksi.php');
	$query = mysqli_query($kon,"SELECT * FROM rekap");
	 while($data = mysqli_fetch_array($query)){

	?>
   <div class="container pt-5">
    <h1>TAMBAH DATA REKAPAN</h1>

     <form method="POST" action="">
     	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
      <div class="form-group row">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" placeholder="Kode"  name="kode_rekap" value='<?php echo $data['kode_rekap'];?>'>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Colli</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" placeholder="Colli" name="colli" value='<?php echo $data['colli'];?>'>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Berat</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" placeholder="Berat" name="berat" value='<?php echo $data['berat'];?>'>
        </div>
      </div>
      <div class="form-group row">
        <label for="kode" class="col-sm-2 col-form-label">Confrankert</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Confrankert"  name="confrankert" value='<?php echo $data['confrankert'];?>'>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Penerima Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Penerima Barang" name="nama_penerima" value='<?php echo $data['penerima'];?>'>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Keterangan" name="keterangan" value='<?php echo $data['keterangan'];?>'>
        </div>
      </div>
  <?php }?>
      <center>
        <div class="form-group row ">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="ubah"><i class="fas fa-plus"></i>   Ubah</button>
        </div>
      </div>
      </center>
      
    </form>
  </div>

</body>
</html>

<?php
 if(isset($_POST["ubah"])){
 	$id=$_POST['id'];
     $kode_rekap= $_POST['kode_rekap'];
     $colli= $_POST['colli'];
     $berat= $_POST['berat'];
     $confrankert= $_POST['confrankert'];
     $nama_penerima= $_POST['nama_penerima'];
     $keterangan= $_POST['keterangan'];

 $query= "UPDATE rekap SET
                          kode_rekap='$kode_rekap',
                          colli='$colli',
                          berat='$berat',
                          confrankert='$confrankert',
                          penerima='$nama_penerima',
                          keterangan='$keterangan'
                           WHERE id='$id'
                      ";

      
$sql=mysqli_query($kon,$query);
    if($query){
           echo "<script>alert('Berhasil Mengubah Produk!');document.location.href='index.php';</script>"; 
    }else{
          echo "<script>alert('Gagal Mengubah Data');history.go(-1);</script>";
    } 
  
 }
?>