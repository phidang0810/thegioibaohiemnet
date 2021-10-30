<?php

	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	switch($com){	
		
		case 'tim-kiem':
			$source = "search";
			$template ="search";
			break;
		case 'san-pham':
			$template ="sanpham";
			break;
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		case 'tuyen-dung':
			$source = "tuyendung";
			$template = isset($_GET['id']) ? "tuyendung_detail" : "tuyendung";
			break;
			
		case 'gioi-thieu-chung':
			$source = "aboutc";
			$template = isset($_GET['id']) ? "aboutc_detail" : "aboutc";
			break;
		case 'co-hoi-viec-lam':
			$source = "cohoivieclam";
			$template = isset($_GET['id']) ? "aboutc_detail" : "cohoivieclam";
			break;
		case 'gioi-thieu':
			$source = "about";
			$template = isset($_GET['id']) ? "about_detail" : "about";
			break;
		case 'boi-thuong-chung':
			$source = "boithuongc";
			$template = isset($_GET['id']) ? "boithuongc_detail" : "boithuongc";
			break;
		case 'boi-thuong':
			$source = "boithuong";
			$template = isset($_GET['id']) ? "boithuong_detail" : "boithuong";
			break;
			
		case 'hoat-dong':
			$source = "hoatdong";
			$template ="hoatdong";
			break;
		case 'quy-trinh-san-xuat':
			$source = "quytrinhsanxuat";
			$template ="quytrinhsanxuat";
			break;
		case 'he-thong-cua-hang':
			$source = "hethongcuahang";
			$template ="hethongcuahang";
			break;
		case 'huong-dan':
			$source = "huongdan";
			$template = isset($_GET['id']) ? "huongdan_detail" : "huongdan";
			break;
		case 'tour-hot':
			$source = "tourhot";
			$template = "tourhot";
			break;
				
		case 'dich-vu':
			$source = "services";
			$template = isset($_GET['id']) ? "services_detail" : "services";				
			break;		
								
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;	
		case 'ban-do':
			$template = "bando";
			break;	
		
		case 'sanpham':
			$source = "sanpham";						
			break;	
		
										
		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include _source.$source.".php";
	if(isset($_REQUEST['com'])){
		if($_REQUEST['com']=='logout')
		{
		session_unregister($login_name);
		header("Location:index.php");
		}
	}

	$sql_title = "select ten_vi,ten_en from #_title limit 0,1";
	$d->query($sql_title);
	$row_title= $d->fetch_array();
	#  lay meta tim kiem
$sql_meta = "select ten from #_meta limit 0,1";
	$d->query($sql_meta);
	$row_key= $d->fetch_array();	
?>