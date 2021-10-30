<div class="tcat"><?=$title_tcat?></div>
   <div class="content">
               	         
             <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            <div class="box_new">
            	<div class="image_boder"><a href="<?=$lang?>/tin-tuc/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"><img src="<?php if($tintuc[$i]['thumb']!=NULL) echo _upload_tintuc_l.$tintuc[$i]['thumb']; else echo 'images/noimage.gif';?>" onerror="this.src='images/noimage.gif';" width="120" height="80" title="<?=htmlentities($tintuc[$i]['ten'], ENT_QUOTES, "UTF-8")?>" alt="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"/></a></div>
               <h1> <a href="<?=$lang?>/tin-tuc/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=htmlentities($tintuc[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"><?=$tintuc[$i]['ten_'.$lang]?></a></h1> <?=$tintuc[$i]['mota_'.$lang]?>          
              <div class="clear"></div>
            </div>
            <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            <div class="phantrang" ><?=$paging['paging']?></div>
            </div> 