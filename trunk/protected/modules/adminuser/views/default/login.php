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
      Login page
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style_responsive.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->homeUrl ?>admin/css/style_default.css" rel="stylesheet" id="style_color" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body id="login-body">
    <div class="login-header">
      <div id="logo" class="center">
        <img src="<?php echo Yii::app()->homeUrl ?>admin/img/logo.png" alt="TONY ADMIN" class="center" />
      </div>
    </div>
    <div id="login">
      <?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
    'action'=>$this->createUrl('default/login'),
    'htmlOptions'=>array(
        'class'=>'form-vertical no-padding no-margin',
        'id'=>'loginform'
    ),
	'clientOptions'=>array(
	    'validateOnSubmit'=>true,
	),
)); ?>
      <div class="lock">
        <i class="icon-lock">
        </i>
      </div>
      <div class="control-wrap">
        <h4>
          Admin Login
        </h4>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on">
                <i class="icon-user">
                </i>
              </span>
              <?php echo $form->textField($model,'username', array(
                                            'id'=>'input-username',
                                            'placeholder'=>Yii::t('site', 'Username')
                                        )); ?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on">
                <i class="icon-key">
                </i>
              </span>
              <?php echo $form->passwordField($model,'password', array(
                                            'id'=>'input-password',
                                            'placeholder'=>Yii::t('site', 'Password')
                                            ));?>
            </div>
            <div class="mtop10">
              <div class="block-hint pull-left small">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo Yii::t("site",'Remember me');?>
              </div>
              <div class="block-hint pull-right">
                <a href="javascript:;" class="" id="forget-password">
                  <?php echo Yii::t('site', 'Forgot Password?'); ?>
                </a>
              </div>
            </div>
            <div class="clearfix space5">
            </div>
          </div>
        </div>
      </div>
      <?php 
        echo CHtml::submitButton(Yii::t('site', 'Login'),array("class"=>"btn btn-block login-btn", "id"=>"login-btn"));
        ?>
    <?php $this->endWidget(); ?>
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html" />
    <p class="center">
      Enter your e-mail address below to reset your password.
    </p>
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on">
            <i class="icon-envelope">
            </i>
          </span>
          <input id="input-email" type="text" placeholder="Email" />
        </div>
      </div>
      <div class="space20">
      </div>
    </div>
    <input type="submit" class="btn btn-block login-btn" value="Submit" />
    <a href="#" class="btn btn-block login-btn" id="forget-btn">Cancel</a>
  </form>
</div>
<div id="login-copyright">
  2014 &copy; TONY ADMIN. 
</div>
<script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery-1.8.3.min.js">
</script>
<script src="<?php echo Yii::app()->homeUrl ?>admin/assets/bootstrap/js/bootstrap.min.js">
</script>
<script src="<?php echo Yii::app()->homeUrl ?>admin/js/jquery.blockui.js">
</script>
<script src="<?php echo Yii::app()->homeUrl ?>admin/js/scripts.js">
</script>
<script>
  jQuery(document).ready(function(){
    App.initLogin()}
                        );
</script>
</body>
</html>