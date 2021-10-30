<?php
$d->reset();
$sql="select * from table_doitac where com='doitac' and hienthi=1";
$d->query($sql);
$result_sp=$d->result_array();
?>
    
    <div id="doitac" class="modul">
        <div class="title"><?=_doitac?></div>
        <div class="content">
        <div class="box_productspecial">
			<div class="marquee" id="mycrawler2">
                        <?php foreach( $result_sp as $item){ ?><a href="<?=$item['url']?>" title=""><img style="border:none" src="<?=_upload_hinhanh_l.$item['photo']?>" height="140"/></a>
        
					  <?php } ?>    
       </div>   </div></div>  
</div>

<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'padding': '0px 30px',
		'width': '1400px',
		'height': '140px'
	},
	inc: 7, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>

