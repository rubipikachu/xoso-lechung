<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Thêm quyền #<?php echo $model->id; ?>
        </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down">
          </a>
        </span>
      </div>
      <div class="widget-body">
      <?php echo $this->renderPartial('_formpermission', array('model'=>$model)); ?>
      </div>
    </div>
  </div>
</div>