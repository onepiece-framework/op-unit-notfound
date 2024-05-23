<?php
/** op-unit-notfound:/selftest/t_ua_os.php
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
	'name'		 => 't_ua_os',
	'charset'	 => 'utf8',
	'collate'	 => 'utf8mb4_general_ci',
	'comment'	 => 'Stack each host name.',
]);

//  Auto incrment id.
$configer->Set('column', [
	'name'    =>  'ai',
	'ai'      =>  true,
	'comment' => 'Auto increment id.',
]);

//  Reference of t_ua.ai.
$configer->Set('column', [
	'name'		 => 'ua',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  false,
	'comment'	 => 'Reference of t_ua.ai.',
	'reference'	 => 't_ua.ai',
	'unique'	 =>  true,
]);

//  OS.
$configer->Set('column', [
	'name'		 => 'os',
	'type'		 => 'enum',
	'length'	 => 'win, mac, linux, bsd, ios, android',
	'null'		 =>  true,
	'collate'	 => 'ascii_general_ci',
	'comment'	 => 'OS name. Unknown OS is null.',
]);

//  OS version.
$configer->Set('column', [
	'name'		 => 'version',
	'type'		 => 'decimal',
	'length'	 => '5,2',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'OS version.',
]);

//  Timestamp.
$configer->Set('column', [
	'name'		 => 'timestamp',
	'type'		 => 'timestamp',
	'comment'	 => 'On update current timestamp.',
]);
