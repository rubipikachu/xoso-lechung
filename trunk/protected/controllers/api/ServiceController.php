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
        $day = date("l",time());
        $date = date("d-m-Y",time());
        
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
        
        
        $ret = array('code'=>200 ,'bac'=>true, 'trung'=>true, 'nam'=>true);
        $ret['nam'] = (count($nam)==count($resultnam))?true:false;
        $ret['trung'] = (count($trung)==count($resulttrung))?true:false;
        $ret['bac'] = (count($bac)==count($resultbac))?true:false;   
        $this->renderJSON($ret); 
    }
    
    public function actionGetstatusprovince(){
        $day = date("l",time());
        $date = date("d-m-Y",time());
//        if(date("H",time())<16 || (date("H",time())==16 && date("i",time()) <=10)){
//           $day = date("l",time() - 86400);
//           $date = date("d-m-Y",time() - 86400);
//        }
        
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
        //$result = array_merge($resultnam,$resulttrung,$resultbac);
        
        $db = array();
        foreach($resultnam as $item){
            array_push($db,$item->provice);
        }
        foreach($resulttrung as $item){
            array_push($db,$item->provice);
        }
        foreach($resultbac as $item){
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
    
    public function actionMt(){
        $day = date("l",time());
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $nam = explode(",",$data->nam);
        $trung = explode(",",$data->trung);
        $bac = explode(",",$data->bac);
        $url = 'http://minhngoc.net.vn/xstt/MT/MT.php?visit=0';
        $content = file_get_contents($url);
        $arr = explode(";",$content);
        $ret = array();
        foreach($arr as $item){
            $tmp = explode('=',$item);
            $key = $tmp[0];
            $key = str_replace('kqxs["','',$key);
            $key = str_replace('"]','',$key);
            $key = str_replace("\r\n",'',$key);
            $value = end($tmp);
            $value = str_replace('"','',$value);
            $value = preg_replace('/[^0-9]/', '', $value);
            $ret[$key]=$value;
        }
        if(date("d-m-Y",$ret["newtime"])==date("d-m-Y",time())){
            $tinh = explode(",",$ret["listtinhnew"]);
            $date = date("d-m-Y",time());
            foreach($trung as $province){
                $pro = CommonHelper::maprev($province);
            	unset($ret["\r\nT".$pro."_LV"]);
            	unset($ret["\r\n"]);
                $proexist = KqxsTrung::model()->find("date=:date and provice=:provice",array(":date"=>$date,":provice"=>$province));
                if(!$proexist){    
                    $model = new KqxsTrung;
                    $model->date=$date;
                    $model->provice = $province;
                    $model->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $model->nhat =preg_replace('/[^A-Za-z0-9]/', '', $ret["T".$pro."_G1"]);
                    $model->nhi = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2"]);
                    $model->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $model->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $model->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $model->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $model->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $model->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $model->tu5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_5"]);
                    $model->tu6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_6"]);
                    $model->tu7 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_7"]);
                    $model->nam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5"]);
                    $model->sau1 =preg_replace('/[^A-Za-z0-9]/', '', $ret["T".$pro."_G6_1"]);
                    $model->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $model->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $model->bay = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7"]);
                    $model->tam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G8"]);
                    $model->insert();
                }else{
                    $proexist->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $proexist->nhat = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G1"]);
                    $proexist->nhi = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2"]);
                    $proexist->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $proexist->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $proexist->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $proexist->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $proexist->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $proexist->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $proexist->tu5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_5"]);
                    $proexist->tu6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_6"]);
                    $proexist->tu7 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_7"]);
                    $proexist->nam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5"]);
                    $proexist->sau1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_1"]);
                    $proexist->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $proexist->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $proexist->bay = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7"]);
                    $proexist->tam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G8"]);
                    $proexist->update();
                }
            }
        }
        $this->renderJSON($ret);
    }
    
    public function actionMb(){
        $day = date("l",time());
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $nam = explode(",",$data->nam);
        $trung = explode(",",$data->trung);
        $bac = explode(",",$data->bac);
        $url = 'http://minhngoc.net.vn/xstt/MB/MB.php?visit=0';
        $content = file_get_contents($url);
        $arr = explode(";",$content);
        $ret = array();
        foreach($arr as $item){
            $tmp = explode('=',$item);
            $key = $tmp[0];
            $key = str_replace('kqxs["','',$key);
            $key = str_replace('"]','',$key);
            $key = str_replace("\r\n",'',$key);
            $value = end($tmp);
            $value = str_replace('"','',$value);
            $value = preg_replace('/[^0-9]/', '', $value);
            $ret[$key]=$value;
        }
        if(date("d-m-Y",$ret["newtime"])==date("d-m-Y",time())){
            $tinh = explode(",",$ret["listtinhnew"]);
            $date = date("d-m-Y",time());
            foreach($bac as $province){
                $pro = CommonHelper::maprev($province);
            	unset($ret["\r\nT".$pro."_LV"]);
            	unset($ret["\r\n"]);
                $proexist = KqxsBac::model()->find("date=:date and provice=:provice",array(":date"=>$date,":provice"=>$province));
                if(!$proexist){    
                    $model = new KqxsBac;
                    $model->date=$date;
                    $model->provice = $province;
                    $model->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $model->nhat = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G1"]);
                    $model->nhi1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2_1"]);
                    $model->nhi2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2_2"]);
                    $model->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $model->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $model->ba3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_3"]);
                    $model->ba4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_4"]);
                    $model->ba5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_5"]);
                    $model->ba6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_6"]);
                    $model->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $model->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $model->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $model->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $model->nam1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_1"]);
                    $model->nam2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_2"]);
                    $model->nam3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_3"]);
                    $model->nam4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_4"]);
                    $model->nam5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_5"]);
                    $model->nam6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_6"]);
                    $model->sau1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_1"]);
                    $model->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $model->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $model->bay1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_1"]);
                    $model->bay2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_2"]);
                    $model->bay3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_3"]);
                    $model->bay4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_4"]);
                    $model->insert();
                }else{
                    $proexist->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $proexist->nhat = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G1"]);
                    $proexist->nhi1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2_1"]);
                    $proexist->nhi2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2_2"]);
                    $proexist->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $proexist->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $proexist->ba3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_3"]);
                    $proexist->ba4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_4"]);
                    $proexist->ba5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_5"]);
                    $proexist->ba6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_6"]);
                    $proexist->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $proexist->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $proexist->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $proexist->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $proexist->nam1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_1"]);
                    $proexist->nam2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_2"]);
                    $proexist->nam3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_3"]);
                    $proexist->nam4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_4"]);
                    $proexist->nam5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_5"]);
                    $proexist->nam6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5_6"]);
                    $proexist->sau1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_1"]);
                    $proexist->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $proexist->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $proexist->bay1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_1"]);
                    $proexist->bay2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_2"]);
                    $proexist->bay3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_3"]);
                    $proexist->bay4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7_4"]);
                    $proexist->update();
                }
            }
        }
        $this->renderJSON($ret);
    }
    
    public function actionMn(){
        $day = date("l",time());
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $nam = explode(",",$data->nam);
        $trung = explode(",",$data->trung);
        $bac = explode(",",$data->bac);
        $url = 'http://minhngoc.net.vn/xstt/MN/MN.php?visit=0';
        $content = file_get_contents($url);
        $arr = explode(";",$content);
        $ret = array();
        foreach($arr as $item){
            $tmp = explode('=',$item);
            $key = $tmp[0];
            $key = str_replace('kqxs["','',$key);
            $key = str_replace('"]','',$key);
            $key = str_replace("\r\n",'',$key);
            $value = end($tmp);
            $value = str_replace('"','',$value);
            $value = preg_replace('/[^0-9]/', '', $value);
            $ret[$key]=$value;
        }
        if(date("d-m-Y",$ret["newtime"])==date("d-m-Y",time())){
            $tinh = explode(",",$ret["listtinhnew"]);
            $date = date("d-m-Y",time());
            foreach($nam as $province){
                $pro = CommonHelper::maprev($province);
            	unset($ret["\r\nT".$pro."_LV"]);
            	unset($ret["\r\n"]);
                $proexist = KqxsNam::model()->find("date=:date and provice=:provice",array(":date"=>$date,":provice"=>$province));
                if(!$proexist){    
                    $model = new KqxsNam;
                    $model->date=$date;
                    $model->provice = $province;
                    $model->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $model->nhat =preg_replace('/[^A-Za-z0-9]/', '', $ret["T".$pro."_G1"]);
                    $model->nhi = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2"]);
                    $model->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $model->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $model->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $model->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $model->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $model->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $model->tu5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_5"]);
                    $model->tu6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_6"]);
                    $model->tu7 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_7"]);
                    $model->nam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5"]);
                    $model->sau1 =preg_replace('/[^A-Za-z0-9]/', '', $ret["T".$pro."_G6_1"]);
                    $model->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $model->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $model->bay = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7"]);
                    $model->tam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G8"]);
                    $model->insert();
                }else{
                    $proexist->db = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_Gdb"]);
                    $proexist->nhat = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G1"]);
                    $proexist->nhi = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G2"]);
                    $proexist->ba1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_1"]);
                    $proexist->ba2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G3_2"]);
                    $proexist->tu1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_1"]);
                    $proexist->tu2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_2"]);
                    $proexist->tu3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_3"]);
                    $proexist->tu4 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_4"]);
                    $proexist->tu5 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_5"]);
                    $proexist->tu6 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_6"]);
                    $proexist->tu7 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G4_7"]);
                    $proexist->nam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G5"]);
                    $proexist->sau1 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_1"]);
                    $proexist->sau2 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_2"]);
                    $proexist->sau3 = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G6_3"]);
                    $proexist->bay = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G7"]);
                    $proexist->tam = preg_replace('/[^A-Za-z0-9]/', '',$ret["T".$pro."_G8"]);
                    $proexist->update();
                }
            }
        }
        $this->renderJSON($ret);
    }
    
}

?>