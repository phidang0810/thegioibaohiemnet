<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=khachhang&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
    <b>Hình ảnh ></b> <input type="file" name="file" /> <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png</strong><br />
    <br />
	<b>Link: </b> <input name="url" type="text" size="40"   />	
    <br /><br/>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khachhang&act=man_photo'" class="btn" />
</form>