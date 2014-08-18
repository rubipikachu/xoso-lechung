<?php

/**
 * Mongo Behavior which is attached to Yii::app()
 *
 * <h2> Configuration</h2>
 * Install this application behavior in config/main.php
 * <pre class="prettyprint">
 *  'behaviors' => array(
 *      'mongo' => array(
 *  	    'class'=>'MongoBehavior',
 *  	    //'debug'=>true
 *    	 )
 *  ),
 * </pre>
 *
 * <h2>Usage</h2>
 * <pre class="prettyprint">
 *  $db = Yii::app()->mongodb() // Create PHP mongodb class with configured database (in conponent session)
 *  $db->listCollections()
 * </pre>
 
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @category Database
 * @package Extension.MongoDB 
 * @version 0.2.5
 * @since 0.1
 */

class MongoBehavior extends CBehavior
{
    /**
     * The connection id for config in config/main
     * @var string
     */
	public $connectionId = 'mongodb';
    /**
     * Set Mongo::setSlaveOkay after creating Mongo if set
     * @var boolean
     */
	public $setSlaveOkay = null;

	public $debug = true;

	protected static $_connection;
	protected static $_collection;
	protected static $_db;
	protected static $_mongo;


	/**
     * Create the PHP class 'Mongo' with the configured connection (see id 'mongo' in config/main.php)
     * Yii::app()->mongo()
	 *
	 * @param string $connectionId
	 * @return
	 */
	public function mongo($connectionId = null)
	{
		if (!isset(self::$_connection))
			self::$_connection = array();

		if (empty($connectionId))
			$connectionId = $this->getConnectionId();

		if (!isset(self::$_connection[$connectionId]))
		{
		   if ($this->isDebugMode())
		      self::log("Connecting to connectionId: $connectionId","mongodb.debug.connection.$connectionId");

            self::$_connection[$connectionId] =MongoConnection::instance($connectionId)->getMongo();
		}

        self::$_mongo = self::$_connection[$connectionId];
		return self::$_connection[$connectionId];
	}

    /**
     * Return the current Mongo object
     * @return object Mongo
     * @since 0.25
     */
    public function currentMongo()
    {
        return  self::$_mongo;
    }

	/**
	 * Get Database instance
	 * @since v1.0
	 */
	public function mongoDb($dbName=null,$connectionId = null)
	{
		if (empty($dbName))
			$dbName = $this->getDbName($connectionId);

		if (empty($connectionId))
			$connectionId = $this->getConnectionId();

		if (!isset(self::$_db))
			self::$_db = array();

		if (!isset(self::$_db[$connectionId][$dbName]))
		{
			if ($this->isDebugMode())
			   self::log("Selecting db: $connectionId.$dbName","mongodb.debug.db.$dbName.$connectionId");

			$mongo = $this->mongo($connectionId);

            if(isset($this->setSlaveOkay))
                $mongo->setSlaveOkay($this->setSlaveOkay);

            self::$_db[$connectionId][$dbName] =  $mongo->selectDB($dbName);
		}

		return self::$_db[$connectionId][$dbName];
	}

	/**
	 * get current Collection object
	 *
	 * @return mongo Collection
	 */
	public function mongoCollection($collectionName,$dbName=null,$connectionId = null)
	{
		if (empty($dbName))
			$dbName = $this->getDbName($connectionId);

		if (empty($connectionId))
			$connectionId = $this->getConnectionId();


		if (!isset(self::$_collection))
			self::$_collection = array();


		if (!isset(self::$_collection[$connectionId][$dbName][$collectionName]))
		{
			if ($this->isDebugMode())
		 	    self::log("Selecting collection: $collectionName.$dbName.$connectionId",
		 	    	            "mongodb.debug.collection.$connectionId.$dbName.$collectionName");

			$collection = $this->mongoDb($dbName,$connectionId)->selectCollection($collectionName);
			self::$_collection[$connectionId][$dbName][$collectionName] = $collection;
		}

		return self::$_collection[$connectionId][$dbName][$collectionName];
	}

	/**
	 * Returns current Query object
	 *
	 * @return MongoQuery 
	 */
	public function mongoQuery($collectionName,$dbName=null,$connectionId=null)
	{
		if ($this->isDebugMode())
			self::log("Creating MongoQuery: $connectionId/$dbName/$collectionName",
				           "mongodb.debug.query.$connectionId.$dbName.$collectionName");

		return new MongoQuery($collectionName,$dbName,$connectionId);
	}

	/**
	 * MongoBehavior::setConnectionId()
	 *
	 * @param mixed $connectionId
	 * @return
	 */
	public function getConnectionId()
	{
	  return $this->connectionId;
	}

	/**
	 * MongoBehavior::setConnectionId()
	 *
	 * @param mixed $connectionId
	 * @return
	 */
	public function setConnectionId($connectionId)
	{
		if (!empty($connectionId) && $this->getConnectionId() != $connectionId)
		    $this->connectionId = $connectionId;
	}

	/**
	 * MongoBehavior::getDbName()
	 *
	 * @param mixed $connectionId
	 * @return
	 */
	public function getDbName($connectionId = null)
	{
		if (empty($connectionId))
			$connectionId = $this->getConnectionId();

		$connection = MongoConnection::instance($connectionId);
		return $connection->dbName;
	}

	/**
	 * MongoBehavior::getDbName()
	 *
	 * @param mixed $connectionId
	 * @return
	 */
	public function setDbName($dbName,$connectionId = null)
	{
		$this->setConnectionId($connectionId);

		if (!empty($dbName) && $this->getDbName() != $dbName)
			MongoConnection::instance($this->getConnectionId())->dbName = $dbName;
	}

	/**
	 * MongoBehavior::log()
	 *
	 * @param mixed $msg
	 * @return
	 */
	public static function log($msg,$category='info',$level='mongodb')
	{
		Yii::log($msg,$level,$category);
	}

	/**
	 * MongoBehavior::isDebugMode()
	 *
	 * @param mixed $msg
	 * @return
	 */
	public function isDebugMode()
	{
		return $this->debug;
	}
}
