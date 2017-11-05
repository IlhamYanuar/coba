<?php
include ('koneksi.php');
if(isset($_POST['q1'])){
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
         //Query
          $desired_dir="user_data2";
          if(empty($errors)==true){
              if(is_dir($desired_dir)==false){
                  mkdir("$desired_dir", 0700);    // Create directory if it does not exist
              }
              if(is_dir("$desired_dir/".$file_name)==false){
                  move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
              }
              else{                 // rename the file if another one exist
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
?>
