<?php
/** op-unit-notfound:/selftest/config.php
 *
 * @created   2019-02-02
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** use
 *
 */

/* @var $configer \OP\UNIT\SELFTEST\Configer */
$configer = Unit('Selftest')->Configer();

//	...
include(__DIR__.'/database.php');
include(__DIR__.'/user.php');

//	Table
include(__DIR__.'/t_host.php');
include(__DIR__.'/t_uri.php');
include(__DIR__.'/t_ua.php');
include(__DIR__.'/t_ua_os.php');
include(__DIR__.'/t_ua_browser.php');
include(__DIR__.'/t_notfound.php');

//	...
return $configer->Get();
