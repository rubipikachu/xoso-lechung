<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách bài viết",
        'model'     => $model,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Danh mục',
                                    'name'  => 'catid'
                                ),
                                array(
                                    'title' => 'Tên bài viết',
                                    'name'  => 'title'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/adminpost/default/view"),
                                'edit'      => $this->createUrl("/adminpost/default/update"),
                                'delete'    => $this->createUrl("/adminpost/default/delete")
                            )
)); 