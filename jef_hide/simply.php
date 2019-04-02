<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$file_name = $_FILES['myFile']['name'];
		$file_size = $_FILES['myFile']['size'];
		$file_type = $_FILES['myFile']['type'];
		$temp_name = $_FILES['myFile']['tmp_name'];
				
		$location = "images/";
			
		move_uploaded_file($temp_name, $location.$file_name);
		echo "http://tascbca1619.in/jef_hide/up.html/images/".$file_name;
	}else{
		echo "Error";
	}