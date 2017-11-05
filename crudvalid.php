<?php
include ('koneksi.php');
$msg="";
$filepath="gambar/";
//This gets all the other information from the form
$pic=($_FILES['uploadedfile']['name']);



date_default_timezone_set('Asia/Jakarta');
if ($_FILES["uploadedfile"]["size"] < 2097152)
{
  if ($_FILES["uploadedfile"]["error"] > 0)
  {
    header('Location: /');
  }
  else
  {
    
if(isset($_POST['submit'])){
$id_pimpinan	= $_POST['pimpinan'];
$disposisi		= $_POST['disposisi'];
$maxtgl			  = $_POST['maxtgl'];
$q1           = implode(" ", $_POST['q1']);

$filepath = "gambar/"  .$pic;
      if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $filepath))
      {
        echo"<script language='javascript'>
            alert('Berhasil di Validasi')
            top.location='index.php';
            </script>";
      }
    }
      else{
         echo"<script language='javascript'>
            alert('Gagal di validasi')
            top.location='index.php';
            </script>";
     }
   }
 }
     else{
        echo"<script language='javascript'>
            alert('file gambar terlalu besar')
            top.location='index.php';
            </script>";
     }


$data = mysqli_query($mysqli, "INSERT INTO pimpinan SET id_pimpinan='$id_pimpinan', disposisi='$disposisi', maxtgl='$maxtgl',image='$pic', q1='$q1' ") or die ("data salah: ".mysqli_error($mysqli));
//$data1=mysqli_query($mysqli,"INSERT INTO disposisi (image) VALUES ('$pic')") ;

if ($data){
	$sql = mysqli_query($mysqli, "UPDATE `disposisi` SET `valid` = '1' WHERE `disposisi`.`id` = '$id_pimpinan'") or die ("data error: ".mysqli_error($mysqli));

}

?>
