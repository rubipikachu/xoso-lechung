<?php
/* @var $this AlbumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Albumimages',
);

$this->menu=array(
	array('label'=>'Create Albumimages', 'url'=>array('create')),
	array('label'=>'Manage Albumimages', 'url'=>array('admin')),
);
?>

<h1>Albumimages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
