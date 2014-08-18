<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách quyền",
        'model'     => $model,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Tên quyền',
                                    'name'  => 'name'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/adminuser/default/viewpermission"),
                                'edit'      => $this->createUrl("/adminuser/default/updatepermission"),
                                'delete'    => $this->createUrl("/adminuser/default/deletepermission")
                            )
)); 