<?php
   $target_dir = "uploads/news/";
   $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $errorMsg = "";
   
   function compressImage($source, $destination, $quality) {

    $info = getimagesize($source);
  
    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
  
  }

   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
     if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
     } else {
       $errorMsg = "File is not an image.";
       $uploadOk = 0;
     }
   }
   
   // Check if file already exists
   if (file_exists($target_file)) {
     $errorMsg = "Sorry, file already exists.";
     $uploadOk = 0;
   }
   
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
     $errorMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }
   
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
     $errorMsg = "Sorry, your file was not uploaded.";
   // if everything is ok, try to upload file
   } else {
     compressImage($_FILES["thumbnail"]["tmp_name"], $target_file,60);
   }
   if(isset($_POST["title"]) && isset($_POST["des"]) && $uploadOk == 1){
       require "config/dbaccess.php";
       $stmt = $con->prepare("INSERT INTO news(title,des,added,thumbnail)values(?,?,NOW(),?)");
       $stmt->bind_param('sss',$_POST["title"],$_POST["des"],$target_file);
       $stmt->execute();
       header('Location: index.php');
   }
?>