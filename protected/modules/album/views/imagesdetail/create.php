<?php
/* @var $this ImagesdetailController */
/* @var $model Imagesdetail */

$this->breadcrumbs=array(
	'Imagesdetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Imagesdetail', 'url'=>array('index')),
	array('label'=>'Manage Imagesdetail', 'url'=>array('admin')),
);
?>

<h1>Thêm mới</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>