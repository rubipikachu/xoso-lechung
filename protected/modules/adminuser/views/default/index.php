<?php 
$this->widget('DataTable', array(
        'title'     => "Danh sách người dùng",
        'model'     => $model,
        'colunm'    => array(
                                array(
                                    'title' => 'ID',
                                    'name'  => 'id'
                                ),
                                array(
                                    'title' => 'Tên đăng nhập',
                                    'name'  => 'username'
                                ),
                                array(
                                    'title' => 'Họ tên',
                                    'name'  => 'fullname'
                                ),
                                array(
                                    'title' => 'email',
                                    'name'  => 'email'
                                )
                            ),
        'link'      => array(
                                'view'      => $this->createUrl("/adminuser/default/viewuser"),
                                'edit'      => $this->createUrl("/adminuser/default/updateuser"),
                                'delete'    => $this->createUrl("/adminuser/default/deleteuser"),
                                'grand'     => $this->createUrl("/adminuser/default/grandpermission")
                            )
)); 