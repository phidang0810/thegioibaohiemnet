<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=sanpham&act=delete&listid=" + listid;
});
});
</script>
<h3><a href="index.php?com=sanpham&act=add">Thêm sản phẩm</a></h3>
Danh mục&nbsp;<?=get_main_category();?>&nbsp;&nbsp;&nbsp;</h3>
<script language="javascript">	
	function select_onchange()
	{	
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=sanpham&act=man&id_cat="+b.value;	
		return true;
	}
	
	function select_onchange1()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		window.location ="index.php?com=sanpham&act=man&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}

</script>
<?php
	
	function get_main_category()
	{
		global $d;
		$sql="select * from table_tour_cat order by stt asc,id desc";
		$stmt=$d->query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=$d->fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}	
	
	function get_main_item()
	{
		global $d;
		$sql_huyen="select * from table_tour_item where id_cat=".$_REQUEST['id_cat']." order by stt desc ";
		$result=$d->query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=$d->fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>



<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <th style="width:20%;">Danh mục</th>
        <th style="width:25%;">Tên  </th>
        <th style="width:20%;">Hình ảnh</th>
        <th style="width:5%;">Trang Chủ</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:20%;">
			  <?php
				$sql_danhmuc="select ten_vi from table_tour_cat where id='".$items[$i]['id_cat']."'";
				$result=$d->query($sql_danhmuc);
				$item_danhmuc =$d->fetch_array($result);
				echo @$item_danhmuc['ten_vi']
			?>      
        </td>
        
        <td style="width:25%;"><a href="index.php?com=sanpham&act=edit&id_cat=1&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
        <td align="center" style="width:10%;"><img src="<?=_upload_sanpham.$items[$i]['photo']?>" width="80px"/></td>
          
        
         <td align="center" style="width:5%;">
      
      <?php
		if($items[$i]['noibat']>0)
		{
		?>
		<a href="index.php?com=sanpham&act=man<?php $ur=""; if($_REQUEST['id_cat']!=''){
			$ur="&id_cat=".$_REQUEST['id_cat'];
		if($_REQUEST['id_item']!='') $ur.="&id_item=".$_REQUEST['id_item'];} echo $ur;?>&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/old.gif" border="0" /></a>
        <?php
		}
		else
		{
		?>
       <a href="index.php?com=sanpham&act=man<?php $ur=""; if($_REQUEST['id_cat']!=''){
			$ur="&id_cat=".$_REQUEST['id_cat'];
		if($_REQUEST['id_item']!='') $ur.="&id_item=".$_REQUEST['id_item'];} echo $ur;?>&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/new.gif" border="0" /></a>
       <?php }
        ?>      </td>  
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=sanpham&act=man<?php $ur=""; if($_REQUEST['id_cat']!=''){
			$ur="&id_cat=".$_REQUEST['id_cat'];
		if($_REQUEST['id_item']!='') $ur.="&id_item=".$_REQUEST['id_item'];} echo $ur;?>&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=sanpham&act=man<?php $ur=""; if($_REQUEST['id_cat']!=''){
			$ur="&id_cat=".$_REQUEST['id_cat'];
		if($_REQUEST['id_item']!='') $ur.="&id_item=".$_REQUEST['id_item'];} echo $ur;?>&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		<td style="width:5%;"><a href="index.php?com=sanpham&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=sanpham&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=sanpham&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>