<?php

/**
 * CommonHelper Class
 * @package FshareWeb
 **/
class CommonHelper 
{
    
    public static function convert_text($text) {
        $text = str_replace(
        array(' ','%',"/","\\",'"','?','<','>',"#","^","`","'","=","!",":"  ,",,","..","*","&","__","▄"),
        array('_','' ,'' ,''  ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'' ,'-','' ,'-','' ,'' ,'' , "_" ,""  ,""),
        $text);     
        $chars = array("a","A","e","E","o","O","u","U","i","I","d",  "D","y","Y");
        $uni[0] = array("á","à","ạ","ả","ã","â","ấ","ầ",  "ậ","ẩ","ẫ","ă","ắ","ằ","ặ","ẳ","    ");
        $uni[1] = array("Á","À","Ạ","Ả","Ã","Â","Ấ","Ầ",  "Ậ","Ẩ","Ẫ","Ă","Ắ","Ằ","Ặ","Ẳ","    ");
        $uni[2] = array("é","è","ẹ","ẻ","ẽ","ê","ế","ề"  ,"ệ","ể","ễ");
        $uni[3] = array("É","È","Ẹ","Ẻ","Ẽ","Ê","Ế","Ề"  ,"Ệ","Ể","Ễ");
        $uni[4] = array("ó","ò","ọ","ỏ","õ","ô","ố","ồ",  "ộ","ổ","ỗ","ơ","ớ","ờ","ợ","ở","    ");
        $uni[5] = array("Ó","Ò","Ọ","Ỏ","Õ","Ô","Ố","Ồ",  "Ộ","Ổ","Ỗ","Ơ","Ớ","Ờ","Ợ","Ở","    ");
        $uni[6] = array("ú","ù","ụ","ủ","ũ","ư","ứ","ừ",  "ự","ử","ữ");
        $uni[7] = array("Ú","Ù","Ụ","Ủ","Ũ","Ư","Ứ","Ừ",  "Ự","Ử","Ữ");
        $uni[8] = array("í","ì","ị","ỉ","ĩ");
        $uni[9] = array("Í","Ì","Ị","Ỉ","Ĩ");
        $uni[10] = array("đ");
        $uni[11] = array("Đ");
        $uni[12] = array("ý","ỳ","ỵ","ỷ","ỹ");
        $uni[13] = array("Ý","Ỳ","Ỵ","Ỷ","Ỹ");
        for($i=0; $i<=13; $i++) {
            $text = str_replace($uni[$i],$chars[$i],$text);
        }
        return $text;
   }
   
   public static function isAllowPermission($uid, $module, $controller, $action){
        if( $action == 'login' || $action == 'logout' ) return true;
        if(!isset(Yii::app()->user->isAdmin)){ header('location:'.Yii::app()->homeUrl.'adminuser/default/login'); exit; }
        if($action == 'error') return true;
        $criteria=new CDbCriteria;
        $criteria->select='*';   
        $criteria->join='INNER JOIN user_permissions ON `t`.id=user_permissions.permission_id';                          
        $criteria->condition='userid = :uid';                           
        $criteria->params=array(":uid"=>$uid); 
        $permissions = Permission::model()->findAll($criteria);
        foreach($permissions as $item){
            if($item->module == $module && $item->controller == $controller && $item->action == $action)
                return true;
        }
        return false;
   }
   
   public static function getProvince($item)
   {
        $data = Tinh::model()->findByPk($item);
        return $data->tinh;
   }
   
