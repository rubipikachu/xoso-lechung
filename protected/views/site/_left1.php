<?php $this->beginClip('left1'); ?>
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
$nam = KqxsNam::model()->findAll($criterianam);

//trung
$criteriatrung = new CDbCriteria();
$criteriatrung->condition='date=:date'; 
$criteriatrung->params=array(':date'=>$date);
$criteriatrung->addInCondition("provice", $tinhtrung);
$trung = KqxsTrung::model()->findAll($criteriatrung);

//bac
$criteriabac = new CDbCriteria();
$criteriabac->condition='date=:date'; 
$criteriabac->params=array(':date'=>$date);
$criteriabac->addInCondition("provice", $tinhbac);
$bac = KqxsBac::model()->findAll($criteriabac);

$mien = array();
$mien["tinhnam"]    = $nam;
$mien["tinhtrung"]  = $trung;
$mien["tinhbac"]    = $bac;
?>
<!-- Box Tường thuật trực tiếp -->
<div class="panel panel-danger">
  <div class="panel-heading">Tường thuật trực tiếp</div>
  <div class="panel-body">
    
    <table class="col-xs-12" style="font-size: 12px;">
        <tbody>
        <tr>
            <td align="left"><a style="color: #57b856; font-weight: bold;" href="<?php echo Yii::app()->homeUrl ?>xo-so-truc-tiep/mien-nam.html">Xổ Số Miền Nam</a></td>
            <td align="right" class="statusnam">
            <?php if(date("H",time())<16){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16">
            <?php }else if(date("H",time())==16){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16" />
            <?php }else if(date("H",time())>=17){ ?>
            <span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="left"><a style="color: #00bff3; font-weight: bold;" href="<?php echo Yii::app()->homeUrl ?>xo-so-truc-tiep/mien-bac.html">Xổ Số Miền Bắc</a></td>
            <td align="right" class="statusbac">
            <?php if(date("H",time())<=17){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16">
            <?php }else if(date("H",time())==18 && date("i",time())<05){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16" />
            <?php }else if(date("H",time())==18 && date("i",time())>=05 && date("i",time())<15){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16" />
            <?php }else if((date("H",time())==18 && date("i",time())>=15) || date("H",time())>18){ ?>
            <span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="left"><a style="color: #f1ad43; font-weight: bold;" href="<?php echo Yii::app()->homeUrl ?>xo-so-truc-tiep/mien-trung.html">Xổ Số Miền Trung</a></td>
            <td align="right" class="statustrung">
            <?php if(date("H",time())<=16){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16">
            <?php }else if(date("H",time())==17 && date("i",time())<20){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16" />
            <?php }else if(date("H",time())==17 && date("i",time())>=20 && date("i",time())<40){ ?>
            <img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16" />
            <?php }else if((date("H",time())==17 && date("i",time())>=40) || date("H",time())>17){ ?>
            <span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>
            <?php } ?>
            </td>
        </tr>
    </tbody></table>
    <table class="table" style="font-size: 10px;">
        <tbody><tr>
            <td><img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16"> Chờ</td>
            <td><img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16"> Đang xổ</td>
            <td><span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span> Mới</td>
        </tr>
        <tr>
            <td colspan="3" align="center" style="font-size: 12px;"><a href="#">Chèn KQXS vào website</a></td>
        </tr>
    </tbody></table>
    
  </div>
</div>
<!-- End box Tường thuật trực tiếp -->


<!-- Begin button đổi số trúng -->
<div class="panel panel-danger"><div class="panel-body" style="padding: 0;">
<a href="#" class="btn btn-danger btn-lg col-xs-12"><span class="glyphicon glyphicon-refresh"></span> Đổi số trúng</a>
</div></div>
<!-- End button đổi số trúng -->
<!-- Begin chon tinh -->
<div class="panel panel-danger">
<div class="panel-heading">Kết quả xổ số theo tỉnh</div>
<div class="panel-body">
<select class="form-control" name="tinh" onchange="if(this.value!='') window.location='/ket-qua-xo-so/tinh.html?id='+this.value">
    <option value="">Chọn tỉnh muốn xem kqxs</option>
    <?php $tinh = Tinh::model()->findAll();
    foreach($tinh as $tinhitem){ ?>
    <option value="<?php echo $tinhitem->id ?>"><?php echo $tinhitem->tinh; ?></option>
    <?php } ?>
</select>
</div></div>
<!-- End chon tinh -->
<?php $this->renderPartial("//site/_calendar1"); ?>

<!-- Box Kết quả xổ số hôm nay -->
<div class="panel panel-xs">
  <div class="panel-heading">Kết quả xổ số hôm nay</div>
  <div class="panel-body">
   
    <table class="col-xs-12" style="font-size: 12px;">
        <tbody>
        <?php foreach($mien as $key=>$mienitem){ ?>
        <?php if($key=="tinhnam"){ ?>
        <tr>
            <td align="left" width="90%" colspan="2"><img src="<?php echo Yii::app()->homeUrl ?>css/drop-dow.gif" width="15" /> <span style="color: #57b856; font-weight: bold;">Xổ số Miền Nam</span></td>
        </tr>
        <?php } else if($key=="tinhbac"){ ?>
        <tr>
            <td align="left" width="90%" colspan="2"><img src="<?php echo Yii::app()->homeUrl ?>css/drop-dow.gif" width="15" /> <span style="color: #00bff3; font-weight: bold;">Xổ số Miền Bắc</span></td>
        </tr>
        <?php }else if($key=="tinhtrung"){ ?>
        <tr>
            <td align="left" width="90%" colspan="2"><img src="<?php echo Yii::app()->homeUrl ?>css/drop-dow.gif" width="15" /> <span style="color: #f1ad43; font-weight: bold;">Xổ số Miền Trung</span></td>
        </tr>
       <?php } ?>
        <tr>
            <td align="left">&nbsp;</td>
            <td>
                <table width="100%">
                    <?php foreach($$key as $itemnam){  ?>
                    <?php $tinh = Tinh::model()->findByPk($itemnam); ?>
                    <tr>
                        <td align="left"><img src="<?php echo Yii::app()->homeUrl ?>img/arrow_1.gif" /> Kết quả <?php echo $tinh->tinh; ?> </td>
                        <td align="right" class="tinh<?php echo $itemnam; ?>">
                            <?php if(date("H",time())<=16 && date("i",time()) <= 10){ ?>
                            <img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16">
                            <?php }else if(date("H",time())>=16 && date("H",time())<17){ ?>
                            <img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16" />
                            <?php }else if(date("H",time())>=17){ ?>
                            <span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
         <?php } ?>
        <!--tr>
            <td align="left" width="100%" colspan="2"><img src="http://www.xoso.vn/css/drop-dow.gif" width="15"> <span style="color: #ff0000; font-weight: bold;">Kết quả điện toán</span>
                <div class="pull-right"><img src="http://www.xoso.vn/img/loading.gif" width="16"></div>
            </td>
        </tr-->
    </tbody></table>
    <table class="table" style="font-size: 10px;">
        <tbody><tr>
            <td><img src="<?php echo Yii::app()->homeUrl ?>img/clock.gif" width="16"> Chờ</td>
            <td><img src="<?php echo Yii::app()->homeUrl ?>img/loading.gif" width="16"> Đang xổ</td>
            <td><span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span> Mới</td>
        </tr>
    </tbody></table>
    
  </div>
</div>
<!-- End box kết quả xổ số hôm nay -->

<!-- Box tra cứu kết quả xổ số -->
<div class="panel panel-xs">
  <div class="panel-heading">Tra cứu kết quả xổ số</div>
  <div class="panel-body">
    <?php $this->renderPartial('//site/_tra_cuu_kqxs'); ?>
  </div>
</div>
<!-- End box tra cứu kết quả xổ số -->

<?php $this->endClip(); ?>