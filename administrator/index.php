<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'AMTECOL';
	
	$d = new database($config['database']);
	
	switch($com){
		case 'user':
			$source = "user";
			break;
		case 'banggia':
			$source = "banggia";
			break;
			
		case 'about':
			$source = "about";
			break;
			case 'cohoivieclam':
			$source = "cohoivieclam";
			break;
		case 'boithuongc':
			$source = "boithuongc";
			break;
		case 'hoatdong':
			$source = "hoatdong";
			break;
		case 'quytrinhsanxuat':
			$source = "quytrinhsanxuat";
			break;
		case 'hethongcuahang':
			$source = "hethongcuahang";
			break;				
		case 'huongdan':
			$source = "huongdan";
			break;
		case 'slider':
			$source = "slider";
			break;	
		case 'footer':
			$source = "footer";
			break;		
		case 'video':
			$source = "video";
			break;
			
		case 'video2':
			$source = "video2";
			break;
		case 'title':
			$source = "title";
			break;
			
		case 'tintuc':
			$source = "tintuc";
			break;
		case 'boithuong':
			$source = "boithuong";
			break;
		case 'hosonangluc':
			$source = "hosonangluc";
			break;
		
		case 'meta':
			$source = "meta";
			break;

		case 'company':
			$source = "company";
			break;
		case 'lkweb':
			$source = "lkweb";
			break;
		case 'bannerqc':
			$source = "bannerqc";
			break;
		case 'hinhanh':
			$source = "hinhanh";
			break;
	
		case 'careers':
			$source = "Careers";
			break;
		
		case 'quangcao':
			$source = "quangcao";
			break;
			
		case 'lienket':
			$source = "lienket";
			break;
		case 'product':
			$source = "product";
			break;
		case 'product1':
			$source = "product1";
			break;
			
		case 'yahoo':
			$source = "yahoo";
			break;
		case 'lkweb':
			$source = "lkweb";
			break;	
		case 'doitac':
			$source = "doitac";
			break;
		case 'khachhang':
			$source = "khachhang";
			break;
			case 'congtrinh':
			$source = "congtrinh";
			break;


		case 'contact':
			$source = "contact";
			break;
		
		case 'hotline':
			$source = "hotline";
			break;
		case 'service':
			$source = "service";
			break;
		case 'lienhe':
			$source = "lienhe";
			break;
		//---------------------------------------------------------
		case 'sanpham':
			$source = "sanpham";
			break;
			
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
	
	if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Administration</title>
<link href="media/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/scripts/jquery.js"></script>
<style>
.panel_wrapper img{max-width:100%}
#previewImg{
    max-width: 100%;
    max-height: 190px;
}
</style>
</head>

<body>

<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  
<div id="wrapper">
	<?php include _template."header_tpl.php"?>
    
    <div id="main"> 
		 
        <!-- Right col -->
        <div id="contentwrapper">
        <div id="content">
          <?php include _template.$template."_tpl.php"?>
        </div>
        </div>
        <!-- End right col -->
        
        <!-- Left col -->
        <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php";?>
          </div>
        </div>
        <!-- End Left col -->
		
			<div class="clr"></div>
    </div>
  <div id="footer">
		<?php include _template."footer_tpl.php"?>
	</div>
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php"?>
		<?php }?>
</body>
</html>
