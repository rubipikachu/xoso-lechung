<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách kết quả xổ số miền Nam",
        'model'     => $model,
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
                                    'name'  => 'provice'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/kqxs/kqxsnam/view"),
                                'edit'      => $this->createUrl("/kqxs/kqxsnam/update"),
                                'delete'    => $this->createUrl("/kqxs/kqxsnam/delete")
                            )
)); 