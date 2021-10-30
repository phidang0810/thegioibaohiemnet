
<div class="tcat"><?=$tintuc_detail[0]['ten_'.$lang]?></div>
   <div class="content"> 
   <div style="margin-bottom:10px;">
   <div style="float:left" class="fb-like" data-href="<?=$link?>" data-send="false" data-width="200" data-show-faces="false"></div> 
   <g:plusone annotation="inline"></g:plusone>
    <div class="clear"></div>
</div>
           <?=$tintuc_detail[0]['noidung_'.$lang]?>           
  <div class="othernews">
           <h2><?=_tinkhac?></h2>
      <ul>
           
        <?php foreach($tintuc_khac as $tinkhac){?>
        <li><a href="<?=$lang?>/tin-tuc/<?=$tinkhac['id']?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;" title="<?=htmlentities($tinkhac['ten_'.$lang], ENT_QUOTES, "UTF-8")?>"><?=$tinkhac['ten_'.$lang]?> (<?=make_date($tinkhac['ngaytao'])?>)</a></li>
        <?php }?>
     </ul>

</div>

<?php 
$url = (!empty($_SERVER['HTTPS'])) ?
               "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] :
               "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>

<div>
<div style="padding: 20px">
    <h3>Đánh giá:</h3>
    <div class="my-rating"></div>
</div>
  <h3 style="margin-top:50px">Bình Luận</h3>
      <div class="fb-comments" data-href="<?php echo $url?>"
       data-num-posts="10" data-width="100%"></div>
</div>
</div>
<style>
.fb-comments, .fb-comments span, .fb-comments iframe { width: 100% !important; }
</style>
<link rel='stylesheet' href='/css/star-rating-svg.css' type='text/css' media='all' />
<script type='text/javascript' src='/js/jquery.star-rating-svg.min.js'></script>
<script>
        $(document).ready(function() {
            $(".my-rating").starRating({
                initialRating: 5,
                strokeColor: '#894A00'                        
            });
        });
        </script>
        
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?=$tintuc_detail[0]['ten_'.$lang]?>",
                "image": [
                "{{asset(_upload_news.'_larges/'.$data->large)}}"
                ],
                "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "Le luong"
                }
                },
                "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "reviewCount": "200"
                }
            }
        </script>
<script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?=$tintuc_detail[0]['ten_'.$lang]?>",
                "image": [
                "<?php if($tintuc_detail[0]['thumb']!=NULL) echo _upload_tintuc_l.$tintuc_detail[0]['thumb']; else echo 'images/noimage.gif';?>"
                ],
                "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "Le luong"
                }
                },
                "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "reviewCount": "200"
                }
            }
        </script>