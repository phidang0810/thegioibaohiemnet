<?php $sql = "select * from #_lienhe limit 0,1";
	$d->query($sql);
	$item = $d->fetch_array();
	?>
<div id="info"><div class="tcat"><?=_bando?></div>
  
   <div class="content">
          	<p><span style="color: #008000; font-size: large;"><?=$item['noidung_'.$lang]?></span></p><br/>              															
       <iframe width="550" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=211212310600439350377.0004cc393a0aa79e8511c&amp;ie=UTF8&amp;t=m&amp;ll=10.98186,106.686838&amp;spn=0.004213,0.00589&amp;z=17&amp;output=embed"></iframe><br /><small>Xem <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=211212310600439350377.0004cc393a0aa79e8511c&amp;ie=UTF8&amp;t=m&amp;ll=10.98186,106.686838&amp;spn=0.004213,0.00589&amp;z=17&amp;source=embed" style="color:#0000FF;text-align:left">Chưa có tiêu đề</a> ở bản đồ lớn hơn</small>
           </div>
           </div>
           
           