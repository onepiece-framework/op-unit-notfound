<?php
/** op-unit-notfound:/NotFound2020.trait.php
 *
 * @created   2019-01-29
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP\UNIT;

/** use
 *
 */
use OP\OP_CI;
use OP\OP_CORE;

/** NotFound
 *
 * @created   2019-01-29
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait NotFound2020
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** Debug.
	 *
	 * @var array
	 */
	static private $_debug;

	/** Automatically.
	 *
	 */
	static function Auto()
	{
		$host = self::_Host();
		$uri  = self::_URI();
		$ua   = self::_UA();
				self::_NotFound($host, $uri, $ua );
	}

	/** Host name
	 *
	 * @return	 int		 $ai
	 */
	static private function _Host() : int
	{
		//	Get database unit.
		if( $DB= NOTFOUND\Common::DB() ){
		//	...
		$table = 't_host';
		$host  = $_SERVER['SERVER_NAME'];
	//	$port  = $_SERVER['SERVER_PORT'];
		$hash  = NOTFOUND\Common::Hash($host);

		//	...
		if( $ai = $DB->Quick(" ai <- {$table}.hash = {$hash} ", ['limit'=>1]) ){
			//	Exists
		}else{
			//	...
			$config = [];
			$config['table'] = $table;
			$config['set']['hash'] = $hash;
			$config['set']['host'] = $host;

			//	...
			$ai = $DB->Insert($config);
		};
		} // if( $DB ){ ... }

		//	...
		return $ai ?? 0;
	}

	/** URI
	 *
	 * @return	 int		 $ai
	 */
	static private function _URI() : int
	{
		//	Get database unit.
		if( $DB= NOTFOUND\Common::DB() ){
		//	...
		$uri   = $_SERVER['REQUEST_URI'];

		//	...
		if( $pos  = strpos($uri, '?') ){
			$path = substr($uri, 0, $pos);
		}else{
			$path = $uri;
		}

		//	...
		$table = 't_uri';
		$hash  = NOTFOUND\Common::Hash($path);

		//	...
		if( $ai = $DB->Quick(" ai <- {$table}.hash = {$hash} ", ['limit'=>1]) ){
			//	Exists
		}else{
			//	...
			$config = [];
			$config['table'] = $table;
			$config['set']['hash'] = $hash;
			$config['set']['uri']  = $path;

			//	...
			$ai = $DB->Insert($config);
		};
		} // if( $DB ){ ... }

		//	...
		return $ai ?? 0;
	}

	/** User agent
	 *
	 * @return	 int		 $ai
	 */
	static private function _UA() : int
	{
		//	Get database unit.
		if( $DB= NOTFOUND\Common::DB() ){
		//	...
		$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

		//	...
		$table = 't_ua';
		$hash  = NOTFOUND\Common::Hash($ua);

		//	Get ai, Insert if does not exist.
		if(!$ai = $DB->Quick(" ai <- {$table}.hash = {$hash} ", ['limit'=>1]) ){
			//	...
			$config = [];
			$config['table'] = $table;
			$config['set']['hash']    = $hash;
			$config['set']['ua']      = $ua;

			//	...
			$ai = $DB->Insert($config);
		};

		//	Get t_ua record.
		$record = $DB->Quick(" {$table}.ai = {$ai} ", ['limit'=>1]);

		//	If has not been set, it set.
		if(!$record['os'] or !$record['browser'] ){
			//	...
			$config = [];
			$config['table'] = $table;
			$config['limit'] = 1;
			$config['where'][] = " ai = $ai ";

			//	...
			if(!$record['os'] ){
				$config['set']['os']      = self::_OS($ai, $ua);
			};

			//	...
			if(!$record['browser'] ){
				$config['set']['browser'] = self::_Browser($ai, $ua);
			};

			//	...
			$DB->Update($config);
		};
		} // if( $DB ){ ... }

		//	...
		return $ai ?? 0;
	}

	/** OS
	 *
	 * @param	 integer	 $ua_ai
	 * @param	 string		 $ua
	 * @return	 int|null	 $ai
	 */
	static private function _OS( $ua_ai, $ua ) : ?int
	{
		//	...
		$table = 't_ua_os';

		//	Search OS name and OS version.
		$m = [];
		foreach( include(__DIR__.'/config/os.php') as $os => $preg ){
			//	...
			if( preg_match("/$preg/", $ua, $m) ){
				//	...
				$version = $m[1].'.'.$m[2];
				break;
			};
		};

		//	If they do not match, it returns.
		if( empty($version) ){
			return null;
		};

		//	Select config.
		$config = [];
		$config['table'] = $table;
		$config['limit'] = 1;
		$config['where'][] = "os = $os";
		$config['where'][] = "version = $version";

		//	Insert if does not exist.
		if( NOTFOUND\Common::DB()->Count($config) === 0 ){
			$config = [];
			$config['table'] = $table;
			$config['set'][] = "ua = $ua_ai";
			$config['set'][] = "os = $os";
			$config['set'][] = "version = $version";
			$ai = NOTFOUND\Common::DB()->Insert($config);
		};

		//	...
		return $ai ?? 0;
	}

	/** Browser
	 *
	 * @param	 integer	 $ua_ai
	 * @param	 string		 $ua
	 * @return	 int|null	 $ai
	 */
	static private function _Browser( $ua_ai, $ua ) : ?int
	{
		//	...
		$table = 't_ua_browser';

		//	...
		$m = [];
		foreach( include(__DIR__.'/config/browser.php') as $browser => $preg ){
			//	...
			if( preg_match("/$preg/", $ua, $m) ){
				//	...
				$version = $m[1].'.'.$m[2];
				break;
			};
		};

		//	If they do not match, it returns.
		if( empty($version) ){
			return null;
		};

		//	...
		$config = [];
		$config['table'] = $table;
		$config['limit'] = 1;
		$config['where'][] = "browser = $browser";
		$config['where'][] = "version = $version";

		//	Insert if does not exist.
		if( NOTFOUND\Common::DB()->Count($config) === 0 ){
			$config = [];
			$config['table'] = $table;
			$config['set'][] = "ua = $ua_ai";
			$config['set'][] = "browser = $browser";
			$config['set'][] = "version = $version";
			$ai = NOTFOUND\Common::DB()->Insert($config);
		}

		//	...
		return $ai ?? null;
	}

	/** NotFound
	 *
	 * @param	 string		 $host
	 * @param	 string		 $uri
	 * @param	 string		 $ua
	 * @return	 int		 $count
	 */
	static private function _NotFound(int $host, int $uri, int $ua ) : int
	{
		//	Get database unit.
		if( $DB= NOTFOUND\Common::DB() ){
		//	...
		$table = 't_notfound';

		//	...
		$config = [];
		$config['table'] = $table;
		$config['where'][] = "host = $host";
		$config['where'][] = "uri  = $uri";
		$config['where'][] = "ua   = $ua";
		$config['limit'] = 1;

		//	...
		$count = ( $record = $DB->Select($config) ) ? $record['count']: 0;
		$count++;

		//	...
		if( $count === 1 ){
			//	insert
			$config['set'] = $config['where'];
			$config['set'][] = "count = $count";
			unset($config['where']);
			unset($config['limit']);

			//	...
			$DB->Insert($config);
		}else{
			//	update
			$config['set'][] = "count = $count";

			//	...
			$DB->Update($config);
		};
		} // if( $DB ){ ... }

		//	...
		return $count ?? 0;
	}

	/** Will execute automatically of Admin.
	 *
	 */
	static function Admin()
	{
		include_once(__DIR__.'/Admin.class.php');
		NOTFOUND\Admin::Auto();
	}
}
