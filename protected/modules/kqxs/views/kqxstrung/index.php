<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách kết quả xổ số miền Trung",
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
                                'view'      => $this->createUrl("/kqxs/kqxstrung/view"),
                                'edit'      => $this->createUrl("/kqxs/kqxstrung/update"),
                                'delete'    => $this->createUrl("/kqxs/kqxstrung/delete")
                            )
)); 