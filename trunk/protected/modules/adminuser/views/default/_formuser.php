<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>
<style>input,textarea{width:90%;}</style>
<div class="span12">	
    <p class="note">Vui lòng điền đầy đủ các trường có dấu *.</p>
	<?php $error = $form->errorSummary($model);
    if(!empty($error)){ ?>
    <div class="alert alert-error span8">
         <?php echo $form->errorSummary($model); ?>
    </div>
    <?php } ?>
</div>

<div class="span5">
	<div class="control-group">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->dropDownList($model,'level',array("1" => "Người dùng", "2" => "Quản trị")); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
	</div>
</div>

<div class="span5">
	<div class="control-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'lastvisit'); ?>
		<?php echo $form->textField($model,'lastvisit',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'actived'); ?>
		<?php echo $form->textField($model,'actived'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật'); ?>
	</div>
</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>