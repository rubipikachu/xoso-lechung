<div class="row-fluid">
  <div class="span12">
    <div id="theme-change" class="hidden-phone">
      <i class="icon-cogs">
      </i>
      <span class="settings">
        <span class="text">
          Theme:
        </span>
        <span class="colors">
          <span class="color-default" data-style="default">
          </span>
          <span class="color-gray" data-style="gray">
          </span>
          <span class="color-purple" data-style="purple">
          </span>
          <span class="color-navy-blue" data-style="navy-blue">
          </span>
        </span>
      </span>
    </div>
    <h3 class="page-title">
      <?php echo Yii::t('admin',$this->module->id); ?>
      <small>
        <?php echo Yii::t('admin','General Information'); ?> 
      </small>
    </h3>
    <ul class="breadcrumb">
      <li>
        <a href="javascript::void()">
          <i class="icon-home">
          </i>
        </a>
        <span class="divider">
          &nbsp;
        </span>
      </li>
      <li>
        <a href="<?php echo Yii::app()->createUrl("/".$this->module->id); ?>">
          <?php echo Yii::t('admin',$this->module->id); ?>
        </a>
        <span class="divider">
          &nbsp;
        </span>
      </li>
      <li>
        <a href="<?php echo Yii::app()->createUrl("/".$this->module->id."/".substr(get_class($this),0,-10)); ?>">
          <?php echo Yii::t('admin',get_class($this)); ?>
        </a>
        <span class="divider">
          &nbsp;
        </span>
      </li>
      <li>
        <a href="javascript::void()">
          <?php echo Yii::t('admin',$this->action->id); ?>
        </a>
        <span class="divider-last">
          &nbsp;
        </span>
      </li>
      <!--li class="pull-right search-wrap">
        <form class="hidden-phone">
          <div class="search-input-area">
            <input id=" " class="search-query" type="text" placeholder="Tìm kiếm">
            <i class="icon-search">
            </i>
          </div>
        </form>
      </li-->
    </ul>
  </div>
</div>