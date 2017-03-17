<?php
	error_reporting(0);
	require 'config/config.php';
	$query = "SELECT * FROM FILES WHERE ";
	$flag = 0;
	if(!empty($_POST['query'])) $query = $query . "fileName like '%".$_POST['query']."%' and ";
	else $flag++;		
	if(!empty($_POST['category'])) $query = $query . "category = '". $_POST['category'] . "' and ";
	else $flag++;
	if(!empty($_POST['sort']))
	{
		if($flag == 2) $query = substr($query,0,-6);
		else 	$query = substr($query,0,-4);
		$query = $query. "order by ". $_POST['sort'] . " and ";
	}
	else $flag++;
	if( $flag == 3 ) $query = substr($query,0,-6);
	else $query = substr($query,0,-4);
	$connect = new connector();
	$result = $connect->executeQuery($query);
	if($result != false)
	{
		$i = 0;
		while ($row = $result->fetch_assoc())
		{
			$fileName = $row['fileName'];
			$output[$i]['fileName'] = substr($fileName, 0 , -4 );
			$output[$i]['downloadLocation'] = "uploads/".$row['id'].substr($fileName, -4);
			$output[$i]['category'] = $row['category'];
			$output[$i]['dateModified'] = $row['dateModified'];
			$output[$i]['fileId'] = $row['id'];
			$i++;
		}
		echo json_encode($output);
	}
	else
		echo "not here"	;
?>