<?php
	$d->reset();
	$sql="select* from #_quangcao where hienthi=1";
	$d->query($sql);
	$result_khuyenmai=$d->result_array();
    ?>
    <div style="width:960px; position:absolute;bottom:10px;right:10px;">
<div class="tcat">Quảng cáo</div>
                <div style="border: 1px solid #CCC;padding:10px;border-radius: 3px;">
                 <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                 <?php foreach($result_khuyenmai as $item){ ?>
                    	<li><a href="<?=$item['mota']?>" target="_blank"><img style="border:1px solid #CCC" src="<?=_upload_hinhanh_l.$item['photo']?>" width="130px" height="130"/></a></li> <? }?>
                    </ul>
                </div>
                </div>