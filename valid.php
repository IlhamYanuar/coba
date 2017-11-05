<?php
//Koneksi ke database
include 'koneksi.php';
//upload image ke database
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
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
    <script src="asset/bootstrap.min.js"></script>
</head>
<body>
<form method="post" runat="server" action="crudvalid.php" enctype="multipart/form-data">
  <table class="table table-border" width=85% align="center">
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
  $data = mysqli_query($mysqli,"SELECT * FROM disposisi WHERE id='$_GET[id]'");

  while ($show = mysqli_fetch_array($data)) {
  ?>
  <td>: <input type="text" name="noagenda" value="<?php echo $show['noAgenda']; ?>" disabled="true">

  </td>
  <td>Tgl: <input type="date" name="tglsekarang" value="<?php echo $show['tgldibuat']; ?>" disabled="true" >
	</td>
  <td>Jam : <input type="text" name="jamskrg" value="<?php echo $show['jamdibuat']; ?>" disabled="true" >
	</td>
  </tr>
  <tr>
  <td>No. Surat</td>
  <td colspan="2">: <input type="text" name="no_Surat" size="25" value="<?php echo $show['no_surat']; ?>" disabled="true"></td>
  <td>Tgl Surat: <input type="date" name="tglsurat" value="<?php echo $show['tgl_surat']; ?>" disabled="true" ></td>
  </tr>
  <tr>
  <td>Dari</td>
  <td colspan="4">: <input type="text" name="dari" size="50" value="<?php echo $show['dari']; ?>" disabled="true" ></td>
  </tr>
  <tr>
  <td>Perihal</td>
  <td colspan="4"><textarea class="form-control" rows="4" cols="2" name="perihal" disabled="true"><?php echo $show['perihal']; ?></textarea></td>
  
  </tr>
  <tr>
  <td colspan="3">
  	<table width="100%" border="0">
  	<tr>
  	<td>Disposisi	:<input style="visibility: hidden;" type="text"  name="pimpinan" value="<?php echo $show['id'];?>"></td>
  	</tr>
  	<tr><td align="left"><textarea class="form-control" rows="4" cols="2" name="disposisi" required></textarea><br>
    </td>
  	</tr>

  	<tr>
    <td align="right">
        <input type="file" id="imgInp" name="uploadedfile"  style="display: none;" required="true" />
        <input id="button" type="button"  name="submit" value="Browse" />
        <img id="blah" src="#" alt="your image" width="70px" />
    </td>
  	</tr>
  	<tr>
      <td>Harus ditindaklanjuti maksimal tgl. : <input type="text" name="maxtgl" class="tgl"></td>
  	</tr>
  	</table>
  	</td>
  	<td colspan="2">Diteruskan kepada :<br>
  	<input type="checkbox" name="q1[]" value="Kasubag Tata Usaha<br>">Kasubag Tata Usaha<br>
  	<input type="checkbox" name="q1[]" value="Kasi Karantina Hewan<br>" >Kasi Karantina Hewan<br>
  	<input type="checkbox" name="q1[]" value="Kasi Karantina Tumbuhan<br>" >Kasi Karantina Tumbuhan<br>
  	<input type="checkbox" name="q1[]" value="Korjabfung POPT<br>">Korjabfung POPT<br>
  	<input type="checkbox" name="q1[]" value="Korjabfung Medik Veteriner<br>">Korjabfung Medik Veteriner<br>
  	<input type="checkbox" name="q1[]" value="Pj. Wilker<br>">Pj. Wilker<br>
  	<input type="checkbox" name="q1[]" value="Auditor<br>">Auditor<br>
  	<input type="checkbox" name="q1[]" value="Arsip<br>">Arsip<br>
    <input type="text" name="q1[]">
  	</td>
  </tr>
  <tr>
  	<td colspan="2" align="center">Catatan : *) coret yang tidak perlu, A: Asli, C : Copy </td>
  	<td colspan="2" align="center">SR:Sangat Rahasia, R: Rahasia, B : Biasa, S: Segera</td>
  </tr>
  </div>
  </table>
  <br>
  <table width=85% border="0" align="center">
  <tr>
  <td align="right">
  <button type="button" class="btn btn-danger" onClick="history.go(-1);">Kembali</button>&nbsp
  <input type="submit" name="submit" class="btn btn-primary" value="Kirim">

  </td>
  </tr>
  </table>
  </form>
<br><br>
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
      
  <!-- Large modal -->
</div>
  
<?php } ?>
</body>
</html>
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
$(document).ready(function(){
$('#button').on("click", function(){
    document.getElementById('imgInp').click();
    $(this).toggle();
});
});
</script>
<script>
    $(function() {
    $( ".tgl" ).datepicker({ dateFormat: 'dd-mm-yy', minDate: 0 }).val();
    });
    </script>