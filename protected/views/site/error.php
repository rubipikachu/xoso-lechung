<?php
    $this->PageTitle = "404 Not Found";
    $this->layout = 'main';
?>
<meta http-equiv="refresh" content="2;URL='<?php echo yii::app()->homeUrl; ?>'" />
<div class="error-page" style="background: white;">
	<div align="center" class="error-code">
        <img src="<?php echo yii::app()->homeUrl; ?>img/than-tai_BPJG.png" class="img-responsive" />
    </div>
	<div align="center" class='error-action'>
    Yêu cầu không tìm thấy!!!
    <br />
    <a href="<?php echo yii::app()->homeUrl; ?>" class="btn btn-info">Trở về trang chủ</a>
    </div><div class="clearfix" style="height: 30px;"></div>
</div>


