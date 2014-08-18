<?php
/* @var $this AlbumController */
/* @var $model Albumimages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'albumimages-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>255,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>255,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php echo $form->dropDownList($model,'catid',array( "22"=>"Ảnh cưới","23"=>"Ảnh nghệ thuật","24"=>"Ảnh đời thường")); ?>
		<?php echo $form->error($model,'catid'); ?>
	</div>

    <div class="control-group">
        <?php
            echo $form->labelEx($model, 'image_represent');
            echo $form->fileField($model, 'image_represent');
            echo $form->error($model, 'image_represent');
        ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>255,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'tmp'); ?>
		<?php echo $form->textField($model,'tmp'); ?>
		<?php echo $form->error($model,'tmp'); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->