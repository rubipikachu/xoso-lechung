<?php
$this->renderPartial("_left");
$this->renderPartial("_left1");
$this->renderPartial("_right");?>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-nam.html" class="btn btn-nam">Xổ Số Miền Nam</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-bac.html" class="btn btn-bac">Xổ Số Miền Bắc</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-trung.html" class="btn btn-trung">Xổ Số Miền Trung</a>
<div class="clearfix"></div>
<?php $this->renderPartial("_tablemien"); ?>
<br />
<?php
$day = date("l",time());
$date = date("d-m-Y",time());
if(date("H",time())<16 || (date("H",time())==16 && date("i",time()) <=10)){
   $day = date("l",time() - 86400);
   $date = date("d-m-Y",time() - 86400);
}

$data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
$nam = explode(",",$data->nam);
$trung = explode(",",$data->trung);
$tinhbac = explode(",",$data->bac);

//nam
$criterianam = new CDbCriteria();
$criterianam->condition='date=:date';
$criterianam->params=array(':date'=>$date);
$criterianam->addInCondition("provice", $tinhbac);
$bac = KqxsBac::model()->findAll($criterianam);
?>

<div class="panel panel-danger">
    <div class="panel-heading">Kết quả xổ số Miền Bắc - <?php echo $date ?></div>
    <div class="panel-body">
    
    <?php foreach($bac as $itemnam){  ?>
    <table class="bkqmiennam" width="100%">
      <tbody>
        <tr>
          <td valign="top"><table width="100%"><tbody><tr><td valign="top" width="100%"><table class="bkqtinhmienbac table table-bordered">
	<tbody>
		<tr>
			<td class="thu" width="100">
				<a href="/ket-qua-xo-so/mien-bac/thu-bay.html" title="Click xem tất cả KQXS Miền Bắc Ngày: <?php echo $date; ?>"><?php echo Yii::t('date',$day); ?></a></td>
			<td class="ngay">
				<span class="tngay">Ngày: 
                    <a href="/ket-qua-xo-so/<?php echo date("d-m-Y",time()); ?>.html" title="Click xem KQXS 3 Miền Ngày: <?php echo $date; ?>">
                      <?php echo $date; ?>
                    </a>
                </span>
                <span class="phathanh">
                <?php $tinh = Tinh::model()->findByPk($itemnam->provice); ?>
                        <a href="/xo-so-mien-nam/tay-ninh.html" title="<?php echo $tinh->tinh; ?>">
                          <?php echo $tinh->tinh; ?>
                        </a></span></td>
		</tr>
		<tr>
			<td class="giaidbl">
				<a href=" /thong-tin/co-cau-giai-thuong-mien-bac.html">Giải ĐB</a></td>
			<td class="giaidb">
				<div><?php echo $itemnam->db; ?></div></td>
		</tr>
		<tr>
			<td class="giai1l">
				Giải nhất</td>
			<td class="giai1">
				<div><?php echo $itemnam->nhat; ?></div></td>
		</tr>
		<tr>
			<td class="giai2l">
				Giải nhì</td>
			<td class="giai2">
				<div><?php echo $itemnam->nhi1; ?></div><div><?php echo $itemnam->nhi2; ?></div></td>
		</tr>
		<tr>
			<td class="giai3l">
				Giải ba</td>
			<td class="giai3">
				<div><?php echo $itemnam->ba1; ?></div><div><?php echo $itemnam->ba2; ?></div><div><?php echo $itemnam->ba3; ?></div><div><?php echo $itemnam->ba4; ?></div><div><?php echo $itemnam->ba5; ?></div><div><?php echo $itemnam->ba6; ?></div></td>
		</tr>
		<tr>
			<td class="giai4l">
				Giải tư</td>
			<td class="giai4">
				<div><?php echo $itemnam->tu1; ?></div><div><?php echo $itemnam->tu2; ?></div><div><?php echo $itemnam->tu3; ?></div><div><?php echo $itemnam->tu4; ?></div></td>
		</tr>
		<tr>
			<td class="giai5l">
				Giải năm</td>
			<td class="giai5">
				<div><?php echo $itemnam->nam1; ?></div><div><?php echo $itemnam->nam2; ?></div><div><?php echo $itemnam->nam3; ?></div><div><?php echo $itemnam->nam4; ?></div><div><?php echo $itemnam->nam5; ?></div><div><?php echo $itemnam->nam6; ?></div></td>
		</tr>
		<tr>
			<td class="giai6l">
				Giải sáu</td>
			<td class="giai6">
				<div><?php echo $itemnam->sau1; ?></div><div><?php echo $itemnam->sau2; ?></div><div><?php echo $itemnam->sau3; ?></div></td>
		</tr>
		<tr>
			<td class="giai7l">
				Giải bảy</td>
			<td class="giai7">
				<div><?php echo $itemnam->bay1; ?></div><div><?php echo $itemnam->bay2; ?></div><div><?php echo $itemnam->bay3; ?></div><div><?php echo $itemnam->bay4; ?></div></td>
		</tr>
	</tbody>
</table></td></tr></tbody></table>
		
		</td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid #fcb3b3;padding-top: 5px;" colspan="2" height="30" align="center" bgcolor="#ffeeee">
                <a href="#">Xem bảng thống kê 2 số cuối</a>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <span class="glyphicon glyphicon-refresh"></span> Đổi số trúng &nbsp; 
                <span class="glyphicon glyphicon-eye-open"></span> In hình vé số &nbsp; 
                <span class="glyphicon glyphicon-bullhorn"></span> Chia sẻ &nbsp; 
                <span class="glyphicon glyphicon-print"></span> In vé dò
            </td>
        </tr>
        
      </tbody>
    </table>
    <?php } ?>
    
    </div>
</div>