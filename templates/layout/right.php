<?php
$d->reset();
$sql="select * from table_news where hienthi=1 and id_item=1 order by id desc limit 0,9";
$d->query($sql);
$tintuc=$d->result_array();

$d->reset();
$sql="select * from table_hotline where hienthi=1";
$d->query($sql);
$result_hl=$d->fetch_array();

$d->reset();
$sql="select * from table_yahoo where hienthi=1";
$d->query($sql);
$yahoo=$d->fetch_array();


$d->reset();
$sql="select* from #_doitac where hienthi=1";
$d->query($sql);
$result_dt=$d->result_array();
?>
<div id="xright">
<div class="modul" style="border:none">
	<div class="title" style="background:url(images/hotro.gif) no-repeat top left; height:39px"><?=_hotroonline?></div>
    <div class="content" style="border:1px solid #CCC;padding-bottom:10px">
    	<div style="background:url(images/phone-icon.png) no-repeat 10px 0;padding-left:70px">
            <span style="font-size:16px;font-weight:bold"><?=_hotline?>: </span>
            <br/><span style="color:#069;font-size:20px;font-weight:bold"><?=$result_hl['dienthoai']?></span>
        <br/><br/>
        <a href="ymsgr:sendIM?<?=$yahoo['yahoo']?>">
            <img src="http://opi.yahoo.com/online?u=<?=$yahoo['yahoo']?>&amp;m=g&amp;t=2"></a><br/>
        <span style="margin-top:5px;display:block"><?=_diachic?></span>
        </div>
    	
    </div>
</div>

<div class="modul" style="border:none">
	<div class="title" style="background:url(images/hotro.gif) no-repeat top left; height:39px"><?=_tinmoi?></div>
    <div class="content" style="border:1px solid #CCC">
    	<ul class="nav_news">
        	<?php for($i=0;$i<count($tintuc);$i++){?>
            <li <?php if($i==count($tintuc)-1) echo"style='border:none'";?>><a href="<?=$lang?>/tin-tuc/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><?=catchuoi($tintuc[$i]['ten_'.$lang],47)?></a></li>
            <? }?>
        </ul>
    </div>
</div>

 <div class="modul">
            	<div class="title" style="background:url(images/hotro.gif) no-repeat top left; height:39px"><?=_lienketweb?></div>
                <div class="content" style="height:250px">
               
    	<center><select id="link" class="sbHolder" onChange="ClickToURL(this.value)">
	        <option value="0">-- <?=_lienketweb?> --</option>
        	<?php
            	foreach($result_dt as $item){
			?>
            <option value="<?=$item['url']?>"><?=$item['ten']?></option>
            <?php } ?>
        </select>
        </center><br/>
             <div id="s3" class="pics">
                     <?php foreach($result_dt as $item){ ?>                   
                    <a href="<?=$item['url']?>"><img src="upload/hinhanh/<?=$item['photo']?>"width="300" height="200" /></a>
					<?php }?>
        				</div>
             
                </div>
            </div>

</div>