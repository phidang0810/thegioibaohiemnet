<div class="tcat"><?=$title_tcat?></div>
   <div class="content">
               	         
             <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            <div class="sp">
            
                        <div class="hinh"><a title="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" href="<?=$lang?>/sanpham/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><img alt="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" title="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" src="<?=_upload_sanpham_l.$tintuc[$i]['photo']?>" width="170px" height="132px" onmouseover="doTooltip(event, '<?=_upload_sanpham_l.$tintuc[$i]['photo'];?>')" onmouseout="hideTip()"/></a></div>
                        <div class="ten" ><?=$tintuc[$i]['ten_'.$lang]?></div>
                        <div class="gia"><?=_gia?>: <span style="color:red;font-weight:bold"><?php if($tintuc[$i]['gia']==0) echo _lienhe; else echo number_format ($tintuc[$i]['gia'],0,",",".")." VNĐ";?></span></div>
                    </div> <?php } }else echo _cn;  ?>   
              <div class="clear"></div>                                  
            <div class="phantrang" ><?=$paging['paging']?></div>
            </div> 