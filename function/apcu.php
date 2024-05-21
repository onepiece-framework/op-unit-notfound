<?php
/** op-unit-notfound:/function/apcu.php
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
namespace OP\UNIT\NOTFOUND;

/** use
 *
 */

/** NotFound
 *
 * @created    2024-05-18
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
function apcu()
{
	//	...
	if(!apcu_enabled() ){
		op()->Notice("APCu is disabled.");
		return;
	}

	//	...
	$apcu_key = 'op-unit-notfound';
	$parsed   = OP()->ParseURL($_SERVER['REQUEST_URI']);
	$path     = $parsed['path'];
	$path_key = md5($path);
	$path_key = substr($path_key, 0, 10);

	//	...
	if(!$apcu = apcu_fetch($apcu_key) ){
		$apcu = [];
	}

	//	...
	if( empty($apcu[$path_key]) ){
		//	...
		$apcu[$path_key] = [
			'path'  => $path,
			'count' => 0,
		];

		//	...
		OP()->Notice("404 NotFound: {$_SERVER['REQUEST_URI']}");
	}
	//	...
	$apcu[$path_key]['count']++;

	//	...
	apcu_store($apcu_key, $apcu);
}
