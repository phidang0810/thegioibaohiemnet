<?php
if(!defined('_source')) die("Error");
if(!defined('_source')) die("Error");
	$d->reset();
	$sql="select ten_vi,ten_en,id,gia,photo,tenkhongdau from #_tour where hienthi=1";
	$d->query($sql);
	$result=$d->result_array();		

	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$lang."/san-pham.html";
	$maxR=9;
	$maxP=5;
	$paging=paging_home($result, $url, $curPage, $maxR, $maxP);
	$result=$paging['source'];
	$count=count($result);
    ?>

	<div class="tcat"><?=_sanpham?></div>
                   <div class="content">
                	<?php for($j=0;$j<$count;$j++){?>
                    <div class="sp">                    
                        <div class="hinh"><a title="<?=htmlentities($result[$j]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" href="<?=$lang?>/sanpham/<?=$result[$j]['id']?>/<?=$result[$j]['tenkhongdau']?>.html"><img alt="<?=htmlentities($result[$j]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" title="<?=htmlentities($result[$j]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" src="<?=_upload_sanpham_l.$result[$j]['photo']?>" onmouseover="doTooltip(event, '<?=_upload_sanpham_l.$result[$j]['photo'];?>')" onmouseout="hideTip()"/></a></div>
                        <h1><?=$result[$j]['ten_'.$lang]?></h1>
                        <h2><?=_xemchitie?></h2>
                        <img src="images/loader.gif" class="loader"/>
                    </div> <?php }?>                
                </div>
             <div class="clear"></div><div class="phantrang" ><?=$paging['paging']?></div>