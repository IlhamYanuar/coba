<?php

include_once("koneksi.php");
$id=$_GET['id'];
$data = mysqli_query($mysqli,"SELECT * FROM disposisi INNER JOIN pimpinan ON id=id_pimpinan WHERE id='$_GET[id]'");
  while ($show = mysqli_fetch_array($data)) {
  
  ?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Formulir</title>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <table border="1" style="width: 100%;" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border: none; width: 100%;" align="center" colspan="4" nowrap="true"><font size="3"><b>KEMENTRIAN PERTANIAN</b></font>
    </td>
      </tr>
  <tr>
        <td style="border: none;" align="center" colspan="4"><font size="4"><b>BADAN KARANTINA PERTANIAN</b></font></td>
      </tr>
  <tr>
        <td style="border: none;" align="center" colspan="4"><font size="4"><b>BALAI KARANTINA PERTANIAN KELAS II YOGYAKARTA</b></font></td>
      </tr>
      <tr>
        <td style="border: none;" align="center" colspan="4">Jl. Laksada Adisucipto KM. 8 Maguwoharjo, Depok Sleman, Yogyakarta 52282</td>
      </tr>
  <tr>

  
    <td>No. Agenda</td>
    <td>: <?php echo $show['noAgenda']; ?></td>
    <td>Tgl : <?php 
  $tanggal = $show['tgldibuat'];
  echo date("d/m/Y", strtotime($tanggal)); ?></td>
    <td>Jam : <?php echo $show['jamdibuat']; ?></td>
  </tr>
  <tr>
  <td>No. Surat</td>
  <td colspan="2">  : <?php echo $show['no_surat']; ?></td>
  <td>Tgl Surat: <?php 
  $tanggal = $show['tgl_surat'];
  echo date("d/m/Y", strtotime($tanggal)); ?></td>
  </tr>
  <tr>
  <td>Dari</td>
  <td colspan="3">: <?php echo $show['dari']; ?></td>
  </tr>
  <tr>
    <td>Perihal</td>
    <td colspan="3">: <?php echo $show['perihal']; ?></td>
  </tr>
  <tr>
  <td colspan="3">Disposisi :
  <br><?php echo $show['disposisi']; ?>
  <br><p align="right"><img style="width: 70px;" src="./gambar/<?php echo $show['image'];?>"></p><br>
  Harus ditindaklanjuti maksimal tgl. :  <?php 
          $tanggal = $show['maxtgl'];
          echo date("d/m/Y", strtotime($tanggal)); ?>
  </td>
  <td colspan="1">Diteruskan kepada :<br>
  <?php echo $show['q1']; ?>
  </td>
  </tr>

      </table>
      <br><br>
<?php
  $gambar = mysqli_query($mysqli,"SELECT * FROM upload WHERE id_file='$_GET[id]'");
  while ($tampil = mysqli_fetch_array($gambar)) {
  ?>
  <img style="width: 100%;" src="./user_data/<?php echo $tampil['FILE_NAME'];?>">
  <?php } ?>
</body>
</html>
<?php } ?>