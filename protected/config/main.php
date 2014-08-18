<?php

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Xổ số Lê Chung',
    'language'=>'vi',
    'homeUrl'=>'http://www.xoso.vn/',
    'modules' => array(
        'admincp',
        'adminuser',
        'adminpost',
        'adminglobal',
        'kqxs',
    ),

    // autoloading model and component classes
    'import'=>array(
        'application.models.mysql.*',
        'application.models.forms.*',
        'application.models.mongodb.*',
        'application.components.*',
        'application.models.*',
        'ext.MongoYii.*',
        'ext.MongoYii.validators.*',
        'ext.MongoYii.behaviors.*',
        'ext.*',
        'ext.DataTable.*',
        'ext.mongodb.*',
        'ext.YiiMailer.*',
        'ext.redis.*',
        'ext.file.*',
    ),
    /*
    'behaviors' => array(
        'mongo' => array(
            'class'=>'MongoBehavior',
        )
    ),*/
    // application components
    'components'=>array(
    
        'file' => array(
            'class' => 'ext.file.CFile',
        ), 
        'user'=>array(
            // enable cookie-based authentication
            'class'=>'AppUser',
            'allowAutoLogin'=>true,
            'loginUrl'=>array('adminglobal/default/error'),
        ),/*
        'session' => array (
            'autoStart'=>true,
            'class' => 'ext.redis.ARedisSession',
            'keyPrefix' => 'fshare_session:',
            'cookieMode' => 'only',
            'sessionName'=>'session_id',
            'timeout' => 86400,
        ),
        'cache'=>array(
            'class' => 'ext.redis.ARedisCache',
        ),
        'redis' => array( // redis connection for frontend
            'class' => "ext.redis.ARedisConnection",
            'prefix' => 'fs:',
            'hostname' => "localhost",
            'port' => 6379,
            'database' => 0,
        ),
        'redis2' => array( // redis connection for read from backend
            'class' => "ext.redis.ARedisConnection",
            'prefix' => 'fs:',
            'hostname' => "localhost",
            'port' => 6379,
            'database' => 1,
        ),*/
        'request'=>array(
            'class' => 'application.components.HttpRequest',
            'enableCookieValidation'=>true,//true
            'enableCsrfValidation'=>true, //true
            'csrfTokenName'=>'lc_csrf',
            'noCsrfValidationRoutes'=>array(
                'api/service',
            ),

        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=xoso',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        /*
        'mongodb' => array(
            'class'            => 'EMongoClient',
            'db'           => 'xoso',
            'server'           => 'mongodb://127.0.0.1:27017' //default
            //'options'  => array(.....); 
        ),*/
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                '/trang-chu.html'=>'site/index',
                ''=>'site/index',
                '/'=>'site/index',
                '/xo-so-mien-nam.html'=>'site/xosomiennam',
                '/xo-so-mien-trung.html'=>'site/xosomientrung',
                '/xo-so-mien-bac.html'=>'site/xosomienbac',
                '/xo-so-truc-tiep/mien-nam.html'=>'site/onlinenam',
                '/xo-so-truc-tiep/mien-trung.html'=>'site/onlinetrung',
                '/xo-so-truc-tiep/mien-bac.html'=>'site/onlinebac',
                '/ket-qua-xo-so/<ngay>.html'=>'site/xosongay',
                '/ket-qua-xo-so/<id:[0-9]{1,2}>/ket-qua-xo-so-theo-tinh.html'=>'site/xosotinh',
                '/in-ve-do.html'=>'site/in',
                '/in-ve.html'=>'site/inve',
                '/location/<language:\w+>'=>'site/location',
                '/<_a:(login|logout|signup|forgot)>'=>'site/<_a>',
                '/do-ve-so-online.html'=>'site/online',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'info, error, warning',
                ),
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);

