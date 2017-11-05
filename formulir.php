<!DOCTYPE html>
<html>
<head>
	<title>Form Disposisi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">	
   <h1 align="center">Form Disposisi</h1> 
	<form class="form-horizontal" action="createhead.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
				<label class="control-label col-sm-2" for="agenda">No. Agenda*:</label>
				<div class="col-sm-3">
				<input type="text" name="noAgenda" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="tglskrg">Tanggal :</label>
				<div class="col-sm-2">
				<input type="date" class="form-control" name="tgldibuat">
				</div>
			</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="jamskrg">Jam :</label>
			<div class="col-sm-2">
			<input type="tex" class="form-control" name="jamdibuat" value="<?php date_default_timezone_set('Asia/Jakarta'); $jam=date("H:i:s");
  			echo "$jam"; ?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="noSurat">No. Surat* :</label>
				<div class="col-sm-3">
				<input type="text" name="no_surat" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="noSurat">Tgl. Surat :</label>
				<div class="col-sm-2">
				<input type="date" name="tgl_surat" class="form-control" value="<?php $hari= date('d-m-Y') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="dari">Dari :</label>
				<div class="col-sm-3">
				<input type="text" name="dari" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="perihal">Perihal :</label>
				<div class="col-sm-8">
				<textarea class="form-control" rows="4" cols="2" name="perihal" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="file">Lampirkan File :</label>
				<div class="col-sm-3">
				<input type="file" name="files[]" multiple/>
				</div>
			</div>
			<font color="red"><i>note: Dapat upload lebih dari 1 file.</i></font><br>
			<font color="red"><i>* Wajib di isi</i></font>
			<p align="center">
			<input type="submit" class="btn btn-danger btn-lg" name="submit" value="Kirim" ></p>
		</form>		
	</div>

</body>
</html>