<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<div class="tcat">Giỏ hàng</div>
	<div class="content">
    
			<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" /> 
				<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
    	<?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#075992" style="font-weight:bold;height:20px;color:#FFF"><td align="center">STT</td><td>Tên</td><td align="center">Giá</td><td align="center">Số lượng</td><td align="center">Tổng giá</td><td align="center">Xóa</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];					
					$pname=get_product_name($pid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td width="10%" align="center"><?=$i+1?></td>
            		<td width="29%"><?=$pname?></td>
                    <td width="17%" align="center"><?=number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ</td>
                    <td width="15%" align="center"><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;</td>                    
                    <td width="18%" align="center"><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;VNĐ</td>
                    <td width="10%" align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/delete.gif" border="0" /></a></td>
            		</tr>
            <?					
				}
			?>
				<tr><td colspan="6" style="background:#E6E6E6">
                <b>Tổng giá bán: <?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VNĐ</b>
                </td></tr>
                <tr>
                	<td colspan="6" align="right">
                     <input type="button" value="Mua tiếp" onclick="window.location='http://<?=$config_url?>/san-pham.html'" class="button">
                <input type="button" value="Xóa tất cả" onclick="clear_cart()" class="button"><input type="button" value="Cập nhật" onclick="update_cart()" class="button"><input type="button" value="Thanh toán" onclick="window.location='http://<?=$config_url?>/thanh-toan.html'" class="button">
                    </td>
                </tr>
			<?
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm nào trong giỏ hàng!</td>";
			}
		?>
        </table>			
  </form>
         </div>
   