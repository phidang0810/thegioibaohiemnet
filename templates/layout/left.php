<?php
$d->reset();
$sql="select * from table_doitac where com='congtrinh' and hienthi=1";
$d->query($sql);
$result_ct=$d->result_array();

$d->reset();
$sql_cat="select* from table_tour_cat where hienthi=1 order by stt limit 0,7";
$d->query($sql_cat);
$result_cat=$d->result_array();

$d->reset();
	$sql_lienket = "select ten,url from #_lkweb order by stt asc";	
	$result_lienket = $d->query($sql_lienket);
	
$d->reset();
$sql="select * from table_doitac where com='doitac' and hienthi=1";
$d->query($sql);
$result_doitac=$d->result_array();

?>

<div id="left">
        	<div class="modul">
            	<div class="title" style="color:#000;line-height:36px"><?=_danhmucsanpham?></div>
                <div class="content">
                <ul id="nav2">
                	<?php for($i=0,$count_cat=count($result_cat);$i<$count_cat;$i++){ ?>
                    <li style="position:relative" <?php if($i==$count_cat-1) echo 'style="border:none;"'; ?>><?=$result_cat[$i]['ten_'.$lang]?>
                    <?php 
				$d->reset();
				$sql_item="select id,ten_vi,ten_en,tenkhongdau from #_tour where hienthi=1 and id_cat='".$result_cat[$i]['id']."'";
				$d->query($sql_item);
				$result_item=$d->result_array();
				$count_item=count($result_item);
				if($count_item>0){
                    	echo"<ul>";
						for($j=0;$j<$count_item;$j++){?>
					<li><a href="<?=$lang?>/sanpham/<?=$result_item[$j]['id']?>/<?=$result_item[$j]['tenkhongdau']?>.html" title="<?=htmlentities($result_item[$j]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"><?=$result_item[$j]['ten_'.$lang]?></a></li>
					<?php }?>                                                    
                        </ul><?php }?>
                    </li><?php }?>                                                                            
                </ul>
                </div>
            </div>
            
        </div><!--end left-->