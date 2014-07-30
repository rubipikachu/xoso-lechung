<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách danh mục bài viết",
        'model'     => $model,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Tên danh mục',
                                    'name'  => 'name'
                                ),
                                array(
                                    'title' => 'Danh mục cha',
                                    'name'  => 'parentid'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/adminpost/category/view"),
                                'edit'      => $this->createUrl("/adminpost/category/update"),
                                'delete'    => $this->createUrl("/adminpost/category/delete")
                            )
)); 