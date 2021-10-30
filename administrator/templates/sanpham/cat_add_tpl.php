<h3>Thêm danh mục</h3>
<?php	
	function get_main_item()
	{
		$sql_huyen="select * from table_tour_cat order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	if(!isset($item['ten_vi'])) $item['ten_vi']="";
?>


<form name="frm" method="post" action="index.php?com=sanpham&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	
	<b>Danh mục:</b><?=get_main_item();?><br /><br />
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /><br>
        <b>Tên(english)</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=sanpham&act=man_cat'" class="btn" />
</form>