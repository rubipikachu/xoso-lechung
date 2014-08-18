<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author JoeNguyen
 * @copyright 2013
 * @access public
 * @desc access to logfile collection of mongodb to work with log files data( CRUD, e.g)
 */

class LogFiles extends EMongoDocument {

    /**
     * @return string the associated database collection name
     */
    public function collectionName() {
        return 'logfiles';
    }

    public function behaviors() {
        return array(
            'EMongoTimestampBehaviour' => array(
                'class' => 'EMongoTimestampBehaviour' // adds a nice create_time and update_time Mongodate to our docs
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive file information.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
        );
    }

    /**
     * function to get records of logfiles collection
     * @param int $ownerId
     * @param int $action type of records (1: upload, 2: download,...)
     * @return array 
     */
    public static function getLogFiles($ownerId, $action = 0, $limit = 50, $pagenumber = 0) {
        $data = LogFiles::model()->find(array(
                    "owner_id" => $ownerId,
                    "action" => $action ? $action : array('$gt' => 0)
            )
                )
                ->sort(array("create_time" => -1))
                ->skip($pagenumber * $limit)
                ->limit($limit);
        $data = iterator_to_array($data);
        $b = array();
        $i = 0;
        foreach ($data as $a) {
            $a->create_time = explode(" ", $a->create_time); //0.00000000 1457862416
            $date = new DateTime();
            $date->setTimestamp($a->create_time[1]);
            $b[$i]["id"] = $a->_id;
            $b[$i]["action"] = $a->action;
            $b[$i]["create_time"] = $date;
            $b[$i]["files"] = $a->files;
            $b[$i]["owner_id"] = $a->owner_id;
            $b[$i]["descr"] = $a->descr;
            $b[$i++]["ip"] = $a->ip;
        }
        $b = new ArrayDataProvider($b);
        return $b;
    }

    /**
     * author thuan.nguyenhuy@gmail.com
     * set records of logfiles collection (Upload:1 /Donwload:2 /Rename:3 /Move:4 /Copy:5 /Clone:6)
     * @param int $ownerId
     * @param array $log include log information: action, content, descr, ip
     * @return array 
     */
    public static function historyAction($action, $linkCode, $allowdelete=0) {
        $info = UserFile::getRecordInfoByLinkcode($linkCode, $allowdelete);
        $log = array(
            'action' => Yii::t('logfile', $action),
            'files' => $info,
            'owner_id' => Yii::app()->user->id,
            'descr' => $action,
            'ip' => Yii::app()->request->userHostAddress,
        );
        $isert = new LogFiles();
        $isert->_id = User::exportRandomPass(22);
        $isert->action = new MongoInt32($log["action"]);
        $isert->files = $log["files"];
        $isert->owner_id = new MongoInt32(Yii::app()->user->id);
        $isert->descr = $log["descr"];
        $isert->ip = $log["ip"];
        $isert->save();
    }

}

?>
