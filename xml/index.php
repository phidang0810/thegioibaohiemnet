<?php
session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	$lang="vi";
	$lang_arr=array("vi","en");
	if (isset($_GET['lang']) == true){
		  if (in_array($_GET['lang'], $lang_arr)==true) $lang = $_GET['lang'];
		}
	require_once _source."lang_$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<base href="http://<?=$config_url?>/"  />
<meta name="author" content="Diệp Phi Đằng [phidangmtv@gmail.com]" />
<title><?=$title_bar?><?=$row_title['ten_'.$lang]?></title>
<meta name="keywords" content="<?=$row_meta['ten']?>" />
<meta name="description" content="<?=$row_meta['ten']?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="https://www.thegioibaohiem.net/css/style.css" />
<link rel="stylesheet" type="text/css" href="https://www.thegioibaohiem.net/css/simple-scroll.css" /></head>
<link rel="stylesheet" type="text/css" href="https://www.thegioibaohiem.net/css/prettyPhoto.css" /></head>
<link rel="stylesheet" href="https://www.thegioibaohiem.net/css/slider/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://www.thegioibaohiem.net/css/slider/nivo-slider.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="css/slider/jquery.nivo.slider.pack.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/crawler.js"></script>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
 $('#slider').nivoSlider();
 <?php if($_REQUEST['lang']){?>
	$("#vi").click(function(){
		ad=window.location.href;		
		kq=ad.replace('/en/','/vi/')
		document.location=kq;
		return false;
		});
	$("#en").click(function(){
		ad=window.location.href;
		kq=ad.replace('/vi/','/en/')
		document.location=kq;
		return false;
		});<? }?>
		
	$(".scroller").simplyScroll({
				orientation:'vertical',
				auto:'true'
				});
	$(".scroller2").simplyScroll({
				orientation:'vertical',
				auto:'true',
				customClass:'simply-scroll2',
				});
	$("#nav1 li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(50);
				$(this).find('a:first').addClass('active');
				},function(){$(this).find('ul:first').css({visibility: "hidden"});$(this).find('a:first').removeClass('active'); 				
			});
	$("#nav1 ul li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(50);
				$(this).find('a:first').addClass('active2');
				},function(){$(this).find('ul:first').css({visibility: "hidden"});$(this).find('a:first').removeClass('active2'); 				
			});
	$("#nav2 li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(100);
				$(this).find('a:first').addClass('active');
				},function(){$(this).find('ul:first').css({visibility: "hidden"}); $(this).find('a:first').removeClass('active');
				});
				 $("#usual1 ul").idTabs(); 

})
</script>
<script type="text/javascript">
function ClickToURL(linkVal)
{
	if (linkVal != 0)
		window.open(linkVal, "newwindow");
}
</script>
<script language="javascript"> 

function textboxChange(tb, f, sb) 
{
    if (!f) 
    {
        if (tb.value == "") 
        {
            tb.value = sb;
        }
    }
    else 
    {
        if (tb.value == sb)
        {
            tb.value = "";
        }
    }
}
</script>
<script language="javascript"> 
    function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
	}
	function onSearch(evt) {	
			var keyword = document.getElementById("keyword").value;
			if(keyword=='' ||keyword=='<?php echo _timkiem?>')
				alert('<?php echo _nhaptk?>!');
			else{
			//var encoded = Base64.encode(keyword);
			location.href = "<?=$lang?>/tim-kiem/keyword="+keyword;
			loadPage(document.location);			
			}
	}		
</script>
<?php if($template =="sanpham_detail"){?>
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		 $('#slider').nivoSlider();
                $('a[rel^="prettyPhoto"]').prettyPhoto({
                    theme: 'dark_rounded',
					show_title: false,
                    overlay_gallery: false
                });
				  $("#usual1 ul").idTabs(); 
		});
</script>
<?php } ?>
<style>
.theme-default #slider {
    width:570px; /* Make sure your images are the same size */
    height:300px; /* Make sure your images are the same size */
}
</style>
</head>

<body>
<div id="wrap" style="position:relative">    
<div id="wrapper">
    <?php include _template."layout/header.php"?>
    <div id="container">
    	<?php include _template."layout/left.php"?>
        <div id="mainx">
        	<?php include _template."layout/slider.php"?>
        <div id="main"><?php include _template.$template."_tpl.php"; ?>
		</div>
    	        
        </div><!--end main-->
        <?php include _template."layout/right.php"?>
        <div class="clear"></div>
    </div><!--end container-->
		<?php include _template."layout/doitac.php"?>        
    	<?php include _template."layout/footer.php"?>        
    
</div><!--end wrapper-->
</div>
    	<?php include _template."quangcao.php"?>        
</body>
</html>