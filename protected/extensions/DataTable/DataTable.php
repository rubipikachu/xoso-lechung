<?php
class DataTable  extends CWidget {
    
    public $title;
    public $model;
    public $colunm;
    public $link;
    
    public function run(){
       $this->render('layout', 
                        array(  'model'=>$this->model, 
                                'colunm'=>$this->colunm, 
                                'title'=>$this->title, 
                                'link' => $this->link
                            ));
    }
}