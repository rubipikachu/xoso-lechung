<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kqxs-bac-form',
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
		<?php echo $form->dropDownList($model,'provice',CHtml::listData(Tinh::model()->findAll("mien=3"),'id','tinh')); ?>
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
		<?php echo $form->labelEx($model,'nhi1'); ?>
		<?php echo $form->textField($model,'nhi1'); ?>
		<?php echo $form->error($model,'nhi1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nhi2'); ?>
		<?php echo $form->textField($model,'nhi2'); ?>
		<?php echo $form->error($model,'nhi2'); ?>
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

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba3'); ?>
		<?php echo $form->textField($model,'ba3'); ?>
		<?php echo $form->error($model,'ba3'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba4'); ?>
		<?php echo $form->textField($model,'ba4'); ?>
		<?php echo $form->error($model,'ba4'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba5'); ?>
		<?php echo $form->textField($model,'ba5'); ?>
		<?php echo $form->error($model,'ba5'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'ba6'); ?>
		<?php echo $form->textField($model,'ba6'); ?>
		<?php echo $form->error($model,'ba6'); ?>
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

    <div class="clearfix"></div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam1'); ?>
		<?php echo $form->textField($model,'nam1'); ?>
		<?php echo $form->error($model,'nam1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam2'); ?>
		<?php echo $form->textField($model,'nam2'); ?>
		<?php echo $form->error($model,'nam2'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam3'); ?>
		<?php echo $form->textField($model,'nam3'); ?>
		<?php echo $form->error($model,'nam3'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam4'); ?>
		<?php echo $form->textField($model,'nam4'); ?>
		<?php echo $form->error($model,'nam4'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam5'); ?>
		<?php echo $form->textField($model,'nam5'); ?>
		<?php echo $form->error($model,'nam5'); ?>
	</div>
    
	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'nam6'); ?>
		<?php echo $form->textField($model,'nam6'); ?>
		<?php echo $form->error($model,'nam6'); ?>
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
		<?php echo $form->labelEx($model,'bay1'); ?>
		<?php echo $form->textField($model,'bay1'); ?>
		<?php echo $form->error($model,'bay1'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'bay2'); ?>
		<?php echo $form->textField($model,'bay2'); ?>
		<?php echo $form->error($model,'bay2'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'bay3'); ?>
		<?php echo $form->textField($model,'bay3'); ?>
		<?php echo $form->error($model,'bay3'); ?>
	</div>

	<div class="control-group pull-left">
		<?php echo $form->labelEx($model,'bay4'); ?>
		<?php echo $form->textField($model,'bay4'); ?>
		<?php echo $form->error($model,'bay4'); ?>
	</div>
    <div class="clearfix"></div>
</div>
<div class="span12">
	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhât'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<div class="clearfix"></div>
