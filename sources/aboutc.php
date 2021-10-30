<?php  if(!defined('_source')) die("Error");
$d->reset();
$sql="select* from table_about";
$d->query($sql);
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_about= $row['noidung_'.$lang];
	}
$row_meta=$row['meta'];	
	// thanh tieu de
	$title_bar="";
	$title_bar .= _gioithieu." - ";
?>