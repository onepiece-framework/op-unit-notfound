<?php
/** op-unit-notfound:/Admin.class.php
 *
 * @created   2019-02-04
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
use OP\OP_CORE;
use OP\IF_UNIT;
use OP\IF_FORM;
use OP\Env;
use OP\Unit;
use OP\OP_CI;

/** Admin
 *
 * @creation  2019-02-04
 * @version   1.0
 * @package   unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Admin implements IF_UNIT
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

	/** Will execute automatically of Admin.
	 *
	 */
	static function Auto()
	{
		//	...
		if(!$db = Common::DB() ){
			//	...
			return;
		};

		//	...
		if( false ){
			D($db);
		}

		/*
		//	Get selftest result.
		if(!$io = Cookie::Get(__METHOD__) ){
			if(!$io = self::Selftest($db) ){
				return $io;
			};
		};

		//	Save selftest result.
		Cookie::Set(__METHOD__, true, 60*60*24);
		*/

		/* @var $form IF_FORM */
		$form = self::Form();

		//	...
		return include(__DIR__.'/admin/admin.phtml');
	}

	/** Form
	 *
	 */
	static function Form()
	{
		/* @var $form IF_FORM */
		static $form;

		//	...
		if(!$form ){
			/*
			//	...
			if(!Unit::isInstalled('form') ){
				throw new \Exception("op-unit-form is not installed.");
			}
			*/

			//	...
			$form = Unit::Instantiate('Form');
			$form->Config(__DIR__.'/admin/config.form.php');

			//	...
			if( Env::isAdmin() ){
				if(!$form->Test() ){
					D('$form->Test() was failed.');
				};
			};
		};

		//	...
		return $form;
	}

	/** Will execute automatically of Selftest.
	 *
	 * @return boolean
	 */
	static function Selftest()
	{
		//	...
		if(!include_once(__DIR__.'/Selftest.class.php') ){
			return false;
		}

		//	...
		return Selftest::Auto();
	}

	/** Get t_notfound record at host.
	 *
	 * @return	 array		 $record
	 */
	static function GetRecordAtHost():array
	{
		//	...
		$form    = self::Form();

		//	...
		$host    = $form->GetValue('host');
		$date_st = $form->GetValue('date-st');
		$date_en = $form->GetValue('date-en');

		//	...
		if(!$host){
			return [];
		};

		//	...
		$hash    = Common::Hash($host);
		$DB      = Common::DB();
		$ai      = $DB->Quick(" ai <- t_host.hash = $hash ", ['limit'=>1]);

		//	...
		if(!$ai ){
			return [];
		};

		//	...
		$config = [];
		$config['table'] = 't_notfound.uri <= t_uri.ai';
		$config['limit'] = 100;
		$config['where'][] = "t_notfound.host = $ai";
		$config['field'][] = "t_notfound.ai  as ai     ";
		$config['field'][] = "t_notfound.uri as uri_ai ";
		$config['field'][] = "t_uri.uri      as uri    ";
		$config['field'][] = "t_notfound.timestamp  as timestamp ";
		$config['field'][] = "    t_notfound.count  as count     ";
//		$config['field'][] = "sum(t_notfound.count) as count     ";
//		$config['order'] = 'count desc';
//		$config['group'] = 't_notfound.uri';

		if( $date_st ){ $config['where'][] = "t_notfound.timestamp >= $date_st 00:00:00"; };
		if( $date_en ){ $config['where'][] = "t_notfound.timestamp <= $date_en 23:59:59"; }; // 60 is Leap seconds. --> MySQL 8.0 is not support.

		//	...
		if( Env::isAdmin() ){
			self::$_debug['config'][] = $config;
		};

		//	...
		return $DB->Select($config);
	}

	/** Get t_uri record at uri.
	 *
	 * @return	 array		 $record
	 */
	static function GetRecordAtURI():array
	{
		//	...
		if(!$uri = $_GET['uri'] ?? null ){
			return [];
		};

		//	...
		$config = [];
		$config['limit'] = 100;
		$config['order'] = 'count desc';
		$config['where'][] = "t_notfound.uri = $uri";

		//	...
		$config['table'] = '  t_notfound.uri <= t_uri.ai'
						 . ', t_notfound.ua  <= t_ua.ai'
						 . ', t_ua.os        <= t_ua_os.ai'
						 . ', t_ua.browser   <= t_ua_browser.ai';
		//	...
		 $config['field'][] = 't_notfound.count     as count';
		 $config['field'][] = 't_ua_os.os           as os';
		 $config['field'][] = 't_ua_os.version      as os_version';
		 $config['field'][] = 't_ua_browser.browser as browser';
		 $config['field'][] = 't_ua_browser.version as browser_version';
		 $config['field'][] = 'concat(t_ua_os.os, " ", t_ua_os.version) as OS';
		 $config['field'][] = 'concat(t_ua_browser.browser, " ", t_ua_browser.version) as Browser';

		//	...
		return Common::DB()->Select($config);
	}
}
