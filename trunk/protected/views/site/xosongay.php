<?php
$this->pageTitle = "Xổ số Lê Chung™ Trực Tiếp Kết Quả Xổ Số NHANH NHẤT";
$this->renderPartial("_left");
$this->renderPartial("_left1");
$this->renderPartial("_right");
$day = date("l",$time);
$date = date("d-m-Y",$time);
?>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-nam.html" class="btn btn-nam">Xổ Số Miền Nam</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-bac.html" class="btn btn-bac">Xổ Số Miền Bắc</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-mien-trung.html" class="btn btn-trung">Xổ Số Miền Trung</a>
<div class="clearfix"></div>

<h3>KẾT QUẢ XỔ SỐ KIẾN THIẾT <?php echo $date; ?></h3>

<?php for($jk=0;$jk<2;$jk++){ 
if($jk==0){ $nam= $nam; $title = "Nam";}
if($jk==1){ $nam= $trung; $title = "Trung";}
?>
<div class="panel panel-danger kq font13">
  <div class="panel-heading">Kết Quả Xổ Số Miền <?php echo $title; ?> - <?php echo $date ?></div>
  <div class="panel-body">
    
    <table class="table table-bordered"  style="padding: 0;">
  <tbody>
    <tr>
      <td width="100" valign="top">
        <table class="table">
          <tbody>
            <tr>
              <td class="thu" align="center">
                
                <a href="/ket-qua-xo-so/mien-nam/<?php echo $date; ?>.html" title="Click xem tất cả KQXS Miền Nam ngày <?php echo $date; ?>">
                  <?php echo Yii::t('date',$day); ?>
                </a>
              </td>
            </tr>
            <tr>
              <td class="ngay" align="center">
                
                <a href="/ket-qua-xo-so/<?php echo date("d-m-Y",time()); ?>.html" title="Click xem KQXS 3 Miền Ngày: <?php echo $date; ?>">
                  <?php echo $date; ?>
                </a>
              </td>
            </tr>
            <tr>
              <td class="giai8">
                Giải tám
              </td>
            </tr>
            <tr>
              <td class="giai7">
                Giải bảy
              </td>
            </tr>
            <tr>
              <td class="giai6">
                Giải sáu
              </td>
            </tr>
            <tr>
              <td class="giai5">
                Giải năm
              </td>
            </tr>
            <tr>
              <td class="giai4">
                Giải tư
              </td>
            </tr>
            <tr>
              <td class="giai3">
                Giải ba
              </td>
            </tr>
            <tr>
              <td class="giai2">
                Giải nhì
              </td>
            </tr>
            <tr>
              <td class="giai1">
                Giải nhất
              </td>
            </tr>
            <tr>
              <td class="giaidb">
                <a href="/thong-tin/co-cau-giai-thuong-mien-nam.html">
                  Giải Đặc Biệt
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
      <td valign="top">
        
        <table class="table table-bordered" style="padding: 0;border-left: 0 !important; border-top: 0 !important;">
          <tbody>
            <tr>
            <?php foreach($nam as $itemnam){  ?>
              <td valign="top" width="<?php echo 100/count($nam); ?>%">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="tinh" align="center">
                        <?php $tinh = Tinh::model()->findByPk($itemnam->provice); ?>
                        <a href="/xo-so-mien-nam/tay-ninh.html" title="<?php echo $tinh->tinh; ?>">
                          <?php echo str_replace("Xổ Số ","",$tinh->tinh); ?>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="matinh" align="center">
                        --
                      </td>
                    </tr>
                    <tr>
                      <td class="giai8" align="center">
                        <div>
                          <?php echo $itemnam->tam; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai7">
                        <div>
                          <?php echo $itemnam->bay; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai6">
                        <div>
                          <?php echo $itemnam->sau1; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->sau2; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->sau3; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai5">
                        <div>
                          <?php echo $itemnam->nam; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai4">
                        <div>
                          <?php echo $itemnam->tu1; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu2; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu3; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu3; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu5; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu6; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->tu7; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai3">
                        <div>
                          <?php echo $itemnam->ba1; ?>
                        </div>
                        <div>
                          <?php echo $itemnam->ba2; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai2">
                        <div>
                          <?php echo $itemnam->nhi; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai1">
                        <div>
                          <?php echo $itemnam->nhat; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giaidb">
                        <div>
                          <?php echo $itemnam->db; ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <?php } ?>
              
            </tr>
          </tbody>
        </table>
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
    
  </div>
</div>

<?php } ?>
<?php if(count($bac)>0){ ?>
<div class="panel panel-danger font13">
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
				<a href="/ket-qua-xo-so/mien-bac/<?php echo $date; ?>.html" title="Click xem tất cả KQXS Miền Bắc ngày <?php echo $date; ?>">
                  <?php echo Yii::t('date',$day); ?>
                </a>
                </td>
			<td class="ngay">
				<span class="tngay">Ngày: 
                    <a href="/ket-qua-xo-so/<?php echo date("d-m-Y",time()); ?>.html" title="Click xem KQXS 3 Mi?n Ngày: <?php echo $date; ?>">
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
<?php } ?>

<div class="panel panel-xs">
  <div class="panel-heading">Xổ số điện toán ngày <?php echo $date ?></div>
  <div class="panel-body">
        <div class="bkq123">
	<div class="title">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td class="title">
						<a href="
	/xo-so-dien-toan/1*2*3/<?php echo $date ?>.html
	">Kết quả xổ số điện toán 1*2*3</a></td>
					<td align="right" class="mothuong">
						Mở thưởng Thứ năm ngày &nbsp;<?php echo $date ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="content">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left">
						<table align="left" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td align="center" valign="middle">
										<div class="finnish3 bool">3</div></td>
									<td width="40">
										&nbsp;</td>
									<td align="center" valign="middle">
										<div class="finnish9 bool">9</div><div class="finnish5 bool">5</div></td>
									<td width="40">
										&nbsp;</td>
									<td align="center" valign="middle">
										<div class="finnish5 bool">5</div><div class="finnish9 bool">9</div><div class="finnish6 bool">6</div></td>
								</tr>
							</tbody>
						</table>
					</td>
					<td align="right" width="120">
						<div class="button">
							<a class="buttonBlue pngfix" href="
	/xo-so-dien-toan/1*2*3/17-07-2014.html
	" target="_blank">Xem thêm!...</a></div>
					</td>
				</tr>
			</tbody>
		</table>
    	</div>
    </div>
    
    <div class="bkqtt4">
	<div class="title">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left" class="title">
						<a href="
	/xo-so-dien-toan/than-tai-4/17-07-2014.html
	">Kết quả xổ số Thần Tài 4</a></td>
					<td align="right" class="mothuong">
						Mở thưởng Thứ năm&nbsp;ngày <?php echo $date; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="content">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left">
						<div>
							<div class="finnish7 bool">7</div><div class="finnish0 bool">0</div><div class="finnish7 bool">7</div><div class="finnish9 bool">9</div></div>
					</td>
					<td align="right">
						<div class="button">
							<a class="buttonBlue pngfix" href="
	/xo-so-dien-toan/than-tai-4/17-07-2014.html
	" target="_blank">Xem thêm!...</a></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
    
    
  </div>
</div>
  