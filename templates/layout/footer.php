<?php 
$d->reset();
$sql="select* from table_footer where hienthi=1";
$d->query($sql);
$result=$d->fetch_array();

$d->reset();
$sql_cat="select* from table_news where hienthi=1 and id_item=2 order by stt";
$d->query($sql_cat);
$gioithieu=$d->result_array();

$d->reset();
$sql_cat="select* from table_news where hienthi=1 and id_item=3 order by stt";
$d->query($sql_cat);
$boithuong=$d->result_array();

$d->reset();
$sql_cat="select* from table_hotline where hienthi=1";
$d->query($sql_cat);
$hotline=$d->fetch_array();

$d->reset();
$sql_cat="select* from table_yahoo where hienthi=1";
$d->query($sql_cat);
$yahoo=$d->fetch_array();
?>

<div id="footer">
<div style="width:1000px;margin:0 auto;">
	<div class="col" style="width:260px;color:#7e7b76;padding-top:80px;background:url(images/logo.png) no-repeat top center;text-align:center">
 <?=$result['noidung_'.$lang]?>
 <?=_luottruycap?>:<span style="color:#FFF;font-weight:bold"><?php $count = count_online(); echo $count['daxem']?></span>
    </div>
    <div class="col">
    <h3><?=_gioithieu?></h3>
    <?php foreach($gioithieu as $item){?>
    <a href="<?=$lang?>/gioi-thieu/<?=$item['id']?>/<?=$item['tenkhongdau']?>.html"><?=$item['ten_'.$lang]?></a><br/><? }?>
    </div>
    <div class="col">
    <h3><?=_boithuong?></h3>
    <?php foreach($boithuong as $item){?>
    <a href="<?=$lang?>/boi-thuong/<?=$item['id']?>/<?=$item['tenkhongdau']?>.html"><?=$item['ten_'.$lang]?></a><br/><? }?>
    </div>
    <div class="col">
    <h3><?=_hotro?></h3>
        <ul class="f_hotro">
        <li class="facebook"><a href="<?=$yahoo['facebook']?>"></a></li>
        <li class="twitter"><a href="<?=$yahoo['twitter']?>"></a></li>
        <li class="gg"><a href="<?=$yahoo['gg']?>"></a></li>
        <div class="clear"></div>
        </ul>
         <h3><?=_hotline?></h3>
        <span style="color:#f6cb58;font-size:20px"><?=$hotline['dienthoai']?></span>
    </div>
    <div class="clear"></div>
    </div>
</div>

<div style="font-weight:bold;z-index:999;height:30px;line-height:30px;background:#069;color:#ffffff;width:150px;position:fixed;bottom:0;left:0;padding-left:20px">Hotline : <?php echo $hotline['didong'] ?></div>