   public static function doveonline($vedo, $tinh, $ngay)
   {
        $model = "KqxsNam";
        if($tinh>=21 && $tinh <=26) $model = "KqxsBac";
        if($tinh > 26) $model = "KqxsTrung";
        
        $tongtien = 0;
        $giaitrung = array();
        
        $kq = $model::model()->find("date = :date and provice=:province", array(":date"=>$ngay, ":province"=>$tinh));
        if(!$kq){
            return false;
        }
        if($model == "KqxsBac"){ //kqxs mien bac
            if(CommonHelper::giai7_bac($vedo,$kq)){
                $tongtien += 25000;
                array_push($giaitrung,"7");
            }
            if(CommonHelper::giai6_bac($vedo,$kq)){
                $tongtien += 50000;
                array_push($giaitrung,"6");
            }
            if(CommonHelper::giai5_bac($vedo,$kq)){
                $tongtien += 100000;
                array_push($giaitrung,"5");
            }
            if(CommonHelper::giai4_bac($vedo,$kq)){
                $tongtien += 200000;
                array_push($giaitrung,"5");
            }
            if(CommonHelper::giai3_bac($vedo,$kq)){
                $tongtien += 1000000;
                array_push($giaitrung,"3");
            }
            if(CommonHelper::giai2_bac($vedo,$kq)){
                $tongtien += 2500000;
                array_push($giaitrung,"2");
            }
            if(CommonHelper::giai1_bac($vedo,$kq)){
                $tongtien += 10000000;
                array_push($giaitrung,"1");
            }
            if(CommonHelper::giaidb_bac($vedo,$kq)){
                $tongtien += 75000000;
                array_push($giaitrung,"Đặc Biệt");
            }else{
                if(CommonHelper::giaikk_bac($vedo,$kq)){
                    $tongtien += 25000;
                    array_push($giaitrung,"Khuyến Khích");
                }
            }
        }else{ //kqxs mien trung & mien nam
            if(CommonHelper::giai8_nam($vedo,$kq)){
                $tongtien += 100000;
                array_push($giaitrung,"8");
            }
            if(CommonHelper::giai7_nam($vedo,$kq)){
                $tongtien += 200000;
                array_push($giaitrung,"7");
            }
            if(CommonHelper::giai6_nam($vedo,$kq)){
                $tongtien += 400000;
                array_push($giaitrung,"6");
            }
            if(CommonHelper::giai5_nam($vedo,$kq)){
                $tongtien += 1000000;
                array_push($giaitrung,"5");
            }
            if(CommonHelper::giai4_nam($vedo,$kq)){
                $tongtien += 3000000;
                array_push($giaitrung,"4");
            }
            if(CommonHelper::giai3_nam($vedo,$kq)){
                $tongtien += 10000000;
                array_push($giaitrung,"3");
            }
            if(CommonHelper::giai2_nam($vedo,$kq)){
                $tongtien += 20000000;
                array_push($giaitrung,"2");
            }
            if(CommonHelper::giai1_nam($vedo,$kq)){
                $tongtien += 30000000;
                array_push($giaitrung,"1");
            }
            if(CommonHelper::giaidb_nam($vedo,$kq)){
                $tongtien += 1500000000;
                array_push($giaitrung,"Đặc Biệt");
            }else{
                if(CommonHelper::giaikkdb_nam($vedo,$kq)){
                    $tongtien += 100000000;
                    array_push($giaitrung,"Đặc Biệt phụ");
                }else {
                    if(CommonHelper::giaikk_nam($vedo,$kq)){
                        $tongtien += 6000000;
                        array_push($giaitrung,"Khuyến Khích");
                    }
                }
            }
        }
        
        return array("tongtien"=>$tongtien, "giai"=>$giaitrung);
   }
   
