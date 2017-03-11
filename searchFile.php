<?php
	$query = "SELECT * FROM FILES WHERE ";
	$flag = 0;
	if(!empty($_POST['query'])) $query = $query . "fileName like '%".$_POST['query']."%' and ";
	else $flag++;		
	if(!empty($_POST['category'])) $query = $query . "category = '". $_POST['category'] . "' and ";
	else $flag++;
	if(!empty($_POST['sort'])) $query = $query. "order by ". $_POST['sort'] . " and ";
	else $flag++;
	if( $flag == 3 ) $query = substr($query,0,-6);
	else $query = substr($query,0,-4);
	echo $query;
?>