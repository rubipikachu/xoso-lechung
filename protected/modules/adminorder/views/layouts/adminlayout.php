<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8">
</html>
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9">
</html>
<![endif]-->
<!--[if !IE]>
<!-->
<html lang="en">
  <!--
<![endif]-->
  <head>
    <meta charset="utf-8" />
    <title>
      Admin Control Panel
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style_responsive.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style_default.css" rel="stylesheet" id="style_color" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->homeUrl ?>admin/assets/uniform/css/uniform.default.css" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body class="fixed-top">
    
        <?php $this->renderPartial('//layouts/admin_header'); ?>
        <div id="container" class="row-fluid">
            <?php $this->renderPartial('//layouts/admin_slidebar'); ?>
            <div id="main-content">
                <div class="container-fluid">
                    <?php $this->renderPartial('//layouts/admin_breadcrumb'); ?>
                    <div id="page" class="dashboard">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->renderPartial('//layouts/admin_footer'); ?>
    
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery.blockui.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery.cookie.js"></script>
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/excanvas.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/respond.js"></script>
        <![endif]-->
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/jquery-knob/js/jquery.knob.js"></script>
        <!--script src="<?php echo Yii::app()->homeUrl ?>admin/assets/flot/jquery.flot.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/assets/flot/jquery.flot.crosshair.js"></script-->
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->homeUrl ?>admin/assets/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo Yii::app()->homeUrl ?>admin/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function(){
                App.setMainPage(true);
                App.init()}
            );
        </script>
        
    </body>
</html>