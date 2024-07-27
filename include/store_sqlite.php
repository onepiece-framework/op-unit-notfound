<?php
/** op-unit-notfound:/include/store_sqlite.php
 *
 * @created    2024-07-27
 * @version    1.0
 * @package    op-unit-notfound
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\UNIT\NOTFOUND;

/* @var $qql \OP\UNIT\QQL */
$qql = OP()->Unit('QQL');

//	...
if(!$url = $_SERVER['REQUEST_URI'] ?? null ){
	//	CI
	return;
}

//	...
if(!$qql->Open('NotFound.sqlite3') ){
	//	Open failed.
	return;
}

//	...
if( $qql->Get("t_url.url = {$url}") ){
	//	Already exists.
	return;
}

//	...
return $qql->Set('t_url', ['url'=>$url]);
