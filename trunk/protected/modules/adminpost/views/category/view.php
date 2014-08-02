<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Xem chi tiết danh mục
        </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down">
          </a>
          <a href="javascript:;" class="icon-remove">
          </a>
        </span>
      </div>
      <div class="widget-body">
        <?php $this->widget('zii.widgets.CDetailView', array(
        	'data'=>$model,
        	'attributes'=>array(
        		'id',
        		'name',
        		'type',
        		'desc',
        	),
        )); ?>
      </div>
    </div>
  </div>
</div>
