<link rel="stylesheet" href="https://www.thegioibaohiem.net/css/slider/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://www.thegioibaohiem.net/css/slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://www.thegioibaohiem.net/css/slider/bar.css" type="text/css" media="screen" />
 <script type="text/javascript" src="css/slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<style>
.theme-default #slider {
    width:640px; /* Make sure your images are the same size */
    height:240px; /* Make sure your images are the same size */
}
</style>
<?php
	$d->reset();
	$sql_slider = "select mota_vi,mota_en,photo,link from #_slider order by stt,id desc";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
	
?>
 <div id="slider1">
  <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            <?php foreach($result_slider as $item) {?>
                                    			<a href="<?=$item['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$item['photo']?>" width="640" height="240" title="<?=$item['mota_'.$lang]?>"/></a>
                                                <?php }?>
            </div>
        </div>
 </div>