<?php
/**
 * unit-notfound:/selftest/t_ua_os.php
 *
 * @creation  2019-02-05
 * @version   1.0
 * @package   unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
/* @var $app \OP\UNIT\App */

//  Table configuration.
$app->Unit('selftest')->Config()->Set('table', [
	'name'		 => 't_ua_os',
	'charset'	 => 'utf8',
	'collate'	 => 'utf8mb4_general_ci',
	'comment'	 => 'Stack each host name.',
]);

//  Auto incrment id.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    =>  'ai',
	'ai'      =>  true,
	'comment' => 'Auto increment id.',
]);

//  Reference of t_ua.ai.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'ua',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  false,
	'comment'	 => 'Reference of t_ua.ai.',
	'reference'	 => 't_ua.ai',
	'unique'	 =>  true,
]);

//  OS.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'os',
	'type'		 => 'enum',
	'length'	 => 'win, mac, linux, bsd, ios, android',
	'null'		 =>  true,
	'collate'	 => 'ascii_general_ci',
	'comment'	 => 'OS name. Unknown OS is null.',
]);

//  OS version.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'version',
	'type'		 => 'decimal',
	'length'	 => '5,2',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'OS version.',
]);

//  Timestamp.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'timestamp',
	'type'		 => 'timestamp',
	'comment'	 => 'On update current timestamp.',
]);
