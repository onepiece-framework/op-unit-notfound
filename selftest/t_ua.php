<?php
/** op-unit-notfound:/selftest/t_ua.php
 *
 * @created   2019-02-05
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

 /* @var $configer object */

//  Table configuration.
$configer->Set('table', [
	'name'    => 't_ua',
	'charset' => 'utf8',
	'collate' => 'utf8mb4_general_ci',
	'comment' => 'Stack each host name.',
]);

//  Auto incrment id.
$configer->Set('column', [
	'name'    =>  'ai',
	'ai'      =>  true,
	'comment' => 'Auto increment id.',
]);

//  Hash key.
$configer->Set('column', [
	'name'    => 'hash',
	'type'    => 'char',
	'length'  =>     10,
	'null'    =>  false,
	'collate' => 'ascii_general_ci',
	'comment' => 'Hash by user agent.',
	'unique'  =>   true,
]);

//  User agent.
$configer->Set('column', [
	'name'    => 'ua',
	'type'    => 'text',
	'null'    =>  false,
	'collate' => 'ascii_general_ci',
	'comment' => 'User agent.',
]);

//  Reference of t_ua_os.ai.
$configer->Set('column', [
	'name'		 => 'os',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'Reference of t_ua_os.ai.',
	'reference'	 => 't_ua_os.ai',
	'unique'	 =>  true,
]);

//  Reference of t_ua_os.ai.
$configer->Set('column', [
	'name'		 => 'browser',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'Reference of t_ua_browser.ai.',
	'reference'	 => 't_ua_browser.ai',
	'unique'	 =>  true,
]);

//  Timestamp.
$configer->Set('column', [
	'name'    => 'timestamp',
	'type'    => 'timestamp',
	'comment' => 'On update current timestamp.',
]);

//--------------------------------------------//

//  Search unique index key.
$configer->Set('index', [
	'name'    => 'hash',
	'type'    => 'unique',
	'column'  => 'hash',
	'comment' => 'unique index key',
]);
