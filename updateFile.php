<?php
	require "config/config.php";
	$connect = new connector();
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $changeId = $_POST['updateId'];
        $query = "SELECT id FROM FILES WHERE id = ".$changeId;
        $fileExists = $connect->executeQuery($query);
        $fileExists = $fileExists->fetch_assoc();
        if($fileExists['id'] == $changeId)
        {
            $uploadedFile = $_FILES['file']['tmp_name'];
            $uploadedFileName = $_FILES['file']['name'];
            $extension = substr($uploadedFileName, -3);
            $category = checkExtension(strtolower($extension));
            $uploadTime = time();
            move_uploaded_file($uploadedFile, 'uploads/'.$changeId.".".$extension);
            $query = "UPDATE FILES SET fileName = '".$uploadedFileName."' , category = '".$category."', dateModified = ".$uploadTime." where id = ".$changeId;
            $connect->executeQuery($query);
            echo "File Updated Successfully";   
        }
        else 
            echo "This File Id does not exist. Please try again.";
    	
    }
?>