<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=doitac&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
   <b>Tên: </b> <input name="ten" value="<?=$item['ten']?>" type="text" size="40"   />	
	<br />
    <b>&nbsp;</b> 
    <img src="<?=_upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>Dạng:.jpg|.gif|png</strong><br />
	<b>Liên kết: </b> <input name="url" type="text" size="40"   />	
    <br /><br/>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man_photo'" class="btn" />
</form>