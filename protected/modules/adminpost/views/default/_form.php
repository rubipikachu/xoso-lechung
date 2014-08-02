<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<div class="span12">	
    <p class="note">Vui lòng điền đầy đủ các  trường có dấu *.</p>
	<?php $error = $form->errorSummary($model);
    if(!empty($error)){ ?>
    <div class="alert alert-error span8">
         <?php echo $form->errorSummary($model); ?>
    </div>
    <?php } ?>
</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php echo $form->dropDownList($model,'catid',Category::loadAllData(1)); ?>
		<?php echo $form->error($model,'catid'); ?>
	</div>
    
	<div class="control-group">
		<?php echo $form->labelEx($model,'introtext'); ?>
		<?php echo $form->textArea($model,'introtext',array('rows'=>6, 'cols'=>50, 'class'=>'span9 ckeditor', 'id'=>'introtext')); ?>
		<?php echo $form->error($model,'introtext'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'fulltext'); ?>
		<?php echo $form->textArea($model,'fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span9 ckeditor', 'id'=>'fulltext')); ?>
		<?php echo $form->error($model,'fulltext'); ?>
	</div>

	<div class="control-group">
        <?php
            echo $form->labelEx($model, 'images');
            echo $form->fileField($model, 'images');
            echo $form->error($model, 'images');
        ?>
	</div>
    
	<div class="control-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'hot'); ?>
		<?php echo $form->checkBox($model,'hot'); ?>
		<?php echo $form->error($model,'hot'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'new'); ?>
		<?php echo $form->checkBox($model,'new'); ?>
		<?php echo $form->error($model,'new'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'countvisited'); ?>
		<?php echo $form->textField($model,'countvisited'); ?>
		<?php echo $form->error($model,'countvisited'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'metadesc'); ?>
		<?php echo $form->textArea($model,'metadesc',array('rows'=>6, 'cols'=>50, 'class'=>'span9', 'id'=>'metadesc')); ?>
		<?php echo $form->error($model,'metadesc'); ?>
	</div>
    
    <div class="control-group">
		<?php echo $form->labelEx($model,'metakeyword'); ?>
		<?php echo $form->textArea($model,'metakeyword',array('rows'=>6, 'cols'=>50, 'class'=>'span9', 'id'=>'metakeyword')); ?>
		<?php echo $form->error($model,'metakeyword'); ?>
	</div>

	<div class="control-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm bài viết' : 'Cập nhật'); ?>
	</div>

<?php $this->endWidget(); ?>