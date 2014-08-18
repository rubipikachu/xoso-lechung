<br />
<?php
        $day = date("l",time());
        $date = date("d-m-Y",time());
        
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $tinhnam = explode(",",$data->nam);
        $tinhtrung = explode(",",$data->trung);
        $tinhbac = explode(",",$data->bac);
        
        //nam
        $criterianam = new CDbCriteria();
        $criterianam->condition='date=:date';
        $criterianam->params=array(':date'=>$date);
        $criterianam->addInCondition("provice", $tinhnam);
        $resultnam = KqxsNam::model()->findAll($criterianam);
        
        //trung
        $criteriatrung = new CDbCriteria();
        $criteriatrung->condition='date=:date'; 
        $criteriatrung->params=array(':date'=>$date);
        $criteriatrung->addInCondition("provice", $tinhtrung);
        $resulttrung = KqxsTrung::model()->findAll($criteriatrung);
        
        //bac
        $criteriabac = new CDbCriteria();
        $criteriabac->condition='date=:date'; 
        $criteriabac->params=array(':date'=>$date);
        $criteriabac->addInCondition("provice", $tinhbac);
        $resultbac = KqxsBac::model()->findAll($criteriabac);
        
        $mien = array();
        $mien["tinhnam"]    = $resultnam;
        $mien["tinhtrung"]  = $resulttrung;
        $mien["tinhbac"]    = $resultbac;
?>
<table class="table table-bordered black" style="font-size: 12px;">
  <tbody>
    <tr>
      <td>
        <strong>
          Lịch Xố Sổ <?php echo $date; ?>
        </strong>
      </td>
      <td align="center">
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
        <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=1" title="Thống kê tần suất xuất hiện của xổ số Miền Nam">
          Tần suất Miền Nam
        </a>
      </td>
      <!--td>
        <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=1" title="Th?ng kê t?n su?t chi ti?t c?a x? s? Mi?n Nam" target="_blank">
          Chi tiết!..
        </a>
      </td-->
      <td>
        <a href="/thong-ke-xo-so-theo-mien/kiem-tra-gan-cuc-dai.html?mien=1" title="Thống kê Gan cực đại của xổ số Miền Nam">
          GCĐ Miền Nam
        </a>
      </td>
      <td>
        <a href="/thong-ke-xo-so/lo-to-mien.html?mien=1" title="Thống Kê lô các cặp số của xổ số Miền Nam">
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
            <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=2" title="Thống kê tần suất xuất hiện của xổ số Miền Bắc">
              Tần suất Miền Bắc
            </a>
          </td>
          <!--td>
            <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=2" title="Thống kê tần suất chi tiết của xổ số Miền Bắc" target="_blank">
              Chi tiết!..
            </a>
          </td-->
          <td>
            <a href="/thong-ke-xo-so-theo-mien/kiem-tra-gan-cuc-dai.html?mien=2" title="Thống kê Gan cực đại của sổ số Miền Bắc">
              GCĐ Miền Bắc
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
            <a href="/thong-ke-xo-so/tan-suat-mien.html?mien=3" title="Thống kê tần suất xuất hiện của xổ số Miền Trung">
              Tần suất Miền Trung
            </a>
          </td>
          <!--td>
            <a href="/thong-ke-xo-so/tan-suat-chi-tiet-mien.html?mien=3" title="Thống kê tần suất chi tiết của xổ số Miền Trung" target="_blank">
              Chi tiết!..
            </a>
          </td-->
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
        
        <a class="hottoday_tinh16" href="/xo-so-mien-nam/xo-so-kien-thiet.html?tinh=<?php echo $tinh->id; ?>" title="<?php echo $tinh->tinh; ?>">
          <?php echo $tinh->tinh; ?>
          <span class="tinh<?php echo $tinh->id; ?> pull-right">
          
            <img src="http://www.xoso.vn/img/clock.gif" width="16">
           
          </span>
        </a>
      </td>
      <td class="norightborder">
        <a href="/thong-ke-xo-so/tan-suat-tinh.html?tinh=<?php echo $tinh->id; ?>&amp;lanquay=5&amp;tracuu=1" title="Thống kê tần suất xuất hiện các cặp số của <?php echo $tinh->tinh; ?>">
          Tần suất
          <?php echo str_replace("Xổ Số ","",$tinh->tinh); ?>          
          </a>
        </td>
        <!--td>
          <a href="/thong-ke-xo-so/tan-suat-chi-tiet-tinh.html?tinh=<?php echo $tinh->id; ?>" title="Thống kê tần suất chi tiết <?php echo $tinh->tinh; ?> " target="_blank">
            Chi tiết!..
          </a>
        </td-->
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