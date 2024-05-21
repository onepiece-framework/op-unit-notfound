<?php
/** op-unit-notfound:/Selftest.class.php
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
use OP\OP_CI;
use OP\OP_CORE;
use OP\IF_UNIT;
use function OP\Unit;

/** Selftest
 *
 * @created   2019-02-04
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Selftest implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** Will execute automatically of Selftest.
	 *
	 */
	static function Auto()
	{
		if( $io = $selftest = Unit('Selftest') ){
			$io = $selftest->Auto(__DIR__.'/selftest/config.php');
		};

		//	...
		return $io;
	}
}
