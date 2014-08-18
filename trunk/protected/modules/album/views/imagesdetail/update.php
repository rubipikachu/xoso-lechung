<?php
/* @var $this ImagesdetailController */
/* @var $model Imagesdetail */

$this->breadcrumbs=array(
	'Imagesdetails'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Imagesdetail', 'url'=>array('index')),
	array('label'=>'Create Imagesdetail', 'url'=>array('create')),
	array('label'=>'View Imagesdetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Imagesdetail', 'url'=>array('admin')),
);
?>

<h1>Cập nhật <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>