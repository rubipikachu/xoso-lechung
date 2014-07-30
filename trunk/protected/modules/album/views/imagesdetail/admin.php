<?php


$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3 class="page-title"> Quản lý hình ảnh </h3>

<ul class="breadcrumb">
<li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li><li><a href="<?php echo yii::app()->homeUrl; ?>admin/imagesdetail/admin">Quản lý hình ảnh</a><span class="divider-last">&nbsp;</span></li>
<li class="pull-right search-wrap"><form class="hidden-phone"><div class="search-input-area"><input id=" " class="search-query" type="text" placeholder="Tìm kiếm"><i class="icon-search"></i></div></form></li></ul>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-title">
                <h4>Quản lý hình ảnh</h4>
            </div>
            <div class="widget-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'imagesdetail-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'htmlOptions' => array('class'=>'table table-striped table-advance table-hover'),
	'columns'=>array(
		'id',
        array(
            'name'=>'albumid',
            'type'=>'html',
            'value'=>'CommonHelper::showAlbum($data)',
        ),
		'name',
		array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'CommonHelper::showImages($data)',
        ),
		array(
            'name'=>'status',
            'value'=>'CommonHelper::Tourstatus($data)',
        ),
		'countvisited',
		/*
		'create',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
        </div>
    </div>
</div>
