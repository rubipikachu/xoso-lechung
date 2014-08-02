<?php
/* @var $this AlbumController */
/* @var $model Albumimages */

$this->breadcrumbs=array(
	'Albumimages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Albumimages', 'url'=>array('index')),
	array('label'=>'Create Albumimages', 'url'=>array('create')),
	array('label'=>'Update Albumimages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Albumimages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Albumimages', 'url'=>array('admin')),
);
?>

<h1>View Album #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'image_represent',
		'link',
		'status',
		'created',
		'tmp',
	),
)); ?>
