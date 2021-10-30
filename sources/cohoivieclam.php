<?php  if(!defined('_source')) die("Error");
$d->reset();
$sql="select* from table_cohoivieclam";
$d->query($sql);
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_about= $row['noidung_'.$lang];
	}
	$row_meta=$row['meta'];
	// thanh tieu de
	$title_bar="";
	$title_bar .= _cohoivieclam." - ";
		$link="https://thegioibaohiem.net/$lang/co-hoi-viec-lam.html";
?>