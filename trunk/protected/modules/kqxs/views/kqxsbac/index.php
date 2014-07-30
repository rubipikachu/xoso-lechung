<div class="widget widget-tabs">
    <div class="widget-title"></div>
    <div class="widget-body">
        <div class="tabbable portlet-tabs">
            <ul class="nav nav-tabs">
                <li class=""><a href="#portlet_tab1" data-toggle="tab">Miền Bắc</a></li>
                <li class=""><a href="#portlet_tab2" data-toggle="tab">Miền Trung</a></li>
                <li class="active"><a href="#portlet_tab3" data-toggle="tab">Miền Nam</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="portlet_tab1">
                <a class="btn btn-success pull-right" href="<?php echo $this->createAbsoluteUrl("/kqxs/kqxsbac/create"); ?>">Thêm kết quả xổ số</a>
                    <?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách kết quả xổ số miền Bắc",
        'model'     => $modelbac,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Ngày tháng',
                                    'name'  => 'date'
                                ),
                                array(
                                    'title'     => 'Tỉnh thành',
                                    'name'      => 'provice',
                                    'function'  => 'getProvince'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/kqxs/kqxsbac/view"),
                                'edit'      => $this->createUrl("/kqxs/kqxsbac/update"),
                                'delete'    => $this->createUrl("/kqxs/kqxsbac/delete")
                            )
));
?>
                </div>
                <div class="tab-pane" id="portlet_tab2">
                <a class="btn btn-success pull-right" href="<?php echo $this->createAbsoluteUrl("/kqxs/kqxstrung/create"); ?>">Thêm kết quả xổ số</a>
<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách kết quả xổ số miền Trung",
        'model'     => $modeltrung,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Ngày tháng',
                                    'name'  => 'date'
                                ),
                                array(
                                    'title' => 'Tỉnh thành',
                                    'name'  => 'provice',
                                    'function'  => 'getProvince'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/kqxs/kqxstrung/view"),
                                'edit'      => $this->createUrl("/kqxs/kqxstrung/update"),
                                'delete'    => $this->createUrl("/kqxs/kqxstrung/delete")
                            )
));  
?>
                </div>
                <div class="tab-pane active" id="portlet_tab3">
                <a class="btn btn-success pull-right" href="<?php echo $this->createAbsoluteUrl("/kqxs/kqxsnam/create"); ?>">Thêm kết quả xổ số</a>
<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách kết quả xổ số Nam",
        'model'     => $modelnam,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Ngày tháng',
                                    'name'  => 'date'
                                ),
                                array(
                                    'title' => 'Tỉnh thành',
                                    'name'  => 'provice',
                                    'function'  => 'getProvince'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/kqxs/kqxsnam/view"),
                                'edit'      => $this->createUrl("/kqxs/kqxsnam/update"),
                                'delete'    => $this->createUrl("/kqxs/kqxsnam/delete")
                            )
)); 
?>
                </div>
            </div>
        </div>
    </div>
</div> 