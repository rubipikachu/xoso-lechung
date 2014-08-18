<?php
/* @var $this AlbumController */
/* @var $model Albumimages */

$this->breadcrumbs=array(
	'Albumimages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Albumimages', 'url'=>array('index')),
	array('label'=>'Manage Albumimages', 'url'=>array('admin')),
);
?>

<h1>Thêm Album</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>