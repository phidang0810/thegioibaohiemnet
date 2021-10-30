<script language="javascript" src="admin/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("Email không hợp lệ");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('tieude1'), "Xin nhập Chủ đề.")){
		document.getElementById('tieude1').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>
	<div class="tcat"><?=_lienhe?></div>
  
   <div class="content">
          	<?=$company_contact['noidung_'.$lang];?>  
            <div class="clear" style="border-bottom:2px solid #E2D9CF; margin-bottom:20px;">&nbsp;</div>
            
								<form method="post" name="frm" action="index.php?com=contact<? if($_REQUEST['id']!='') echo "&id=".$_REQUEST['id'];?>">
	
      <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">
                        <tr>
                        <td><?=_hovaten?><span>*</span></td>
						<td><input name="ten" type="text" class="input" id="ten" size="50" /></td>
                        </tr>                        
                         <tr>
                        <td><?=_diachi?><span>*</span></td>
						<td><input name="diachi" type="text"  class="input" size="50" /></td>
                        </tr>
                        <tr>
                        <td><?=_sodienthoai?><span>*</span></td>
						<td><input name="dienthoai" type="text" class="input" id="dienthoai" size="50"/></td>
                        </tr>
                        <tr>
                        <td>Email<span>*</span></td>
						<td><input name="email" type="text" class="input" size="50"  /></td>
                        </tr>                                                  
                        <tr>
                        <td><?=_chude?><span>*</span></td>
						<td>
						<input name="tieude1" type="text" class="input" id="tieude1" size="50"  />
						</td>
                        </tr>                         
                        <tr>
                        <td><?=_noidung?><span>*</span></td>
						<td>
                        <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
                        </td>
                        </tr>
                         <tr>
                         <td>&nbsp;</td>
                        <td> 
                    <input class="button" type="button" value="<?=_gui?>" onclick="js_submit();" />
                    <input class="button" type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />
                                                         
                        </td>
						</tr>
                        </table>   
	                            </form>
								
          </div>