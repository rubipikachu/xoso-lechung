<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-reorder">
          </i>
          <?php echo $title ?>
        </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
      </div>
      <div class="widget-body" style="display: block;">
        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <table class="table table-striped table-bordered dataTable" id="sample_1" aria-describedby="sample_1_info">
            <thead>
              <tr role="row">
                <th style="width: 24px;" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
                  <div class="checker" id="uniform-undefined">
                    <span>
                      <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" style="opacity: 0;">
                    </span>
                  </div>
                </th>
                <?php foreach($colunm as $row){ ?>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">
                  <?php echo $row["title"]; ?>
                </th>
                <?php } ?>
                <th role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">
                  Chức năng
                </th>
              </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
              <?php foreach($model as $item){ ?>
              <tr>
                <td class="">
                  <div class="checker" id="uniform-undefined">
                    <span>
                      <input type="checkbox" class="checkboxes" value="1" style="opacity: 0;">
                    </span>
                  </div>
                </td>
                <?php foreach($colunm as $row){ ?>
                <td class="">
                    <?php 
                    $namefunction = isset($row["function"])?$row["function"]:"";
                    if($namefunction != ""){
                        echo CommonHelper::$namefunction($item->$row["name"]);
                    }else{ 
                        echo $item->$row["name"];
                    } ?>
                </td>
                <?php } ?>
                <td width="170">
                  <a href="<?php echo $link["view"]; ?>?id=<?php echo $item->id; ?>" class="btn mini green-stripe">Xem</a>
                  <a href="<?php echo $link["edit"]; ?>?id=<?php echo $item->id; ?>" class="btn mini green-stripe">Sửa</a>
                  <a href="<?php echo $link["delete"]; ?>?id=<?php echo $item->id; ?>" class="btn mini green-stripe">Xóa</a>
                  <?php if(isset($link["grand"])){ ?>
                  <a href="<?php echo $link["grand"]; ?>?id=<?php echo $item->id; ?>" class="btn mini green-stripe">Cấp quyền</a>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>