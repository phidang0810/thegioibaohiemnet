<h3>Thêm mới yahoo</h3>

<form name="frm" method="post" action="index.php?com=yahoo&act=save" enctype="multipart/form-data" class="nhaplieu">

	
	<b>Yahoo</b> 
	<input type="text" name="yahoo" value="<?=@$item['yahoo']?>" class="input" /><br />
	
   <b>Facebook</b> 
	<input type="text" name="facebook" value="<?=@$item['facebook']?>" class="input" /><br />
    <b>Twitter</b> 
	<input type="text" name="twitter" value="<?=@$item['twitter']?>" class="input" /><br />
    <b>Google+</b> 
	<input type="text" name="gg" value="<?=@$item['gg']?>" class="input" /><br />
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=yahoo&act=man'" class="btn" />
</form>