<?php
$this->renderPartial("_left");
$this->renderPartial("_left1");
$this->renderPartial("_right");?>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-truc-tiep/mien-nam.html" class="btn btn-nam">Xổ Số Miền Nam</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-truc-tiep/mien-bac.html" class="btn btn-bac">Xổ Số Miền Bắc</a>
<a href="<?php echo Yii::app()->homeUrl; ?>xo-so-truc-tiep/mien-trung.html" class="btn btn-trung">Xổ Số Miền Trung</a>
<div class="clearfix"></div>
<?php $this->renderPartial("_tablemien"); ?>
<br />
<h3 align="center">TRỰC TIẾP XỔ SỐ MIỀN TRUNG <?php echo date("d-m-Y",time()) ?></h3>
<div align="center"><img src="<?php echo Yii::app()->homeUrl ?>img/xshome.gif" /></div>
<div class="tructieptrung" style="color: #C60D3C;" align="center"></div>

<div class="panel panel-danger kq1" style="display: none;">
  <div class="panel-heading">Kết quả xổ số Miền Trung - <?php echo date("d-m-Y",time()) ?></div>
  <div class="panel-body">
    
    <table class="table table-bordered" style="padding: 0;">
  <tbody>
    <tr>
      <td width="100" valign="top" style="padding: 0;">
        <table class="table">
          <tbody>
            <tr>
              <td class="thu" align="center">
                
                <a href="/ket-qua-xo-so/mien-nam/<?php echo date("d-m-Y",time()) ?>.html" title="Click xem tất cả KQXS Miền Nam ngày <?php echo date("d-m-Y",time()) ?>">
                  Chủ nhật                </a>
              </td>
            </tr>
            <tr>
              <td class="ngay" align="center">
                
                <a href="/ket-qua-xo-so/<?php echo date("d-m-Y",time()) ?>.html" title="Click xem KQXS 3 Miền Ngày: <?php echo date("d-m-Y",time()) ?>">
                  <?php echo date("d-m-Y",time()) ?>               </a>
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
      <td valign="top" style="padding: 0;">
        
        <table class="table table-bordered" style="padding: 0;border-left: 0 !important; border-top: 0 !important;">
          <tbody>
            <tr>
                          
               <?php foreach($nam as $itemnam){  $t=CommonHelper::maprev($itemnam->provice);  ?>
              <td valign="top" style="padding: 0;" width="<?php echo 100/count($nam); ?>%">
                <table class="table tony" cellpadding="0" cellspacing="0">
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
                        <div id="T<?php echo $t ?>_G8">
                          <?php echo ($itemnam->tam!="")?$itemnam->tam:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai7">
                        <div id="T<?php echo $t ?>_G7">
                          <?php echo ($itemnam->bay!="")?$itemnam->bay:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai6">
                        <div id="T<?php echo $t ?>_G6_1">
                          <?php echo ($itemnam->sau1!="")?$itemnam->sau1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G6_2">
                          <?php echo ($itemnam->sau2!="")?$itemnam->sau2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G6_3">
                          <?php echo ($itemnam->sau3!="")?$itemnam->sau3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai5">
                        <div id="T<?php echo $t ?>_G5">
                          <?php echo ($itemnam->nam!="")?$itemnam->nam:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai4">
                        <div id="T<?php echo $t ?>_G4_1">
                          <?php echo ($itemnam->tu1!="")?$itemnam->tu1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_2">
                          <?php echo ($itemnam->tu2!="")?$itemnam->tu2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_3">
                          <?php echo ($itemnam->tu3!="")?$itemnam->tu3:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_4">
                          <?php echo ($itemnam->tu4!="")?$itemnam->tu4:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_5">
                          <?php echo ($itemnam->tu5!="")?$itemnam->tu5:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_6">
                          <?php echo ($itemnam->tu6!="")?$itemnam->tu6:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G4_7">
                          <?php echo ($itemnam->tu7!="")?$itemnam->tu7:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai3">
                        <div id="T<?php echo $t ?>_G3_1">
                          <?php echo ($itemnam->ba1!="")?$itemnam->ba1:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                        <div id="T<?php echo $t ?>_G3_2">
                          <?php echo ($itemnam->ba2!="")?$itemnam->ba2:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai2">
                        <div id="T<?php echo $t ?>_G2">
                          <?php echo ($itemnam->nhi!="")?$itemnam->nhi:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giai1">
                        <div id="T<?php echo $t ?>_G1">
                          <?php echo ($itemnam->nhat!="")?$itemnam->nhat:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="giaidb">
                        <div id="T<?php echo $t ?>_Gdb">
                          <?php echo ($itemnam->db!="")?$itemnam->db:'<img src="'.Yii::app()->homeUrl.'img/loading.gif" width="12">'; ?>
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
