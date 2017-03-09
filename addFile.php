<?php
	require "config/config.php";
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
    	$uploadedFile = $_FILES['file']['tmp_name'];
    	$uploadedFileName = $_FILES['file']['name'];
    	$extension = substr($uploadedFileName, -3);
    	// $category = checkExtension($extension);
        move_uploaded_file($uploadedFile, 'uploads/' . $uploadedFileName);
    	echo $extension;
    }

?>