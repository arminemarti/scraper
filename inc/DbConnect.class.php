<?php
/**
 * DB connection class - singleton
*/
class DbConnect
{
	/**
	 * @var mixed - object instance
	*/
	private static $_mInstance;

	/**
	 * @var mixed - DB connection link (PDO object)
	*/
    public $mDbh;

	/**
	 * Constructor
	*/
    public function __construct ()
    {
		try
		{			
			$dsn = 'mysql:host='.DB_HOST.';dbname='. DB_NAME;
			$user = DB_USER;
			$pass = DB_PASS;
			
			$this->mDbh = new PDO($dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		catch (Exception $e)
		{
			echo 'Connection failed: ' . $e->getMessage();
			$this->mDbh = false;
		};
    }

	/**
	 * Get/create object instance
	 *
	 * @return mixed - object instance
	*/
    public static function GetInstance()
    {
        if (!isset(self::$_mInstance)){
	        self::$_mInstance = new self();
        }

        return self::$_mInstance;
    }
}
?>