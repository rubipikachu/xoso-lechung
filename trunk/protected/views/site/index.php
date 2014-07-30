<?php
$this->pageTitle = "Xổ số Lê Chung™ Trực Tiếp Kết Quả Xổ Số NHANH NHẤT";
$this->renderPartial("_left",array(
                                        "nam"=>$nam,
                                        "trung"=>$trung,
                                        "bac"=>$bac,
                                        "mien"=>$mien,
                                        "tinhbac"=>$tinhbac,
                                        "tinhtrung"=>$tinhtrung,
                                        "tinhnam"=>$tinhnam
                                    ));
$this->renderPartial("_left1",array(
                                        "nam"=>$nam,
                                        "trung"=>$trung,
                                        "bac"=>$bac,
                                        "mien"=>$mien,
                                        "tinhbac"=>$tinhbac,
                                        "tinhtrung"=>$tinhtrung,
                                        "tinhnam"=>$tinhnam
                                    ));
$this->renderPartial("_right");
$day = date("l",time());
$date = date("d-m-Y",time());
if(date("H",time())<=16 && date("i",time()) <=12){
   $day = date("l",time() - 86400);
   $date = date("d-m-Y",time() - 86400);
}
?>
<button type="button" class="btn btn-nam">Xổ Số Miền Nam</button>
<button type="button" class="btn btn-bac">Xổ Số Miền Bắc</button>
<button type="button" class="btn btn-trung">Xổ Số Miền Trung</button>
<div class="clearfix"></div>
<br />
<table class="table table-bordered black" style="font-size: 10px;">
  <tbody>
    <tr>
      <td>
        <strong>
          Lịch Xổ Số <?php echo $date; ?>
        </strong>
      </td>
      <td colspan="2" align="center">
        <strong>
          Thống kê Tần suất xổ số
        </strong>
      </td>
      <td align="center">
        <strong>
          Gan cực đại
        </strong>
      </td>
      <td align="center">
        <strong>
          Thống kê Loto
        </strong>
      </td>
    </tr>
    <?php foreach($mien as $key=>$mienitem){ ?>
    <?php if($key=="tinhnam"){ ?>
    <tr class="nam">
      <td>
        <a class="hottoday_mien" href="/xo-so-mien-nam.html" title="Xổ Số Miền Nam">
          <strong>
            Xổ Số Miền Nam
          </strong>
        </a>
      </td>
      <td class="norightborder">
        <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=1" title="Thống kê tần suất xuất hiện của Xổ số Miền Nam">
          Tần suất Miền Nam
        </a>
      </td>
      <td>
        <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=1" title="Thống kê tần suất chi tiết xổ số Miền Nam" target="_blank">
          Chi tiết!..
        </a>
      </td>
      <td>
        <a href="/thong-ke-xo-so-theo-mien/kiem-tra-gan-cuc-dai.html?mien=1" title="Thống kê Gan Cực Đại của Xổ số Miền Nam">
          GCĐ Miền Nam
        </a>
      </td>
      <td>
        <a href="/thong-ke-xo-so/lo-to-mien.html?mien=1" title="Thống Kê lô các cặp số của Xổ số Miền Nam">
          Xem Loto Miền Nam
        </a>
      </td>
    </tr>
    <?php } else if($key=="tinhbac"){ ?>
    <tr class="bac">
          <td>
            <a class="hottoday_mien" href="/xo-so-mien-bac.html" title="Xổ Số Miền Bắc">
              <strong>
                Xổ Số Miền Bắc
              </strong>
            </a>
          </td>
          <td class="norightborder">
            <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=2" title="Thống kê tần suất xuất hiện của Xổ Số Miền Bắc">
              Tần suất Miền Bắc
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=2" title="Thống kê tần suất chi tiết Xổ Số Miền Bắc" target="_blank">
              Chi tiết!..
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so-theo-mien/kiem-tra-gan-cuc-dai.html?mien=2" title="Thống kê Gan cực đại của Xổ Số Miền Bắc">
              GCĐ Miiền Bắc
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so/lo-to-mien.html?mien=2" title="Thống Kê lô các cặp số của Xổ số Miền Bắc">
              Xem Loto Miền Bắc
            </a>
          </td>
        </tr>
        <?php }else if($key=="tinhtrung"){ ?>
        <tr class="trung">
          <td>
            <a class="hottoday_mien" href="/xo-so-mien-trung.html" title="Xổ Số Miền Trung">
              <strong>
                Xổ Số Miền Trung
              </strong>
            </a>
          </td>
          <td class="norightborder">
            <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=3" title="Thống kê tần suất xuất hiện của Xổ Số Miền Trung">
              Tần suất Miền Trung
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=3" title="Thống kê tần suất chi tiết của Xổ Số Miền Trung" target="_blank">
              Chi tiết!..
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so-theo-mien/kiem-tra-gan-cuc-dai.html?mien=3" title="Thống kê Gan cực đại của xổ số Miền Trung">
              GCĐ Miền Trung
            </a>
          </td>
          <td>
            <a href="/thong-ke-xo-so/lo-to-mien.html?mien=3" title="Thống Kê lô các cặp số của Xổ số Miền Trung">
              Xem Loto Miền Trung
            </a>
          </td>
        </tr>
    <?php } ?>
    <!-----mien nam---->
    
    <?php foreach($$key as $itemnam){  ?>
    <?php $tinh = Tinh::model()->findByPk($itemnam); ?>
    <tr>
      <td>
        
        <a class="hottoday_tinh16" href="/xo-so-mien-nam/vinh-long.html" title="<?php echo $tinh->tinh; ?>">
          <?php echo $tinh->tinh; ?>
          <span class="tinh<?php echo $tinh->id; ?> pull-right">
          <?php if(date("H",time())<=16){ ?>
            <span style="color: #bf3e11;" class="glyphicon glyphicon-time"></span>
            <?php }else if(date("H",time())>=16 && date("H",time())<17){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16" />
            <?php }else if(date("H",time())>=17){ ?>
            <span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>
            <?php } ?>
          </span>
        </a>
      </td>
      <td class="norightborder">
        <a href="/thong-ke-xo-so/tan-suat-tinh.html?tinh=<?php echo $tinh->id; ?>&amp;lanquay=5&amp;tracuu=1" title="Thống kê tần suất xuất hiện các cặp số của <?php echo $tinh->tinh; ?>">
          Tần suất
          <?php echo str_replace("Xổ Số ","",$tinh->tinh); ?>          
          </a>
        </td>
        <td>
          <a href="/thong-ke-xo-so/tan-suat-chi-tiet-tinh.html?tinh=<?php echo $tinh->id; ?>" title="Thống kê tần suất chi tiết <?php echo $tinh->tinh; ?> " target="_blank">
            Chi tiết!..
          </a>
        </td>
        <td>
          <a href="/thong-ke-xo-so/gan-cuc-dai-tinh.html?tinh=<?php echo $tinh->id; ?>" title="Thống kê Gan Cực Đại của <?php echo $tinh->tinh; ?> ">
            GCĐ
            <?php echo str_replace("Xổ Số ","",$tinh->tinh); ?>          
          </a>
        </td>
        <td>
          <a href="/thong-ke-xo-so/lo-to-tinh.html?tinh=<?php echo $tinh->id; ?>" title="Thống Kê lô các cặp số của <?php echo $tinh->tinh; ?>">
            Xem Loto
            <?php echo str_replace("Xổ Số ","",$tinh->tinh); ?>          
          </a>
        </td>
        </tr>
        <?php }} ?>
        
  </tbody>
</table>

<h3>KẾT QUẢ XỔ SỐ KIẾN THIẾT <?php echo $date; ?></h3>

<div class="box_mienuutien">
  <form action="" method="get" name="mienuutien" id="mienuutien">
    <table align="center" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>
            Chọn miền ưu tiên:
          </td>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td>
                    <label class="nam">
                      <input type="radio" name="mut" value="mn" id="mut_0" onclick="mienuutien.submit();" checked="checked">
                      Miền Nam,
                    </label>
                  </td>
                  <td>
                    <label class="bac">
                      <input type="radio" name="mut" value="mb" id="mut_1" onclick="mienuutien.submit();">
                      Miền Bắc,
                    </label>
                  </td>
                  <td>
                    <label class="trung">
                      <input type="radio" name="mut" value="mt" id="mut_2" onclick="mienuutien.submit();">
                      Miền Trung
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

<div class="alert alert-danger" role="alert">

</div>

<div class="panel panel-danger kq">
  <div class="panel-heading">Kết Quả Xổ Số Miền Nam - <?php echo $date ?></div>
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
                  <?php echo $day; ?>
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
  