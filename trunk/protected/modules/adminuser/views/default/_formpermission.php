<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permission-form',
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

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'module'); ?>
		<?php echo $form->textField($model,'module',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'controller'); ?>
		<?php echo $form->textField($model,'controller',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'actived'); ?>
		<?php echo $form->checkBox($model,'actived'); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật'); ?>
	</div>

<?php $this->endWidget(); ?>