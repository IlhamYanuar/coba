<?php
include ('koneksi.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Daftar Disposisi</title>
<link rel="stylesheet" href="./asset/bootstrap.min.css">
<link rel="stylesheet" href="./asset/global.css">
  <script src="./asset/jquery-2.2.3.min.js"></script>
  <script src="./asset/bootstrap.min.js"></script>
</head>

<body>
<header style="background: teal;">
<div class="container">
<div class="col-md-5">
<img src="asset/logo.png" width="240px">
</div>
</div>
</header>

<div class="container">
<div class="row">
<div class="col-md-12">

<div class="box box-primary">
<div class="box-header">
        <h3 class="box-title">Daftar Disposisi</h3>                                    
    </div><!-- /.box-header -->
    <!--
    <p align="left"> <a href="formulir.php" class="btn btn-success">Buat Baru</a></p>
    -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. Agenda</th>
                    <th>Tanggal</th>
                    <th>No Surat</th>
                    <th>Dari</th>
                    <th>Perihal</th>
                    <th>Status</th>
                    <th>Unduh</th>
                    <th>Upload</th>
                </tr>
            </thead>
            <tbody>
<?php
    $data = mysqli_query($mysqli,"SELECT * FROM `disposisi` ORDER BY `disposisi`.`tgldibuat` DESC ");
while ($show = mysqli_fetch_array($data)) {
?>

    <tr>
    <td><?php if($show['valid']==1): ?>
            <a href="preview.php?id=<?php echo $show['id'];?>"><?php echo $show['noAgenda'];?></a>

        <?php else: ?>
            <a href="preview unvalid.php?id=<?php echo $show['id'];?>"><?php echo $show['noAgenda'];?></a>
        <?php endif; ?>
    </td>
    <td><?php echo $show['tgldibuat'];?></td>
    <td><?php echo $show['no_surat'];?></td>
    <td><?php echo $show['dari'];?></td>
    <td><?php echo $show['perihal'];?></td>
    
    <td>
        <?php if($show['valid']==1): ?>
            Tervalidasi

        <?php else: ?>
           <a href="valid.php?id=<?php echo $show['id'];?>" class="btn btn-danger">Validasi</a>
        <?php endif; ?>
    </td>
    <td><?php if($show['valid']==1): ?>
    <a href="pdf.php?id=<?php echo $show['id'];?>" class="btn btn-success">Unduh</a>
    <?php else: ?>
        <a href="pdf unvalid.php?id=<?php echo $show['id'];?>" class="btn btn-success">Unduh</a>
        <?php endif; ?>
    </td>
    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Upload</button>
        <!--MODAL -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload ke Dropbox</h4>
                </div>
                <div class="modal-body">
                  <p>
                    
                        <form enctype="multipart/form-data" method="post" action="upload1.php">
            <fieldset>
                <input type="file" name="uploadedfile"><br />
                        <label><input type="checkbox" name="q1" value="Kasubag Tata Usaha<br>">Kasubag Tata Usaha</label><br>
                        <label><input type="checkbox" name="q2" value="Kasi Karantina Hewan<br>" >Kasi Karantina Hewan</label><br>
                        <label><input type="checkbox" name="q3" value="Kasi Karantina Tumbuhan<br>" >Kasi Karantina Tumbuhan</label><br>
                        <label><input type="checkbox" name="q4" value="Korjabfung POPT<br>">Korjabfung POPT</label><br>
                        <label><input type="checkbox" name="q5" value="Korjabfung Medik Veteriner<br>">Korjabfung Medik Veteriner</label><br>
                        <label><input type="checkbox" name="q6" value="Pj. Wilker<br>">Pj. Wilker</label><br>
                        <label><input type="checkbox" name="q7" value="Auditor<br>">Auditor</label><br>
                        <label><input type="checkbox" name="q8" value="Arsip<br>">Arsip</label><br>
                <label><input type="checkbox" name="q9"><input type="text" id="folder" name="folder" value=""></label>
                <br><input type="submit" value="Upload">
            </fieldset></form>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
    </td>
                    <?php } ?>
                </tr>
                
            </tbody>
          
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div></div></div>
<script src="asset/jquery-1.7.2.min.js"></script>
<script src="asset/bootstrap.min.js"></script>
<script src="asset/datatables/jquery.dataTables.min.js"></script>
<script src="asset/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="asset/datatables/dataTables.bootstrap.css">

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
  </script>
  <!--
  <p align="center">Copyright &copy 7 a.m Mediatech-Udinus@2017</p>
  -->
</body>
</html>