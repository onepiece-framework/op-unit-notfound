<?php
/** op-unit-notfound:/NotFound.class.php
 *
 * @created    2024-05-18
 * @version    1.0
 * @package    op-unit-notfound
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
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
use OP\OP_UNIT;
use OP\IF_UNIT;

/** NotFound
 *
 * @created    2024-05-18
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class NotFound implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_UNIT, OP_CI;

	/** Auto
	 *
	 * @created    2024-05-18
	 */
	static function Auto()
	{
		//	...
		if( self::Blacklist() ){
			return;
		}

		//	...
		switch( $store = OP()->Config('notfound')['store'] ?? null ){
			//	...
			case 'apcu':
				require_once(__DIR__.'/function/apcu.php');
				NOTFOUND\apcu();
				break;
			default:
				D($store);
		}
	}

	/** Blacklist
	 *
	 * @created    2024-05-22
	 * @param      string
	 * @return     boolean
	 */
	static function Blacklist(?string $uri='') : bool
	{
		//	...
		if( $uri ){
			//	...
		}else if( OP()->Env()->isCI() ){
			$uri = '/CICD/';
		}else{
			$uri = $_SERVER['REQUEST_URI'];
		}

		//	...
		$parsed = OP()->ParseURL($uri);
		$path   = $parsed['path'];
		$list   = file_get_contents(__DIR__.'/config/blacklist.txt');
		$hit    = strpos($list, $path);

		//	...
		if( $hit ){
			OP()->Blacklist("op-unit-notfound: $path");
		}

		//	...
		return $hit ? true: false;
	}
}
