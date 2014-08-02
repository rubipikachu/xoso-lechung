<?php
/* @var $this ImagesdetailController */
/* @var $model Imagesdetail */

$this->breadcrumbs=array(
	'Imagesdetails'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Imagesdetail', 'url'=>array('index')),
	array('label'=>'Create Imagesdetail', 'url'=>array('create')),
	array('label'=>'Update Imagesdetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Imagesdetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Imagesdetail', 'url'=>array('admin')),
);
?>

<h1>Xem chi tiết #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'albumid',
		'name',
		'images',
		'status',
		'countvisited',
		'create',
	),
)); ?>
