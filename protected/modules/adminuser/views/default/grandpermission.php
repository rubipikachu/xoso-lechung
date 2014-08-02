<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-title">
        <h4>
          <i class="icon-globe">
          </i>
          Cấp quyền cho nguời dùng #<?php echo $model->id; ?>
        </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down">
          </a>
        </span>
      </div>
      <div class="widget-body">
        <form method="post">
        <table class="table table-bordered table-hover">
            <?php $i=0; foreach($permission as $item){ if($i%7==0) echo "<tr>"; ?>
                <td>
                    <input type="checkbox" <?php if(in_array($item->id,$grand)) echo "CHECKED"; ?> name="permission[]" value="<?php echo $item->id ?>" />
                    <?php echo $item->name; ?>
                </td>
            <?php if($i%7==6) echo "</tr>"; $i++; } ?>
        </table>
        <input type="submit" name="grand" value="Cấp quyền" />
        </form>
        </div>
    </div>
  </div>
</div>