<?php

/**
 * Configuration for the mongoDB connection in config/main.php
 * The properties $server and $options are passed to the constructor
 * Mongo::__construct
 * <h2> Configuration </h2>
 * Add as component to config/main.php. The connectionId 'mongodb' 
 * is the default component used by EDMSBehavior
 *
 * <pre class="prettyprint">
 * 'components'=>array(
 *    'mongodb' => array(
 *    'class'            => 'MongoConnection',
 *    'dbName'           => 'testDB',
 *    //'server' => 'mongodb://localhost:27017' //= default
 *  ),
 * </pre>
 * <h2>Usage</h2>
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @category Database
 * @package Extension.MongoDB
 * @version 0.1
 * @since 0.1
 */
class MongoConnection extends CApplicationComponent
{

	/**
	 * @var string the server connection string from the PHP manual Mongo::__construct
	 * default is "mongodb://localhost:27017" when set to null
	 */
	public $server = null;

	/**
	 * @var array the options from the PHP manual Mongo::__construct
	 */
	public $options = array(
						  'connect' => true,
						  'timeout' => 5000,
						  'replicaSet' => null,
					      'username' => null,
					      'password' => null,
					      'db' => null, //db to authenticate
					);

	/**
	 * @var string required: the database to use
	 */
	public $dbName;

	//internal memory caching
	protected static $_instance;
	protected static $_mongo;

	/**
	 * Get raw edmsMongoDb instance
	 *
	 * @return edmsMongoDb
	 */
	public static function instance($connectionId)
	{
		if (!isset(self::$_instance))
			self::$_instance = array();

		if (!isset(self::$_instance[$connectionId]))
		{
			$component = Yii::app()->getComponent($connectionId);

			if ($component instanceof MongoConnection)
				self::$_instance[$connectionId] = $component;
			else //use YiiMongoDbSuite EMongoDB config
				if ($component instanceof EMongoDB)
				{
					$connection = new MongoConnection();
					$connection->server = $component->connectionString;
					$connection->dbName = $component->dbName;

					if ($component->autoConnect == false)
						$connection->options['connect'] = false;

					self::$_instance[$connectionId] = $connection;
				}
			else
				throw new YMongoException("Invalid connectionId: $connectionId");
		}

		return self::$_instance[$connectionId];
	}


	/**
	 * Returns edmsMongo connection instance if not exists will create new
	 *
	 * @return edmsMongo
	 * @throws EMongoException
	 * @since v1.0
	 */
	public function getMongo()
	{
		if (!isset(self::$_mongo))
		{
			try
			{
				if(empty($this->dbName))
					throw new YMongoException('No database configured');

				//remove keys with null values
				$options = array();
				foreach ($this->options as $key =>$value)
					if (isset($value))
						$options[$key]=$value;

				if (!isset($this->server))
					$this->server = 'mongodb://localhost:27017';

				self::$_mongo = new Mongo($this->server, $options);

			}
			catch(MongoConnectionException $e)
			{
				throw new YMongoException('Failed to create class edmsMongo: ' . $e->getMessage());
			}
		}

		return self::$_mongo;
	}

}
