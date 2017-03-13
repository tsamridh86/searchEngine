<?php
	require "config/config.php";
	$connect = new connector();
    $deleteId = $_POST['deleteId'];
    $query = "SELECT id FROM FILES WHERE id = ".$deleteId;
    $fileExists = $connect->executeQuery($query);
    $fileExists = $fileExists->fetch_assoc();
    if($fileExists['id'] == $deleteId)
    {
        $query = "DELETE FROM FILES WHERE id = ".$deleteId;
        $connect->executeQuery($query);
        echo "File Deleted Successfully";   
    }
    else 
        echo "This File Id does not exist. Please try again.";
?>