<?php
/** op-unit-notfound:/Common.class.php
 *
 * @created   2019-02-06
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP\UNIT\NOTFOUND;

/** use
 *
 */
use OP\OP_CI;
use OP\OP_CORE;
use OP\IF_DATABASE;
use OP\Config;
use function OP\Unit;
use function OP\Hasha1;

/** Common
 *
 * @created   2019-02-06
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Common
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** Parse config from DSN format.
	 *
	 * @param	 string		 $dsn
	 * @return	 array		 $config
	 */
	static function DSN($dsn)
	{
		//	...
		if( $config = parse_url($dsn) ){
			//	...
			$config['prod']		 = $config['scheme'] ?? null;

			//	...
			if( $config['pass'] ?? null ){
				$config['password'] = $config['pass'];
			};

			//	...
			if( empty($config['port']) ){
				$config['port']	 = '3306';
			};

			//	...
			if( isset($config['query']) ){
				$query = [];
				parse_str($config['query'], $query);
				foreach( $query as $key => $val ){
					$config[$key] = $val;
				};
			};
		};

		//	...
		unset($config['scheme']);
		unset($config['pass']);

		//	...
		return $config;
	}

	/** Get configuration.
	 *
	 * @return	 array		 $config
	 */
	static private function _Config()
	{
		//	Get config from Env.
		if(!$config = Config::Get('notfound')['database'] ){
		//	$this->Unit('notfound')->Help('Setup');
			throw new \Exception("See README.md at Setup section.");
		};

		/** The DSN function has been abolished.
		 *
		//	If given DSN.
		if( $dsn = $config['dsn'] ?? null ){
			//	Parse DSN.
			$config = array_merge(self::DSN($dsn), $config);
			$config['dsn'] = null;

			//	Save parse result.
		//	Config::Set('notfound', $config);
		};
		*/

		//	...
		foreach( ['prod','host','user','password','database'] as $key ){
			if( empty($config[$key]) ){
				throw new \Exception("Config has not been set this value. ($key)");
			};
		};

		//	...
		return $config;
	}

	/** Get IF_DATABASE object.
	 *
	 * @return IF_DATABASE
	 */
	static function DB()
	{
		/* @var $_DB IF_DATABASE */
		static $_DB;

		//	...
		if(!$_DB ){
			$_DB = Unit('Database');
			$_DB->Connect( self::_Config() );
		};

		//	...
		return $_DB->isConnect() ? $_DB: false;
	}

	/** Generate common hash.
	 *
	 * @param	 string		 $str
	 * @return	 string		 $hash
	 */
	static function Hash(string $str):string
	{
		/** CAUTION
		 *
		 *  Salt is commonlize.
		 *  Because that for sharing with all applications.
		 *
		 */
		return Hasha1($str, 10, '');
	}
}
