<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kqxs-nam-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<style>input,textarea{width:50px;margin-right:10px !important;}</style>
<div class="span12">	
    <p class="note">Vui lòng điền đầy đủ các trường có dấu *.</p>
	<?php $error = $form->errorSummary($model);
    if(!empty($error)){ ?>
    <div class="alert alert-error span8">
         <?php echo $form->errorSummary($model); ?>
    </div>
    <?php } ?>
</div>
<div class="span3">
	<div class="control-group">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array("style"=>"width:200px")); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'loaive'); ?>
		<?php echo $form->textField($model,'loaive',array("style"=>"width:200px")); ?>
		<?php echo $form->error($model,'loaive'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'provice'); ?>
		<?php echo $form->dropDownList($model,'provice',CHtml::listData(Tinh::model()->findAll("mien=1"),'id','tinh')); ?>
		<?php echo $form->error($model,'provice'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
</div>
<div class="span8">
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'db'); ?>
		<?php echo $form->textField($model,'db'); ?>
		<?php echo $form->error($model,'db'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nhat'); ?>
		<?php echo $form->textField($model,'nhat'); ?>
		<?php echo $form->error($model,'nhat'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nhi'); ?>
		<?php echo $form->textField($model,'nhi'); ?>
		<?php echo $form->error($model,'nhi'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba1'); ?>
		<?php echo $form->textField($model,'ba1'); ?>
		<?php echo $form->error($model,'ba1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba2'); ?>
		<?php echo $form->textField($model,'ba2'); ?>
		<?php echo $form->error($model,'ba2'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu1'); ?>
		<?php echo $form->textField($model,'tu1'); ?>
		<?php echo $form->error($model,'tu1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu2'); ?>
		<?php echo $form->textField($model,'tu2'); ?>
		<?php echo $form->error($model,'tu2'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu3'); ?>
		<?php echo $form->textField($model,'tu3'); ?>
		<?php echo $form->error($model,'tu3'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu4'); ?>
		<?php echo $form->textField($model,'tu4'); ?>
		<?php echo $form->error($model,'tu4'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu5'); ?>
		<?php echo $form->textField($model,'tu5'); ?>
		<?php echo $form->error($model,'tu5'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu6'); ?>
		<?php echo $form->textField($model,'tu6'); ?>
		<?php echo $form->error($model,'tu6'); ?>
	</div>
    
    <div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tu7'); ?>
		<?php echo $form->textField($model,'tu7'); ?>
		<?php echo $form->error($model,'tu7'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam'); ?>
		<?php echo $form->textField($model,'nam'); ?>
		<?php echo $form->error($model,'nam'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'sau1'); ?>
		<?php echo $form->textField($model,'sau1'); ?>
		<?php echo $form->error($model,'sau1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'sau2'); ?>
		<?php echo $form->textField($model,'sau2'); ?>
		<?php echo $form->error($model,'sau2'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'sau3'); ?>
		<?php echo $form->textField($model,'sau3'); ?>
		<?php echo $form->error($model,'sau3'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'bay'); ?>
		<?php echo $form->textField($model,'bay'); ?>
		<?php echo $form->error($model,'bay'); ?>
	</div>

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'tam'); ?>
		<?php echo $form->textField($model,'tam'); ?>
		<?php echo $form->error($model,'tam'); ?>
	</div>
    <div class="clearfix"></div>
</div>
<div class="span12">
	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<div class="clearfix"></div>