<?php
/**
 * unit-notfound:/selftest/t_ua.php
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
	'name'    => 't_ua',
	'charset' => 'utf8',
	'collate' => 'utf8mb4_general_ci',
	'comment' => 'Stack each host name.',
]);

//  Auto incrment id.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    =>  'ai',
	'ai'      =>  true,
	'comment' => 'Auto increment id.',
]);

//  Hash key.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    => 'hash',
	'type'    => 'char',
	'length'  =>     10,
	'null'    =>  false,
	'collate' => 'ascii_general_ci',
	'comment' => 'Hash by user agent.',
	'unique'  =>   true,
]);

//  User agent.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    => 'ua',
	'type'    => 'text',
	'null'    =>  false,
	'collate' => 'ascii_general_ci',
	'comment' => 'User agent.',
]);

//  Reference of t_ua_os.ai.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'os',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'Reference of t_ua_os.ai.',
	'reference'	 => 't_ua_os.ai',
	'unique'	 =>  true,
]);

//  Reference of t_ua_os.ai.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'browser',
	'type'		 => 'int',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'Reference of t_ua_browser.ai.',
	'reference'	 => 't_ua_browser.ai',
	'unique'	 =>  true,
]);

//  Timestamp.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    => 'timestamp',
	'type'    => 'timestamp',
	'comment' => 'On update current timestamp.',
]);

//  Auto incrment id.
$app->Unit('selftest')->Config()->Set('index', [
	'name'    => 'ai',
	'type'    => 'ai',
	'column'  => 'ai',
	'comment' => 'auto incrment',
]);

//  Search unique index key.
$app->Unit('selftest')->Config()->Set('index', [
	'name'    => 'hash',
	'type'    => 'unique',
	'column'  => 'hash',
	'comment' => 'unique index key',
]);
