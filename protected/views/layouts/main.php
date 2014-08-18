<?php
header("X-Frame-Options: DENY");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="keywords" content="xo so, ket qua xo so, kqxs, truc tiep, lechung" />
        <meta name="description" content="Xổ Số Lê Chung™: Trực tiếp kết quả xổ số kiến thiết 3 miền, xem tường thuật từng giải kqxs trực tuyến, in vé dò - Nhanh nhất - Hồi hộp - Nghẹt thở, thống kê, dự đoán, Lottery Online, le chung" />
        <meta name="robots" content="index,follow,noodp" />
        <meta property="og:site_name" content="Xổ Số Lê Chung™" />
        <meta property="og:type" content="website" />
        <meta http-equiv="content-language" content ="vn" />
        <meta name=”geo.placename” content=”Vietnam” />
        <meta name="copyright" content="Copyright © 2014 by Xổ Số Lê Chung™"  />
        <meta name="abstract" content="Hệ thống Website trực tiếp số 1 Việt Nam - Chia sẻ khoảnh khắc xổ số" />
        <meta name="distribution" content="Global" />
        <meta name="author" content="Lê Chung" />
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
        <link href="<?php echo Yii::app()->homeUrl; ?>img/logo.png" rel="shortcut icon" type="image/x-icon" />

        <link href="<?php echo Yii::app()->homeUrl; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->homeUrl; ?>css/template.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->homeUrl; ?>css/styles.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="homepage">
        <?php $this->renderPartial('//layouts/header'); ?>
        <div class="maincontent container">
        <?php $this->renderPartial('//layouts/menu'); ?>
        <?php echo $content; ?>
        <input type="hidden" name="token" id="token" value="<?php echo $this->getToken(); ?>" />
        </div>
        <?php $this->renderPartial('//layouts/footer'); ?>
        <script src="<?php echo Yii::app()->homeUrl; ?>js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl; ?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->homeUrl ?>js/jquery.datepick.js"></script>
        <script>
			$(".ngaydove").datepick({dateFormat: 'dd-mm-yyyy', maxDate: +0,onSelect: function() {}});
        </script>
        <script src="<?php echo Yii::app()->homeUrl; ?>js/jquery.lechung.js"></script>
        <?php if(Yii::app()->controller->action->id=='onlinebac' || Yii::app()->controller->action->id=='onlinetrung' || Yii::app()->controller->action->id=='onlinenam'){ ?>
        <script language="javascript" src="<?php echo Yii::app()->homeUrl.'js/jquery.online.js'; ?>"></script>
        <?php } ?>
    </body>
</html>