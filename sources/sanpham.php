<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select * from #_tour where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten_'.$lang].' - ';
		$link="https://thegioibaohiem.net/$lang/san-pham/$id/".$tintuc_detail[0]['tenkhongdau'].".html";
	$sql_lanxem = "UPDATE #_tour SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);
		//lay hinh` cua san pham
		$sql_detail = "select* from #_tour where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
		
		$sql_hinhanh="select photo,thumb from #_hinhanh where hienthi=1 and id_photo = '".$row_detail['id']."' order by stt,id desc";
		$d->query($sql_hinhanh);
		$row_hinhanh = $d->result_array();	
	$row_meta=$tintuc_detail[0]['meta'];
	#các tin cu hon
	$sql_khac = "select * from #_tour where hienthi=1 and id <>'$id' and id_cat='".$tintuc_detail[0]['id_cat']."' order by stt,ngaytao desc limit 0,12";
	$d->query($sql_khac);
	$tintuc = $d->result_array();	
	$template ="sanpham_detail";
	
}else
{
	$id =  addslashes($_GET['idc']);
	$sql="select tenkhongdau,ten_vi,ten_en,id from #_tour_cat where tenkhongdau='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]['ten_'.$lang].' - ';	
	$title_tcat=$loaitin[0]['ten_'.$lang];
	$sql_tintuc = "select ten_vi,ten_en,tenkhongdau,photo,id from #_tour where hienthi=1 and id_cat='".$loaitin[0]['id']."'  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=9;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
$template ="sanpham_item";
	
}
?>