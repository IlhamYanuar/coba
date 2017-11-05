<?php
if ($_FILES["uploadedfile"]["size"] < 2097152)
{
  if ($_FILES["uploadedfile"]["error"] > 0)
  {
    header('Location: /');
  }
  else
  {
     if(isset($_POST['q1']))
    {
      $filepath = "D:/Dropbox/Kasubag Tata Usaha/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath))
        {
        echo "Berhasil di kirim ke Kasubag Tata Usaha<br>";
    }
      else{
        copy($filepath,$filepath2);
        copy($filepath,$filepath3);
        copy($filepath,$filepath4);
        copy($filepath,$filepath5);
        copy($filepath,$filepath6);
        copy($filepath,$filepath7);
        copy($filepath,$filepath8);
      }
    }
    if(isset($_POST['q2']))
    {
      $filepath2 = "D:/Dropbox/Kasi Karantina Hewan/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath2))
        {
        echo "Berhasil di kirim ke Kasi Karantina Hewan<br>  ";
    }
      else{
        copy($filepath2,$filepath);
        copy($filepath2,$filepath3);
        copy($filepath2,$filepath4);
        copy($filepath2,$filepath5);
        copy($filepath2,$filepath6);
        copy($filepath2,$filepath7);
        copy($filepath2,$filepath8);

      }
    }
    if(isset($_POST['q3']))
    {
      $filepath3 = "D:/Dropbox/Kasi Karantina Tumbuhan/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath3))
        {
        echo "Berhasil di kirim ke Kasi Karantina Tumbuhan<br> ";
    }
      else{
        copy($filepath3,$filepath);
        copy($filepath3,$filepath2);
        copy($filepath3,$filepath4);
        copy($filepath3,$filepath5);
        copy($filepath3,$filepath6);
        copy($filepath3,$filepath7);
        copy($filepath3,$filepath8);

      }
    }
    if(isset($_POST['q4']))
    {
      $filepath4 = "D:/Dropbox/Korjabfung POPT/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath4))
        {
        echo "Berhasil di kirim ke Korjabfung POPT<br>";
    }
      else{
        copy($filepath4,$filepath);
        copy($filepath4,$filepath2);
        copy($filepath4,$filepath3);
        copy($filepath4,$filepath5);
        copy($filepath4,$filepath6);
        copy($filepath4,$filepath7);
        copy($filepath4,$filepath8);

      }
    }
    if(isset($_POST['q5']))
    {
      $filepath5 = "D:/Dropbox/Korjabfung Medik Veteriner/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath5))
        {
        echo "Berhasil di kirim ke Korjabfung Medik Veteriner<br> ";
    }
      else{
        copy($filepath5,$filepath);
        copy($filepath5,$filepath2);
        copy($filepath5,$filepath3);
        copy($filepath5,$filepath4);
        copy($filepath5,$filepath6);
        copy($filepath5,$filepath7);
        copy($filepath5,$filepath8);

      }
    }
    if(isset($_POST['q6']))
    {
      $filepath6 = "D:/Dropbox/Pj. Wilker/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath6))
        {
        echo "Berhasil di kirim ke Pj. Wilker<br> ";
    }
      else{
        copy($filepath6,$filepath);
        copy($filepath6,$filepath2);
        copy($filepath6,$filepath3);
        copy($filepath6,$filepath4);
        copy($filepath6,$filepath5);
        copy($filepath6,$filepath7);
        copy($filepath6,$filepath8);

      }
    }
    if(isset($_POST['q7']))
    {
      $filepath7 = "D:/Dropbox/Auditor/" .  $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath7))
        {
        echo "Berhasil di kirim ke Auditor<br>";
    }
      else{
        copy($filepath7,$filepath);
        copy($filepath7,$filepath2);
        copy($filepath7,$filepath3);
        copy($filepath7,$filepath4);
        copy($filepath7,$filepath5);
        copy($filepath7,$filepath6);
        copy($filepath7,$filepath8);

      }
    }
    if(isset($_POST['q8'] ))
    {
      $filepath8 = "D:/Dropbox/Arsip/"  . $_FILES["uploadedfile"]["name"];
      if(copy($_FILES["uploadedfile"]["tmp_name"], $filepath8))
      {
        echo "Berhasil di kirim ke Arsip<br> ";
      }
    else{
        copy($filepath8,$filepath);
        copy($filepath8,$filepath2);
        copy($filepath8,$filepath3);
        copy($filepath8,$filepath4);
        copy($filepath8,$filepath5);
        copy($filepath8,$filepath6);
        copy($filepath8,$filepath7);
      }
     }
   }
  }
else
{
  echo "File too large.";
}
?>


<?php

// We're putting all our files in a directory called images.

// Desired folder structure
if (
    isset($_POST['folder'], $_FILES['uploadedfile']['error']) &&
    is_int($_FILES['uploadedfile']['error']) &&
    is_string($_POST['folder'])
) {
try{
$folder = $_POST['folder'];
$dirPath = "D:/Dropbox/$folder/";
 if ( ! is_dir($dirPath)) {
                mkdir($dirPath);
            }
// Separate out the data

switch ($_FILES['uploadedfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('File is not choosed');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('File is too large');
            default:
                throw new RuntimeException('Unknown error occurred');
        }
        
        if ($_FILES['uploadedfile']['size'] > 100000000) {
            throw new RuntimeException('File is too large');
        }
        //if (!preg_match('/\A(?!\.)[\w.-]++(?<!\.)\z/', $_FILES['uploadedfile']['name'])) {
           // throw new RuntimeException('Invalid filename: ' . h($_FILES['uploadedfile']['name']));
        //}
        $dirPath = $dirPath . str_replace(' ', '_', basename($_FILES["uploadedfile"]["name"]));
        if(isset($_POST['folder'] ))
        {
          if(isset($_POST['q9'])){
            if (copy($_FILES['uploadedfile']['tmp_name'],$dirPath)) 
          {
            echo"berhasil di upload";
          }else{
            echo"gagal";               
            }
          }
        }
        $msgs[] = 
            'Uploaded successfully: ' .
            ($_POST['folder'] === '' ? '.' : $_POST['folder']) .
            '/' .
            $_FILES['uploadedfile']['name']
        ;

    } catch (RuntimeException $e) {

        $msgs[] = $e->getMessage();

    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" href="./asset/bootstrap.min.css">
<link rel="stylesheet" href="./asset/global.css">
  <script src="./asset/jquery-2.2.3.min.js"></script>
  <script src="./asset/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<button type="button" class="btn btn-danger" onClick="history.go(-1);">Kembali</button>
</body>
</html>
