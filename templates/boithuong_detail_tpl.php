
<div class="tcat"><?=$tintuc_detail[0]['ten_'.$lang]?></div>
   <div class="content">  
      <div style="margin-bottom:10px;">
   <div style="float:left" class="fb-like" data-href="<?=$link?>" data-send="false" data-width="200" data-show-faces="false"></div> 
   <g:plusone annotation="inline"></g:plusone>
    <div class="clear"></div>
</div>           
           <?=$tintuc_detail[0]['noidung_'.$lang]?>           
          <div class="othernews">
           <h1><?=_tinkhac?></h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="<?=$lang?>/boi-thuong/<?=$tinkhac['id']?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;" title="<?=htmlentities($tinkhac['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"><?=$tinkhac['ten_'.$lang]?> (<?=make_date($tinkhac['ngaytao'])?>)</a></li>
<?php }?>
     </ul>
</div>

<?php 
$url = (!empty($_SERVER['HTTPS'])) ?
               "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] :
               "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<div>
  <h3 style="margin-top:50px">Bình Luận</h3>
      <div class="fb-comments" data-href="<?php echo $url?>"
       data-num-posts="10" data-width="100%"></div>
</div>
<style>
.fb-comments, .fb-comments span, .fb-comments iframe { width: 100% !important; }
</style>

</div>