<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];}
switch($act){

	case "man":
		get_items();
		$template = "sanpham/items";
		break;
	case "add":		
		$template = "sanpham/item_add";
		break;
	case "edit":		
		get_item();
		$template = "sanpham/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "sanpham/cats";
		break;
	case "add_cat":		
		$template = "sanpham/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "sanpham/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "sanpham/lists";
		break;
	case "add_list":		
		$template = "sanpham/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "sanpham/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging;	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_tour where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['hot'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_tour SET hot ='$time' WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_tour SET hot =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#----------------------------------------------------------------------------------------
		if($_REQUEST['noibat']!='')
		{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_tour where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
			if($hienthi==0)
			{
			$sqlUPDATE_ORDER = "UPDATE table_tour SET noibat ='$time' WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
			$sqlUPDATE_ORDER = "UPDATE table_tour SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_tour where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
				{
				$sqlUPDATE_ORDER = "UPDATE table_tour SET hienthi=1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
				}
			else
				{
				$sqlUPDATE_ORDER = "UPDATE table_tour SET hienthi=0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
				}	
		}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_tour";	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".(int)$_REQUEST['id_cat']."";
	}
	
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	if($_REQUEST['id_cat']!=''){
		if($_REQUEST['id_item']!='')
		{$url="index.php?com=sanpham&act=man&id_cat=".$_REQUEST['id_cat']."&id_item=".$_REQUEST['id_item'];}
		 $url="index.php?com=sanpham&act=man&id_cat=".$_REQUEST['id_cat'];	
	}else{
	$url="index.php?com=sanpham&act=man";}
	$maxR=5;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man");
	
	$sql = "select * from #_tour where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=sanpham&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
			$d->setTable('tour');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		
		
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['noidung_vi'] = $_POST['noidung_vi'];	
		$data['noidung_en'] = $_POST['noidung_en'];		
		$data['meta'] = $_POST['meta'];	
		$data['maso'] = $_POST['maso'];	
		$data['thoigian'] = $_POST['thoigian'];	
		$data['gia'] = $_POST['gia'];	
		$data['lienhe'] = $_POST['lienhe'];	

		$data['hinhanh'] = $_POST['hinhanh'];	
		//$data['dieukhoan'] = $_POST['dieukhoan'];	
						
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('tour');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=sanpham&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sanpham&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
		}
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['noidung_vi'] = $_POST['noidung_vi'];	
		$data['noidung_en'] = $_POST['noidung_en'];	
		$data['meta'] = $_POST['meta'];	
		$data['maso'] = $_POST['maso'];	
		$data['thoigian'] = $_POST['thoigian'];	
		$data['gia'] = $_POST['gia'];	
		$data['lienhe'] = $_POST['lienhe'];	
		$data['hinhanh'] = $_POST['hinhanh'];	
		//$data['giatour'] = $_POST['giatour'];	
		$data['dieukhoan'] = $_POST['dieukhoan'];		
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('tour');
		if($d->insert($data))
			redirect("index.php?com=sanpham&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=sanpham&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_tour where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		$sql = "delete from #_tour where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=sanpham&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=sanpham&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_tour where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_tour where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=sanpham&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man");
		
}

#====================================

function get_cats(){
	global $d, $items, $paging;
	
	$sql = "select * from #_tour_item";
	if(isset($_REQUEST['id_cat']))	{
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=sanpham&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_cat");
	
	$sql = "select * from #_tour_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=sanpham&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
			$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
	
		$data['id_cat'] = $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('tour_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=sanpham&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sanpham&act=man_cat");
	}else{		
		$data['id_cat'] = $_POST['id_cat'];
	$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('tour_item');
		if($d->insert($data))
			redirect("index.php?com=sanpham&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=sanpham&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_tour_item where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=sanpham&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=sanpham&act=man_cat");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_tour_item where id='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=sanpham&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_cat");
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tour_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tour_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tour_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = $d->query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_tour_cat";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=sanpham&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_list");
	
	$sql = "select * from #_tour_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=sanpham&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
				$d->setTable('tour');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);	
					delete_file(_upload_sanpham.$row['thumb']);				
				}
			}
					
	$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('tour_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=sanpham&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sanpham&act=man_list");
	}else{	
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
		}			
	$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('tour_cat');
		if($d->insert($data))
			redirect("index.php?com=sanpham&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=sanpham&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_tour_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=sanpham&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=sanpham&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=sanpham&act=man_list");
}
?>