   public static function giai8_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,4);
        return ($so == $sodatabase->tam)? true : false; 
   }
   
   public static function giai7_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,3);
        return ($so == $sodatabase->bay)? true : false; 
   }
   
   public static function giai6_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,2);
        return ($so == $sodatabase->sau1 || $so == $sodatabase->sau2 || $so == $sodatabase->sau3)? true : false; 
   }
   
   public static function giai5_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,2);
        return ($so == $sodatabase->nam)? true : false; 
   }
   
   public static function giai4_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->tu1 || $so == $sodatabase->tu2 || $so == $sodatabase->tu3
                 || $so == $sodatabase->tu4 || $so == $sodatabase->tu5 || $so == $sodatabase->tu6
                  || $so == $sodatabase->tu7)? true : false; 
   }
   
   public static function giai3_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->ba1 || $so == $sodatabase->ba2)? true : false; 
   }
   
   public static function giai2_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->nhi)? true : false; 
   }
   
   public static function giai1_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->nhat)? true : false; 
   }
   
   public static function giaidb_nam($inputso, $sodatabase)
   {
        return ($inputso == $sodatabase->db)? true : false; 
   }
   
   public static function giaikkdb_nam($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == substr($sodatabase->db,1))? true : false; 
   }
   
   public static function giaikk_nam($inputso, $sodatabase)
   { 
        if(
            (substr($inputso,0,1) == substr($sodatabase->db,0,1) && substr($inputso,1,1) != substr($sodatabase->db,1,1) && substr($inputso,2,1) == substr($sodatabase->db,2,1) && substr($inputso,3,1) == substr($sodatabase->db,3,1) && substr($inputso,4,1) == substr($sodatabase->db,4,1) && substr($inputso,5,1) == substr($sodatabase->db,5,1))
            || (substr($inputso,0,1) == substr($sodatabase->db,0,1) && substr($inputso,1,1) == substr($sodatabase->db,1,1) && substr($inputso,2,1) != substr($sodatabase->db,2,1) && substr($inputso,3,1) == substr($sodatabase->db,3,1) && substr($inputso,4,1) == substr($sodatabase->db,4,1) && substr($inputso,5,1) == substr($sodatabase->db,5,1))
            || (substr($inputso,0,1) == substr($sodatabase->db,0,1) && substr($inputso,1,1) == substr($sodatabase->db,1,1) && substr($inputso,2,1) == substr($sodatabase->db,2,1) && substr($inputso,3,1) != substr($sodatabase->db,3,1) && substr($inputso,4,1) == substr($sodatabase->db,4,1) && substr($inputso,5,1) == substr($sodatabase->db,5,1))
            || (substr($inputso,0,1) == substr($sodatabase->db,0,1) && substr($inputso,1,1) == substr($sodatabase->db,1,1) && substr($inputso,2,1) == substr($sodatabase->db,2,1) && substr($inputso,3,1) == substr($sodatabase->db,3,1) && substr($inputso,4,1) != substr($sodatabase->db,4,1) && substr($inputso,5,1) == substr($sodatabase->db,5,1))
            || (substr($inputso,0,1) == substr($sodatabase->db,0,1) && substr($inputso,1,1) == substr($sodatabase->db,1,1) && substr($inputso,2,1) == substr($sodatabase->db,2,1) && substr($inputso,3,1) == substr($sodatabase->db,3,1) && substr($inputso,4,1) == substr($sodatabase->db,4,1) && substr($inputso,5,1) != substr($sodatabase->db,5,1))
        ){
            return true;
        }else{
            return false;
        }
   }
   
   public static function giai7_bac($inputso, $sodatabase)
   {
        $so = substr($inputso,3);
        return ($so == $sodatabase->bay1 || $so == $sodatabase->bay2 || $so == $sodatabase->bay3 || $so == $sodatabase->bay4)? true : false; 
   }
   
   public static function giai6_bac($inputso, $sodatabase)
   {
        $so = substr($inputso,2);
        return ($so == $sodatabase->sau1 || $so == $sodatabase->sau2 || $so == $sodatabase->sau3)? true : false; 
   }
   
   public static function giai5_bac($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->nam1 || $so == $sodatabase->nam2 || $so == $sodatabase->nam3 
                || $so == $sodatabase->nam4 || $so == $sodatabase->nam5 
                || $so == $sodatabase->nam6)? true : false; 
   }
   
   public static function giai4_bac($inputso, $sodatabase)
   {
        $so = substr($inputso,1);
        return ($so == $sodatabase->tu1 || $so == $sodatabase->tu2 || $so == $sodatabase->tu3 || $so == $sodatabase->tu4)? true : false; 
   }
   
   public static function giai3_bac($inputso, $sodatabase)
   {
        $so = $inputso;
        return ($so == $sodatabase->sau1 || $so == $sodatabase->sau2 || $so == $sodatabase->sau3)? true : false; 
   }
   
   public static function giai2_bac($inputso, $sodatabase)
   {
        return ($inputso == $sodatabase->nhi1 || $inputso == $sodatabase->nhi2)? true : false; 
   }
   
   public static function giai1_bac($inputso, $sodatabase)
   {
        return ($inputso == $sodatabase->nhat)? true : false; 
   }
   
   public static function giaidb_bac($inputso, $sodatabase)
   {
        return ($inputso == $sodatabase->db)? true : false; 
   }
   
   public static function giaikk_bac($inputso, $sodatabase)
   {
        $so = substr($inputso,3);
        return ($so == substr($sodatabase->db,3))? true : false; 
   }
   
   public static function mapprovince($tinh)
   {
        $array = array(
                        '14'    => '1',
                        '9'     => '2',
                        '7'     => '3',
                        '17'    => '4',
                        '21'    => '5',
                        '15'    => '6',
                        '3'     => '7',
                        '11'    => '8',
                        '24'     => '9',
                        '10'    => '10',
                        '2'     => '11',
                        '20'    => '12',
                        '23'    => '13',
                        '19'    => '14',
                        '12'    => '15',
                        '13'    => '16',
                        '22'    => '41',
                        '1'     => '17',
                        '18'    => '18',
                        '16'    => '19',
                        '8'     => '20',
                        '48'    => '21',
                        '46'    => '22',
                        '49'    => '23',
                        '50'    => '24',
                        '47'    => '25',
                        '51'    => '26',
                        '32'    => '27',
                        '30'    => '28',
                        '29'    => '29',
                        '28'    => '30',
                        '35'    => '31',
                        '31'    => '32',
                        '39'    => '33',
                        '36'    => '34',
                        '27'    => '35',
                        '34'    => '36',
                        '28'    => '37',
                        '37'    => '38',
                        '33'    => '39',
                        '26'    => '40'
                    );
        return $array[$tinh];
   }
   
   public static function maprev($tinh)
   {
        $array = array(
                        '1' => '14',
                        '2' => '9',
                        '3' => '7',
                        '4' => '17',
                        '5' => '21',
                        '6' => '15',
                        '7' => '3',
                        '8' => '11',
                        '9' => '24',
                        '10' => '10'   ,
                        '11' => '2'   ,
                        '12' => '20'  ,
                        '13' => '23'  ,
                        '14' => '19'  ,
                        '15' => '12'  ,
                        '16' => '13'  ,
                      '41' => '22'   ,
                       '17' => '1' ,
                        '18' => '18'  ,
                        '19' => '16'  ,
                        '20' => '8'   ,
                        '21' => '48'   ,
                        '22' => '46'  ,
                        '23' => '49'  ,
                        '24' => '50'  ,
                        '25' => '47'  ,
                        '26' => '51' ,
                        '27' => '32'   ,
                        '28' => '30'  ,
                        '29' => '29'  ,
                        '30' => '28'  ,
                        '31' => '35'   ,
                        '32' => '31'  ,
                        '33' => '39'  ,
                        '34' => '36'  ,
                        '35' => '27'  ,
                        '36' => '34'  ,
                        '37' => '28'   ,
                        '38' => '37'   ,
                        '39' => '33',
                        '40' => '26'
                    );
        return $array[$tinh];
   }
   
}
?>
