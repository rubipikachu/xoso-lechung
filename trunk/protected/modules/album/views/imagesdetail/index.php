<?php
/* @var $this ImagesdetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Imagesdetails',
);

$this->menu=array(
	array('label'=>'Create Imagesdetail', 'url'=>array('create')),
	array('label'=>'Manage Imagesdetail', 'url'=>array('admin')),
);
?>

<h1>Imagesdetails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
