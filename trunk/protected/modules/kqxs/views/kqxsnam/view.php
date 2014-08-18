<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Chi tiết #<?php echo $model->id; ?>
        </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down">
          </a>
        </span>
      </div>
      <div class="widget-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
        array(  
            'name' => 'provice',
            'type' => 'raw',
            'value' => CommonHelper::getProvince($model->provice),
        ),
		'image',
		'db',
		'nhat',
		'nhi',
		'ba1',
		'ba2',
		'tu1',
		'tu2',
		'tu3',
		'tu4',
        'tu5',
        'tu6',
        'tu7',
		'nam',
		'sau1',
		'sau2',
		'sau3',
		'bay',
		'tam'
	),
)); ?>
</div>
    </div>
  </div>
</div>
