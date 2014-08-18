<link href="<?php echo Yii::app()->homeUrl; ?>css/invedo.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="60;URL=/in-ve.html" />
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody><tr>
    <td><div class="box_kqxs">
<table align="center" cellpadding="0" cellspacing="0" width="100%" border="0">
	<tbody>
		<tr>
			<td class="title">KẾT QUẢ XỔ SỐ Miền <?php echo ($mien==1)?"Nam":"Trung"; ?> - <?php echo $date;?></td>
		</tr>
		<tr>
			<td class="topsms"><b><i>Xổ số Lê Chung - www.lechung.vn</i></b></td>
		</tr>
		<tr>
			<td valign="top">
            <div class="bkqmiennam">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td width="80" valign="top">
								<table cellpadding="0" cellspacing="0" class="leftcl" width="100%">
									<tbody>
										<tr>
											<td class="thu">
												</td>
										</tr>
										<tr>
											<td class="ngay">
												<?php echo $date;?></td>
										</tr>
										<tr>
											<td class="giai8">
												Giải 8</td>
										</tr>
										<tr>
											<td class="giai7">
												Giải 7</td>
										</tr>
										<tr>
											<td class="giai6">
												Giải 6</td>
										</tr>
										<tr>
											<td class="giai5">
												Giải 5</td>
										</tr>
										<tr>
											<td class="giai4">
												Giải 4</td>
										</tr>
										<tr>
											<td class="giai3">
												Giải 3</td>
										</tr>
										<tr>
											<td class="giai2">
												Giải 2</td>
										</tr>
										<tr>
											<td class="giai1">
												Giải 1</td>
										</tr>
										<tr>
											<td class="giaidb">
												<strong>ĐB</strong></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td valign="top">
								<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
         <?php foreach($data as $item){  ?>  
         <?php $tinh = Tinh::model()->findByPk($item->provice); ?>                     
        <td valign="top" width="<?php echo 100/count($data); ?>%"><table cellpadding="0" cellspacing="0" class="rightcl" width="100%">
	<tbody>
		<tr>
			<td class="tinh">
				<?php echo str_replace("Xổ Số ","",$tinh->tinh); ?></td>
		</tr>
		<tr>
			<td class="matinh">
				<?php echo $item->loaive; ?></td>
		</tr>
		<tr>
			<td class="giai8">
				<div><?php echo $item->tam; ?></div></td>
		</tr>
		<tr>
			<td class="giai7">
				<div><?php echo $item->bay; ?></div></td>
		</tr>
		<tr>
			<td class="giai6">
				<div><?php echo $item->sau1; ?></div><div><?php echo $item->sau2; ?></div><div><?php echo $item->sau3; ?></div></td>
		</tr>
		<tr>
			<td class="giai5">
				<div><?php echo $item->nam; ?></div></td>
		</tr>
		<tr>
			<td class="giai4">
				<div><?php echo $item->tu1; ?></div><div><?php echo $item->tu2; ?></div><div><?php echo $item->tu3; ?></div><div><?php echo $item->tu4; ?></div><div><?php echo $item->tu5; ?></div><div><?php echo $item->tu6; ?></div><div><?php echo $item->tu7; ?></div></td>
		</tr>
		<tr>
			<td class="giai3">
				<div><?php echo $item->ba1; ?></div><div><?php echo $item->ba2; ?></div></td>
		</tr>
		<tr>
			<td class="giai2">
				<div><?php echo $item->nhi; ?></div></td>
		</tr>
		<tr>
			<td class="giai1">
				<div><?php echo $item->nhat; ?></div></td>
		</tr>
		<tr>
			<td class="giaidb">
				<div><?php echo $item->db; ?></div></td>
		</tr>
	</tbody>
</table></td>

<?php } ?>

</tr></tbody></table></td>
						</tr>
					</tbody>
				</table>
                </div>
			</td>
		</tr>
		<tr>
			<td class="bottom" style="text-align: center" valign="top"><span class="vdbottom">ĐỔI SỐ TRÚNG ĐẶC BIỆT - 0909 68 68 68 - WWW.LECHUNG.VN</span></td>
		</tr>
	</tbody>
</table></div></td>
  </tr>
</tbody></table>
<script language="javascript">
window.print();
</script>