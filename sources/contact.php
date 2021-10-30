<?php if(!defined('_source')) die("Error");
		$title_bar = _lienhe." - ";
		if(!empty($_POST)){
			include_once _lib."C_email.php";
			$data['ten'] = $_POST['ten'];
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['tieude'] = $_POST['tieude1'];
			$data['noidung'] = $_POST['noidung'];
			$data['noidung'] = $_POST['noidung'];
			$data['id_sanpham'] = $_REQUEST['id'];
			$data['ngaytao'] = time();
			if($_REQUEST['id']==''){
			$to['name'] ='Tran Quoc Thang';
			$to['email'] ='tqthang08@gmail.com';
			$from['name'] = $_POST['ten'];
			$from['email'] = $_POST['email'];
			$subject = "THAI HA - ".$_POST['tieude1'];
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
				<tr>
					<th>Tiêu đề :</th><td>'.$_POST['tieude1'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			
			$e = new C_email;
			
			if($e->MailSend($to, $subject, $body, $from)) transfer("Thông tin liên hệ được gửi.<br>Cảm ơn.", "index.php?com=contact");
			else transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "index.php?com=contact");
		}
		else
		{
		
		$d->setTable('contact');
		if($d->insert($data))
			transfer("Thông tin liên hệ sản phẩm này được gửi", "index.php");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=contact&id=".$_REQUEST['id']."");
		}
		}
				$d->reset();
			$sql_contact = "select noidung_vi,noidung_en from #_lienhe ";
			$d->query($sql_contact);
			$company_contact = $d->fetch_array();
	
?>