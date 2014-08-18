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
		'nhi1',
		'nhi2',
		'ba1',
		'ba2',
		'ba3',
		'ba4',
		'ba5',
		'ba6',
		'tu1',
		'tu2',
		'tu3',
		'tu4',
		'nam1',
		'nam2',
		'nam3',
		'nam4',
		'nam5',
		'nam6',
		'sau1',
		'sau2',
		'sau3',
		'bay1',
		'bay2',
		'bay3',
		'bay4',
	),
)); ?>
</div>
    </div>
  </div>
</div>
