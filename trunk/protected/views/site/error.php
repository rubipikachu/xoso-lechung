<?php
    $this->PageTitle = $error['code'];
    $this->layout = 'main';
?>
<div class="error-page">
	<div class="error-code">
        <?php echo $error['code'] ?>
    </div>
	<div class='error-action'>
    <a href="<?php echo yii::app()->homeUrl; ?>" class="btn btn-info">Trở về trang chủ</a>
    </div>
</div>


