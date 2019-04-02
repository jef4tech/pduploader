<em><b>
<h2>Upload,Save and Download video </h2>
<form method="POST" action="" enctype="multipart/form-data">
<input type="file" name="video"/>
<input type="submit" name="submit" value="Upload"/></b>
</form></em>

<?php>
include("connect.php");
$errors=1;
//Targeting Folder
$target="images/";
if(isset($_POST['submit'])){
//Targeting Folder 
$target=$target.basename($_FILES['video']['name']);
//Getting Selected video Type
$type=pathinfo($target,PATHINFO_EXTENSION);
 //Allow Certain File Format To Upload
 if($type!='mp4' && $type!='3gp' && $type!='avi'){
  echo "Only mp4,3gp,avi file format are allowed to Upload";
  $errors=0;
 }
 //checking for Exsisting video Files
  if(file_exists($target)){
   echo "File Exist";
   $errors=0;
   }
  $filesize=$_FILES['video']['size'];
  if($filesize>250*2000000){
  echo 'You Can not Upload Large File(more than 500MB) by Default ini setting..<a     href="http://www.codenair.com/2018/03/how-to-upload-large-file-in-php.html">How to   upload large file in php</a>'; 
    $errors=0;
    }
   if($errors == 0){
   echo ' Your File Not Uploaded';
    }else{
 //Moving The video file to Desired Directory
  $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
  if($uplaod_success){
  //Getting Selected video Information
    $name=$_FILES['video']['name'];
    $size=$_FILES['video']['size'];
    $result=mysqli_query($con,"INSERT INTO VIdeos           (name,size,type)VALUES('".$name."','".$size."','".$type."')");
    if($result==TRUE){
    echo "Your video '$name' Successfully Upload and Information Saved Our  Database";
    }
   }
  }
  }
 ?>