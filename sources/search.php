<?php  if(!defined('_source')) die("Error");
			
		if(isset($_GET['keyword'])){
			$tukhoa =  $_GET['keyword'];
			$tukhoa = trim(strip_tags($tukhoa));    	
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}								
			// cac san pham
			$sql_product = "select * from #_tour where (ten_vi LIKE '%$tukhoa%') and hienthi=1 order by stt,id desc";			
			$d->query($sql_product);
			$product = $d->result_array();	
			
			$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
			$url="index.php?com=search&keyword=$tukhoa";
			$maxR=5;
			$maxP=4;
			$paging=paging($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
		}									
?>