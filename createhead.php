<?php
//Koneksi ke database
include ('koneksi.php');
//Akhir Koneksi---------------------------------------------------------
date_default_timezone_set('Asia/Jakarta');
if(isset($_POST['submit'])){
$noAgenda	= $_POST['noAgenda'];
$tgldibuat	= $_POST['tgldibuat'];
$jamdibuat	= $_POST['jamdibuat'];
$no_surat	= $_POST['no_surat'];
$tgl_surat	= $_POST['tgl_surat'];
$dari		= $_POST['dari'];
$perihal	= $_POST['perihal'];
 

$data = mysqli_query($mysqli, "INSERT INTO disposisi SET noAgenda='$noAgenda', tgldibuat='$tgldibuat', jamdibuat='$jamdibuat', no_surat='$no_surat', tgl_surat='$tgl_surat', dari='$dari', perihal='$perihal'") or die ("data salah : ".mysqli_error($mysqli));


if ($data){
$last_id = mysqli_query($mysqli, "SELECT id FROM disposisi WHERE id IN(SELECT MAX(id)FROM disposisi)");
 while ($data2 = mysqli_fetch_array($last_id)) {

	if(isset($_FILES['files'])){
	    $errors= array();
		foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
			$file_name = $key.$_FILES['files']['name'][$key];
			$file_size =$_FILES['files']['size'][$key];
			$file_tmp =$_FILES['files']['tmp_name'][$key];
			$file_type=$_FILES['files']['type'][$key];	
	        if($file_size > 2097152){
				$errors[]='File size must be less than 2 MB';
	        }		
	        $query = mysqli_query($mysqli, "INSERT INTO upload SET id_file='$data2[id]', FILE_NAME='$file_name', FILE_SIZE='$file_size', FILE_TYPE='$file_type'") or die ("data salah : ".mysqli_error($mysqli));
	        $desired_dir="user_data";
	        if(empty($errors)==true){
	            if(is_dir($desired_dir)==false){
	                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
	            }
	            if(is_dir("$desired_dir/".$file_name)==false){
	                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
	            }
	            else{									// rename the file if another one exist
	                $new_dir="$desired_dir/".$file_name.time();
	                 rename($file_tmp,$new_dir) ;				
	            }
			 //mysqli_query($query);			
	        }
	        else{
	                print_r($errors);
	        }
	    }
		if(empty($error)){
			echo"<script language='javascript'>
            alert('Data berhasil di input')
            top.location='index.php';
            </script>";

		}
	}

}

}

?>
<?php } ?>
