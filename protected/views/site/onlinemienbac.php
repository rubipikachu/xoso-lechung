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
<h3 align="center">TRỰC TIẾP XỔ SỐ MIỀN BẮC <?php echo date("d-m-Y",time()) ?></h3>
<div align="center"><img src="<?php echo Yii::app()->homeUrl ?>img/xshome.gif" /></div>
<div class="tructiepbac" style="color: #C60D3C;" align="center">Xổ số sẽ bắt đầu lúc 18h05p</div>

<div class="panel panel-danger kq2" style="display: none;">
    <div class="panel-heading">Kết quả xổ số Miền Bắc - <?php echo $date ?></div>
    <div class="panel-body">
    
    <?php foreach($bac as $itemnam){ $t=CommonHelper::maprev($itemnam->provice);   ?>
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
				<div id="T<?php echo $t ?>_Gdb">
                <?php echo ($itemnam->db!="")?$itemnam->db:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                </div></td>
		</tr>
		<tr>
			<td class="giai1l">
				Giải nhất</td>
			<td class="giai1">
				<div id="T<?php echo $t ?>_G1"><?php echo ($itemnam->nhat!="")?$itemnam->nhat:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai2l">
				Giải nhì</td>
			<td class="giai2">
				<div id="T<?php echo $t ?>_G2_1"><?php echo ($itemnam->nhi1!="")?$itemnam->nhi1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G2_2"><?php echo ($itemnam->nhi2!="")?$itemnam->nhi2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai3l">
				Giải ba</td>
			<td class="giai3">
				<div id="T<?php echo $t ?>_G3_1"><?php echo ($itemnam->ba1!="")?$itemnam->ba1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G3_2"><?php echo ($itemnam->ba2!="")?$itemnam->ba2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G3_3"><?php echo ($itemnam->ba3!="")?$itemnam->ba3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G3_4"><?php echo ($itemnam->ba4!="")?$itemnam->ba4:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G3_5"><?php echo ($itemnam->ba5!="")?$itemnam->ba5:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G3_6"><?php echo ($itemnam->ba6!="")?$itemnam->ba6:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai4l">
				Giải tư</td>
			<td class="giai4">
				<div id="T<?php echo $t ?>_G4_1"><?php echo ($itemnam->tu1!="")?$itemnam->tu1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G4_2"><?php echo ($itemnam->tu2!="")?$itemnam->tu2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G4_3"><?php echo ($itemnam->tu3!="")?$itemnam->tu3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G4_4"><?php echo ($itemnam->tu3!="")?$itemnam->tu4:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai5l">
				Giải năm</td>
			<td class="giai5">
				<div id="T<?php echo $t ?>_G5_1"><?php echo ($itemnam->nam1!="")?$itemnam->nam1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G5_2"><?php echo ($itemnam->nam2!="")?$itemnam->nam2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G5_3"><?php echo ($itemnam->nam3!="")?$itemnam->nam3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G5_4"><?php echo ($itemnam->nam4!="")?$itemnam->nam4:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G5_5"><?php echo ($itemnam->nam5!="")?$itemnam->nam5:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G5_6"><?php echo ($itemnam->nam6!="")?$itemnam->nam6:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai6l">
				Giải sáu</td>
			<td class="giai6">
				<div id="T<?php echo $t ?>_G6_1"><?php echo ($itemnam->sau1!="")?$itemnam->sau1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G6_2"><?php echo ($itemnam->sau2!="")?$itemnam->sau2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G6_3"><?php echo ($itemnam->sau3!="")?$itemnam->sau3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
		</tr>
		<tr>
			<td class="giai7l">
				Giải bảy</td>
			<td class="giai7">
				<div id="T<?php echo $t ?>_G7_1"><?php echo ($itemnam->bay1!="")?$itemnam->bay1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G7_2"><?php echo ($itemnam->bay2!="")?$itemnam->bay2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G7_3"><?php echo ($itemnam->bay3!="")?$itemnam->bay3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div>
                <div id="T<?php echo $t ?>_G7_4"><?php echo ($itemnam->bay4!="")?$itemnam->bay4:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?></div></td>
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