<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

class ServiceController extends ApiController
{
    public function init() {
        parent::init();
        Yii::app()->errorHandler->errorAction= $this->actionError();
    }

    /**
    * This is the action to handle external exceptions.
    */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            $this->renderJSON(array('code'=>$error['code'], 'msg'=>$error['message']));
        }
    } 
    
    /**
     * get tình trang tuong thuat truc tiep
     */
    public function actionGetstatusonline()
    {
        if(date("H",time())<=16 && date("i",time()) <= 10){
            $ret = array('code'=>200 ,'bac'=>false, 'trung'=>false, 'nam'=>false); 
        }
        else if(date("H",time())>=17){
            $ret = array('code'=>200 ,'bac'=>true, 'trung'=>true, 'nam'=>true); 
        }else{
            
           $ret = array('code'=>200 ,'bac'=>true, 'trung'=>true, 'nam'=>true); 
        } 
        $this->renderJSON($ret); 
    }
    
    public function actionGetstatusprovince(){
        $day = date("l",time());
        $date = date("d-m-Y",time());
        if(date("H",time())<=16 && date("i",time()) <= 10){
           $day = date("l",time() - 86400);
           $date = date("d-m-Y",time() - 86400);
        }
        
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $nam = explode(",",$data->nam);
        $trung = explode(",",$data->trung);
        $bac = explode(",",$data->bac);
        $tinh = array_merge($nam,$trung,$bac);
        
        //nam
        $criterianam = new CDbCriteria();
        $criterianam->condition='date=:date'; 
        $criterianam->params=array(':date'=>$date);
        $criterianam->addInCondition("provice", $nam);
        $resultnam = KqxsNam::model()->findAll($criterianam);
        
        //trung
        $criteriatrung = new CDbCriteria();
        $criteriatrung->condition='date=:date'; 
        $criteriatrung->params=array(':date'=>$date);
        $criteriatrung->addInCondition("provice", $trung);
        $resulttrung = KqxsTrung::model()->findAll($criteriatrung);
        
        //bac
        $criteriabac = new CDbCriteria();
        $criteriabac->condition='date=:date'; 
        $criteriabac->params=array(':date'=>$date);
        $criteriabac->addInCondition("provice", $bac);
        $resultbac = KqxsBac::model()->findAll($criteriabac);
        
        $result = array_merge($resultnam,$resulttrung,$resultbac);
        
        $db = array();
        foreach($result as $item){
            array_push($db,$item->provice);
        }
        
        $ret = array('code'=>200);
        
        foreach($tinh as $tinhitem){
            if(in_array($tinhitem,$db))
                $ret["tinh".$tinhitem]=true;
            else
                $ret["tinh".$tinhitem]=false;
        }
           
        $this->renderJSON($ret); 
    }
    
}

?>