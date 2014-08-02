<?php
/* @var $this AlbumController */
/* @var $model Albumimages */

$this->breadcrumbs=array(
	'Albumimages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Albumimages', 'url'=>array('index')),
	array('label'=>'Create Albumimages', 'url'=>array('create')),
	array('label'=>'View Albumimages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Albumimages', 'url'=>array('admin')),
);
?>

<h1>Cập nhật Album <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>