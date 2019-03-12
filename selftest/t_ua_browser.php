<?php
/**
 * unit-notfound:/selftest/t_ua_browser.php
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
	'name'    => 't_ua_browser',
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

//  Reference of t_ua.ai.
$app->Unit('selftest')->Config()->Set('column', [
	'name'      => 'ua',
	'type'      => 'int',
	'unsigned'  =>  true,
	'null'      =>  false,
	'comment'   => 'Reference of t_ua.ai.',
	'reference' => 't_ua.ai',
	'unique'    =>  true,
]);

//  Browser name.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    => 'browser',
	'type'    => 'enum',
	'length'  => 'ie, edge, chrome, firefox, safari, opera, vivaldi, googlebot, cfnetwork, kinza',
	'null'    =>  true,
	'collate' => 'ascii_general_ci',
	'comment' => 'browser name. Unknown browser is null.',
]);

//  Browser version.
$app->Unit('selftest')->Config()->Set('column', [
	'name'		 => 'version',
	'type'		 => 'decimal',
	'length'	 => '5,2',
	'unsigned'	 =>  true,
	'null'		 =>  true,
	'comment'	 => 'Browser version.',
]);

//  Timestamp.
$app->Unit('selftest')->Config()->Set('column', [
	'name'    => 'timestamp',
	'type'    => 'timestamp',
	'comment' => 'On update current timestamp.',
]);
