<?php
/* @var $this TourController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h3 class="page-title"> Cập nhật bài viết #<?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>