  <?php
  $d->reset();
$sql="select* from table_about";
$d->query($sql);
$row = $d->fetch_array();	?>
<div class="tcat"><?=_gioithieu?></div>
<div class="content">
<?=$row['noidung_'.$lang]?>
</div>
