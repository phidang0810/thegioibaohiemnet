<?php
$d->reset();
$sql="select * from table_tour where hienthi=1 and hot>0 limit 0,10";
$d->query($sql);
$result_sp=$d->result_array();

	//$d->reset();
	//$sql_sp="select * from table_doitac limit 0,5";
	//$d->query($sql_sp);
	//$result_sp=$d->result_array();
?>
    
    <div id="quangcao">
        <div class="content">
        <div class="box_productspecial">
			<div class="marquee" id="mycrawler2">
                        <?php foreach( $result_sp as $item){ ?><a href="sanpham/<?=$item['id']?>/<?=$item['tenkhongdau']?>.html"><img src="<?=_upload_sanpham_l.$item['photo']?>" width="170" height="108"/></a>
        
					  <?php } ?>    
       </div>   </div></div>  
</div>

<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'padding': '0px 30px',
		'width': '930px',
		'height': '140px'
	},
	inc: 5, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>

