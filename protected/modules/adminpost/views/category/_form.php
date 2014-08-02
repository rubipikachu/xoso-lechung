<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	<?php echo $form->hiddenField($model,'type'); ?>
    <div class="control-group">
		<?php echo $form->labelEx($model,'parentid'); ?>
		<?php echo $form->dropDownList($model,'parentid',Category::loadAllData(1)); ?>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50,'class'=>'span9 ckeditor')); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật'); ?>
	</div>

<?php $this->endWidget(); ?>