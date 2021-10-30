<?php
$d->reset();
$sql_cat="select* from table_tour_cat where hienthi=1 order by stt";
$d->query($sql_cat);
$result_cat=$d->result_array();

$d->reset();
$sql_cat="select* from table_news where hienthi=1 and id_item=2 order by stt";
$d->query($sql_cat);
$gioithieu=$d->result_array();

$d->reset();
$sql_cat="select* from table_news where hienthi=1 and id_item=3 order by stt";
$d->query($sql_cat);
$boithuong=$d->result_array();

$d->reset();
$sql="select * from #_photo where hienthi=1 and com='banner_top'";
$d->query($sql);
$item=$d->fetch_array();
?>

<div id="header" style="background:url(images/banner.jpg) no-repeat top left">
    	<div id="banner" style="position:relative;height:118px">
        <div style ="position:absolute;top:20px;left:200px;text-align:center">            
            <p style="color: #000080;font-size: 25px;font-weight: bold;margin-bottom:10px">TỔNG CÔNG TY CỔ PHẦN BẢO HIỂM PETROLIMEX</p>
            <p style="color: #ff6600;font-size: 20px;font-weight: bold;">PETROLIMEX INSURANCE CORPORATION (PJICO)</p>
        </div>
         <div style="position:absolute;right:10px;bottom:10px"><a href="vi/index.html" id="vi"><img src="images/vi.png" alt="" /></a>&nbsp;<a id="en" href="en/index.html"><img src="images/en.png" alt="" /></a></div>
  </div>
        <div id="top-menu" style="position:relative">
			<ul class="nav1" style="float:left">
            	<li><a href="<?=$lang?>/index.html" <?php if($_REQUEST['com']=='index'||$_REQUEST['com']=='') echo "class='active'";?>><?=_trangchu?></a></li>
            	<li><a href="<?=$lang?>/gioi-thieu-chung.html" <?php if($_REQUEST['com']=='gioi-thieu-chung') echo "class='active'";?>><?=_gioithieu?></a>
                	<ul>
                    <?php foreach($gioithieu as $item){ ?>
                    	<li><a href="<?=$lang?>/gioi-thieu/<?=$item['id']?>/<?=$item['tenkhongdau']?>.html"><?=$item['ten_'.$lang]?></a>
                         </li><?php }?>
	                </ul>
                </li>
            	<li><a href="<?=$lang?>/san-pham.html" <?php if($_REQUEST['com']=='san-pham') echo "class='active'";?>><?=_sanpham?></a>
                	<ul>
                    <?php foreach($result_cat as $item){ ?>
                    	<li><a href="<?=$lang?>/sanpham/<?=$item['tenkhongdau']?>.html"><?=$item['ten_'.$lang]?></a>
                         </li><?php }?>
                </ul></li>
                <li><a href="<?=$lang?>/boi-thuong-chung.html" <?php if($_REQUEST['com']=='boi-thuong-chung') echo "class='active'";?>><?=_boithuong?></a>
                	<ul>
                    <?php foreach($boithuong as $item){ ?>
                    	<li><a href="<?=$lang?>/boi-thuong/<?=$item['id']?>/<?=$item['tenkhongdau']?>.html"><?=$item['ten_'.$lang]?></a>
                         </li><?php }?>
	                </ul>
                </li>  
            	<li><a href="<?=$lang?>/tin-tuc.html" <?php if($_REQUEST['com']=='tin-tuc') echo "class='active'";?>><?=_tintuc?></a></li>
            	     
                <li><a href="<?=$lang?>/lien-he.html" <?php if($_REQUEST['com']=='lien-he') echo "class='active'";?>><?=_lienhe?></a></li>  
                <li><a href="<?=$lang?>/co-hoi-viec-lam.html" <?php if($_REQUEST['com']=='co-hoi-viec-lam') echo "class='active'";?>><?=_cohoivieclam?></a> </li>

            </ul>
        </div>
    <div class="clear"></div>
    </div><!-- end header-->