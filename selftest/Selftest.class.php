<?php
/**
 * unit-notfound:/Selftest.class.php
 *
 * @creation  2019-02-04
 * @version   1.0
 * @package   unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @creation  2019-02-04
 */
namespace OP\UNIT\NOTFOUND;

/** Selftest
 *
 * @creation  2019-02-04
 * @version   1.0
 * @package   unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Selftest
{
	/** trait.
	 *
	 */
	use \OP\OP_CORE;

	/** Will execute automatically of Selftest.
	 *
	 */
	static function Auto()
	{
		//	...
		include(__DIR__.'/config.php');

		//	...
		$selftest = self::Unit('selftest');
		$selftest->Auto();

		//	...
		return $selftest->isResult();
	}
}
