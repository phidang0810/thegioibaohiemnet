
<div class="tcat"><?=_kqtk?></div>
                <div class="content">
                  <?php $count_product1=count($product); if($count_product1!=0){?>
                    <?php
                    for($i=0,$count_product2=count($product);$i<$count_product2;$i++ )
                    {?>				

                    <div class="sp">
                    <div class="ten" style="color:#3385b0;font-weight:bold"><a title="<?=htmlentities($product[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" href="<?=$lang?>/sanpham/<?=$product[$i]['id']?>/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></div>
                        <div class="hinh"><a title="<?=htmlentities($product[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" href="<?=$lang?>/sanpham/<?=$product[$i]['id']?>/<?=$product[$i]['tenkhongdau']?>.html"><img alt="<?=htmlentities($product[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" title="<?=htmlentities($product[$i]['ten_'.$lang], ENT_QUOTES, "UTF-8")?>" src="<?=_upload_sanpham_l.$product[$i]['photo']?>" width="140px" height="140px" onmouseover="doTooltip(event, '<?=_upload_sanpham_l.$product[$i]['photo'];?>')" onmouseout="hideTip()"/></a></div>                      
                       
                        <div class="gia"><?=_gia?>: <span style="color:#FFF;font-weight:bold"><?php if($product[$i]['gia']==0) echo _lienhe; else echo number_format ($product[$i]['gia'],0,",",".")." VNĐ";?></span></div>
                    </div> <?php }?>
                    <?php } else  echo "<p align='center'><font style='font-size:20px; color:#FF0000'>"._khongcosp."<br />
 </font></p>";?>   
                    
                  </div>
              
               <div class="clear"></div><div class="phantrang"><?=$paging['paging']?></div>