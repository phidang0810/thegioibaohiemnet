<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select * from #_news where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten_'.$lang].' - ';
	$row_meta=$tintuc_detail[0]['meta'];
	$link="https://thegioibaohiem.net/$lang/gioi-thieu/$id/".$tintuc_detail[0]['tenkhongdau'].".html";
	#các tin cu hon
	$sql_khac = "select ten_vi,ten_en,tenkhongdau,ngaytao,id from #_news where hienthi=1 and id <>'".$id."' and id_item=2 order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
	
}elseif(isset($_GET['idc'])){
	$id =  addslashes($_GET['idc']);
	$sql="select ten_vi,ten_en,id from #_news_item where tenkhongdau='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]['ten_'.$lang].' - ';
	$title_tcat=$loaitin[0]['ten_'.$lang];
	$sql_tintuc = "select * from #_news where hienthi=1 and id_item='".$loaitin[0]['id']."'  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=5;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}else{
	$title_bar=_gioithieu.' - ';		
	$title_tcat=_gioithieu;	
	$sql_tintuc = "select * from #_news where hienthi=1 and id_item=2 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=5;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}
?>