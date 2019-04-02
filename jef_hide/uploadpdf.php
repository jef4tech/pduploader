<?php
$objConnect=mysql_connect("localhost","tascbcai_root","abcd1234")or die("connection error".mysql_error());
$objDb=mysql_select_db("tascbcai_hiding")or die("error in selection".mysql_error());
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $target_path = "images/";
 $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
 
 
 $InsertSQL = "insert into 	fileupload(name)
         values('".  basename( $_FILES['uploadedfile']['name'])."')";
 
 if(mysql_query($InsertSQL))
 {

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} 

 }
 
 mysql_close($conn);
 }else{
 echo "Not Uploaded";
 }

?>