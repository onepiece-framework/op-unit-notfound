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
		self::Blacklist();

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
	 */
	static function Blacklist()
	{
		//	...
		$parsed = OP()->ParseURL($_SERVER['REQUEST_URI']);
		$path   = $parsed['path'];
		$list   = file_get_contents(__DIR__.'/config/blacklist.txt');
		$hit    = strpos($list, $path);
		//	...
		if( $hit ){
			$_SESSION[_OP_CORE_BLACKLIST_] = 'unit:/NotFound::Blacklist()';
		}
	}
}
