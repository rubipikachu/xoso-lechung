<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Chi tiết quyền #<?php echo $model->id; ?>
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
        		'name',
        		'description',
        		'module',
        		'controller',
        		'action',
        		'actived',
        		'created',
        	),
        )); ?>
        </div>
    </div>
  </div>
</div>
