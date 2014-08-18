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
$bac = explode(",",$data->bac);

//nam
$criterianam = new CDbCriteria();
$criterianam->condition='date=:date';
$criterianam->params=array(':date'=>$date);
$criterianam->addInCondition("provice", $trung);
$nam = KqxsTrung::model()->findAll($criterianam);
?>

<div class="panel panel-danger kq">
  <div class="panel-heading">Kết quả xổ số Miền Trung - <?php echo $date ?></div>
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