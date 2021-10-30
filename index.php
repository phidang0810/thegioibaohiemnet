<?php
session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './administrator/lib/');
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
<base href="https://<?=$config_url?>/"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="https://plus.google.com/u/0/+saigonpjicobaohiem" />
<title><?=$title_bar?><?=$row_title['ten_'.$lang]?></title>
<meta name="keywords" content="<?=$row_key['ten']?>" />
<meta name="description" content="<?=$row_meta?>" />
<meta name="bao hiem" content="https://plus.google.com/u/0/+saigonpjicobaohiem" />
<meta property="fb:app_id" content="907431042624517"/>
<meta property="fb:admins" content="100009015342210"/>
<link href="https://thegioibaohiem.net/favicon.ico" rel="shortcut icon" />

<link type="text/css" rel="stylesheet" href="https://www.thegioibaohiem.net/css/style.css" />
<link href="https://www.thegioibaohiem.net/css/highslide.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://www.thegioibaohiem.net/css/jquery.selectbox.css" />
<link rel="stylesheet" type="text/css" href="https://www.thegioibaohiem.net/css/jca.css" />
<link rel="author" href="https://plus.google.com/u/0/+saigonpjicobaohiem"  />
<script language="javascript" type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/autoScroll.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery_cycle.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.selectbox-0.2.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>

<script language="javascript" type="text/javascript">
$(document).ready(function(){

 <?php if($_REQUEST['lang']){ ?>
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
		});
<?php } ?>

	$(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
 jQuery('#mycarousel').jcarousel({
        vertical: false,
        scroll:1,
		animation:'slow',
		auto:3,
		wrap: 'circular'
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    }); 
 $(".nav1 li").hover(function(){
				$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(100);
				$(this).find('a:first').addClass('active');
				},function(){$(this).find('ul:first').css({visibility: "hidden"}); $(this).find('a:first').removeClass('active');
				});
	$('.sp').hover(function() {
	  $(this).find('h1').slideDown("fast");
	  $(this).find('h2').slideDown("fast");
	   $(this).find('.loader').fadeIn();
	  $(this).addClass('active');
	  }, function() {
		$(this).find('h1').slideUp("fast");
		$(this).find('h2').slideUp("fast");
		$(this).find('.loader').fadeOut();
		$(this).removeClass('active');
	});
	$('#s3').cycle({
    fx:     'fade',
    speed:   300,
    timeout: 3000,
    next:   '#s3',
    pause:   1
});
$(".sbHolder").selectbox();
})
</script>
<script type="text/javascript">

  window.___gcfg = {lang: 'vi'};

 

  (function() {

    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

    po.src = 'https://apis.google.com/js/plusone.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

  })();

</script>
<script type="text/javascript">
function ClickToURL(linkVal)
{
	if (linkVal != 0)
		window.open(linkVal, "newwindow");
}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-38824547-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-38824547-1');
</script>
</head>

<body>
<div style="background:url(images/bg_repeat.png) repeat-y bottom center">
<div style="background:url(images/bg2.png) no-repeat top center">
<div id="wrapper">
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
    <?php include _template."layout/header.php"; ?>
    <div id="container">
    <!--<div style="float:left;width:200px;"><script src="js/date.js"></script></div>-->
    <div style="margin-bottom:5px;padding:0 10px"><marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="2" width="100%"><?=_chao?></marquee></div>
    <?php if($_REQUEST['com']=='index'|| $_REQUEST['com']==''){
		echo "<div id='main2'>";
		include _template."layout/slider.php";
		include _template.$template."_tpl.php";
        echo "</div>";
		include _template."layout/right.php";
	}
	else{
		include _template."layout/left.php";
		echo "<div id='main'>";
		include _template.$template."_tpl.php";
		echo "</div>";
	} ?>
		
        <div class="clear"></div>
        <?php include _template."layout/spkhuyenmai.php"; ?>
    </div><!--end container-->    
      
</div><!--end wrapper-->
</div>
</div>
<?php include _template."layout/footer.php"; ?>
<a href="#" class="scrollToTop"></a>
<script src='https://3lichat.us/onlinechat.php?key=9e94fe158cab1d5023c479ad53298442'></script>
</body>
</html>