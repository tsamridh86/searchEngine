<?php
	require "config/config.php";
	$connect = new connector();
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
    	$uploadedFile = $_FILES['file']['tmp_name'];
    	$uploadedFileName = $_FILES['file']['name'];
    	$extension = substr($uploadedFileName, -3);
    	$category = checkExtension(strtolower($extension));
    	$uploadTime = time();
        move_uploaded_file($uploadedFile, 'uploads/'.$connect->getLastestId().".".$extension);
    	$query = "INSERT INTO FILES ( fileName , category , dateModified ) VALUES ('".$uploadedFileName."','".$category."',".$uploadTime.")";
    	$connect->executeQuery($query);
    	echo "File Uploaded Successfully!";
    }
?>