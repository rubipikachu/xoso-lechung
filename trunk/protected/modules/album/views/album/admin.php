<?php
/* @var $this AlbumController */
/* @var $model Albumimages */

$this->breadcrumbs=array(
	'Albumimages'=>array('index'),
	'Manage',
);
?>

<h3 class="page-title"> Quản lý album </h3>

<ul class="breadcrumb">
<li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li><li><a href="<?php echo yii::app()->homeUrl; ?>admin/album/admin">Quản lý album</a><span class="divider-last">&nbsp;</span></li>
</ul>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-title">
                <h4>Quản lý album</h4>
            </div>
            <div class="widget-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'albumimages-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'htmlOptions' => array('class'=>'table table-striped table-advance table-hover'),
	'columns'=>array(
		'id',
		'name',
		'alias',
        array(
            'name'=>'image_represent',
            'type'=>'html',
            'value'=>'CommonHelper::showImagess($data)',
        ),
		'link',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
        </div>
    </div>
</div>