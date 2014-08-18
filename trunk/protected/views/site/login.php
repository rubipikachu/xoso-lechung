<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
    'action'=>$this->createUrl('site/login'),
	//'enableClientValidation'=>true,
    'htmlOptions'=>array(
        'class'=>'form-stacked'
    ),
	'clientOptions'=>array(
	    'validateOnSubmit'=>true,
	),
)); ?>
    <div class="title margin-sub" style="margin-left: 0px;"><h3><?php echo Yii::t('fshare', 'Login') ?></h3>
        <div class='pull-right' style="margin-bottom: 8px;">
        <span><?php echo Yii::t('fshare', 'or signin by') ?>&nbsp;&nbsp;</span>
            <?php $this->widget('ext.eauth.EAuthWidget', array('action' => 'site/login')); ?>
        </div>
    </div>
    <div class="form-group" style="">
        <div class="controls">
            <?php echo $form->textField($model,'login', array(
                                            'class'=>'form-control clearboth',
                                            'placeholder'=>Yii::t('fshare', 'Email ')
                                        )); ?>
        </div>
		<?php echo $form->error($model,'login'); ?>
    </div>

    <div class="form-group">
        <div class="controls">
            <?php echo $form->passwordField($model,'password', array(
                                            'class'=>'form-control clearboth',
                                            'placeholder'=>Yii::t('fshare', 'Password')
                                            ));?>
        </div>
		<?php echo $form->error($model,'password'); ?>
    </div>
    <?php if($model->scenario == 'captchaRequired'): ?>
    <div class="form-group">
        <div class="controls">
            <?php $this->widget('CCaptcha', array(
                'imageOptions'=>array('id'=>'signup-captcha', 'style'=>'width: 85%;'),
                'buttonOptions'=>array('style'=>'display: inline-block; vertical-align: middle;margin-top:-40px'),
                'buttonLabel'=>'<i style="font-size: 24px;" class="glyphicon glyphicon-refresh"></i>'
            )); ?>
        </div>
        <div style='margin-top: 18px;' class="controls">
            <?php echo $form->textField($model,'verifyCode', array(
                'class'=>'form-control clearboth',
                'placeholder'=>Yii::t('fshare', 'Input the result of captcha above')
            )); ?>
		    <?php echo $form->error($model,'verifyCode'); ?>
        </div>
	</div>
    <?php endif; ?>
    <div class="form-group">
        <div class="controls" style="color: #333;">
<!--    <label class="checkbox">  -->
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo Yii::t("fshare",'Remember me');?>
        <?php $actionId = Yii::app()->controller->getAction()->getId();
        //if($actionId=='login'){ ?>
        <?php //} ?>
<!--    </label> -->
        </div>
    </div>
   
    <div class="form-group">
	<div class="buttons">
        <?php 
        echo CHtml::submitButton(Yii::t('fshare', 'Login'),array("class"=>"btn btn-info"));
        ?>
	</div>
    </div>
    <div class="form-group">
	<div class="buttons">
        <a href="<?php echo Yii::app()->createUrl("/forgot");?>"><?php echo Yii::t('account', "Forgot password");?></a>
	</div>
    </div>
<?php $this->endWidget(); ?>
