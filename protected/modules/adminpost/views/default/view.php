<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Chi tiết bài viết
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
		'catid',
		'title',
		'introtext:html',
		'fulltext:html',
		'images',
		'created',
		'modified',
		'status',
		'hot',
		'new',
		'countvisited',
		'ordering',
        'metadesc',
        'metakeyword',
	),
)); ?>
      </div>
    </div>
  </div>
</div>