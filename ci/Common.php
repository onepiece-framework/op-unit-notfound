<?php
/** op-unit-notfound:/ci/Common.php
 *
 * @created     2024-04-11
 * @version     1.0
 * @package     op-unit-notfound
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\UNIT\NOTFOUND;

/* @var $ci \OP\UNIT\CI\CI_Config */
$ci = OP()->Unit('CI')->Config();

//	...
$method = 'Template';
$arg1   = 'foo';
$arg2   = 'bar';
$args   = ['ci.phtml',['arg1'=>$arg1, 'arg2'=>$arg2]];
$result = $arg1 . $arg2;
$ci->Set($method, $result, $args);

//	...
$method = 'DSN';
$args   =  null;
$result = 'Notice: parse_url(): Passing null to parameter #1 ($url) of type string is deprecated';
$ci->Set($method, $result, $args);

//	...
$method = '_Config';
$args   =  null;
$result = [
	'prod'     => 'mysql',
	'host'     => 'localhost',
	'user'     => 'notfound',
	'password' => 'password',
	'database' => 'onepiece',
	'charset'  => 'utf8',
];
$ci->Set($method, $result, $args);

//	...
$method = 'DB';
$args   =  null;
$result = 'Notice: The path of socket is not set in "php.ini".
Please set to "pdo_mysql.default_socket".';
$ci->Set($method, $result, $args);

//	...
$method = 'Hash';
$args   = 'test';
$result = '5006d6f830';
$ci->Set($method, $result, $args);

//	...
return $ci->Get();
