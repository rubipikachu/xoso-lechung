<?php
/* @var $this ImagesdetailController */
/* @var $model Imagesdetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagesdetail-form',
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
		<?php echo $form->labelEx($model,'albumid'); ?>
		<?php echo $form->dropDownList($model,'albumid',Albumimages::loadAllData()); ?>
		<?php echo $form->error($model,'albumid'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>255,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group">
        <?php
            echo $form->labelEx($model, 'image');
            //echo $form->fileField($model, 'image');
            //echo $form->error($model, 'image');
            
                $this->widget('CMultiFileUpload', array(
                        'name' => 'image',
                        'model'=> $model,
                        'id'=>'image',
                        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                        'duplicate' => 'Duplicate file!', // useful, i think
                        'denied' => 'Invalid file type', // useful, i think
                        'htmlOptions' => array('multiple' => 'multiple'),
                    ));
        ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'countvisited'); ?>
		<?php echo $form->textField($model,'countvisited'); ?>
		<?php echo $form->error($model,'countvisited'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'create'); ?>
		<?php echo $form->textField($model,'create'); ?>
		<?php echo $form->error($model,'create'); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->