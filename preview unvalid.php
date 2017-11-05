<?php
//Koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Preview Formulir</title>

    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <table width=100% align="center" border="1">
  <div class="form-group">
  <tr>
  <td align="center" colspan="5">
  	<table border="0" width="100%" cellpadding="0" cellspacing="0">
  		<tr>
  		<td align="center"><font size="3"><b>KEMENTRIAN PERTANIAN</b></font></td>
  		</tr>
  		<tr>
  			<td align="center"><font size="4"><b>BADAN KARANTINA PERTANIAN</b></font></td>
  		</tr>
  		<tr>
  			<td align="center"><font size="4"><b>BALAI KARANTINA PERTANIAN KELAS II YOGYAKARTA</b></font></td>
  		</tr>
  		<tr>
  			<td align="center">Jl. Laksada Adisucipto KM. 8 Maguwoharjo, Depok Sleman, Yogyakarta 52282</td>
  		</tr>
  	</table>
  </td>
  </tr>
  <tr>
  <td>No. Agenda</td>
  <?php
  $id=$_GET['id'];

  $data = mysqli_query($mysqli,"SELECT * FROM disposisi  WHERE id='$_GET[id]'");
  while ($show = mysqli_fetch_array($data)) {
  ?>
  <td>: <?php echo $show['noAgenda']; ?>
  </td>
  <td>Tgl: <?php 
  $tanggal = $show['tgldibuat'];
  echo date("d/m/Y", strtotime($tanggal)); ?>
	</td>
  <td>Jam : <?php echo $show['jamdibuat']; ?>
	</td>
  </tr>
  <tr>
  <td>No. Surat</td>
  <td colspan="2">: <?php echo $show['no_surat']; ?></td>
  <td>Tgl Surat: <?php 
  $tanggal = $show['tgl_surat'];
  echo date("d/m/Y", strtotime($tanggal)); ?></td>
  </tr>
  <tr>
  <td>Dari</td>
  <td colspan="4">: <?php echo $show['dari']; ?></td>
  </tr>
  <tr>
  <td>Perihal</td>
  <td colspan="4">: <?php echo $show['perihal']; ?></td>
  </tr>
  <?php }?>
  <tr>
  <td colspan="3">
  	<table width="100%" border="0">
  	<tr>
  	<td>Disposisi	:</td>
  	</tr>
  	<tr><td align="left"><font color="red"><font color="red"> -- Belum di Validasi --</font></font></td>
  	</tr>

  	<tr>
    <td align="right"><font color="red"> -- Belum di Validasi --</font>
    </form> 
    </td>
  	</tr>

  	<tr>
  		<td>Harus ditindaklanjuti maksimal tgl. : <font color="red"> -- Belum di Validasi --</font></td>
  	</tr>
  	</table>
  	</td>
  	<td colspan="2">Diteruskan kepada :<br>
    <font color="red"> -- Belum di Validasi --</font>
  	</td>
  </tr>
  <tr>
  	<td colspan="2" align="center">Catatan : *) coret yang tidak perlu, A: Asli, C : Copy </td>
  	<td colspan="2" align="center">SR:Sangat Rahasia, R: Rahasia, B : Biasa, S: Segera</td>
  </tr>
  </div>
  </table><br><br>
   <table width="95%" border="0" align="center">
  <tr><td align="center"><b>Lampiran</b><br><br></td></tr>
   <?php
  $gambar = mysqli_query($mysqli,"SELECT * FROM upload WHERE id_file='$_GET[id]'");
  while ($tampil = mysqli_fetch_array($gambar)) {
  ?>
  <tr><td align="center"><img src="./user_data/<?php echo $tampil['FILE_NAME'];?>"><br><br>
  </td>
  </tr></table>
  <?php } ?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>