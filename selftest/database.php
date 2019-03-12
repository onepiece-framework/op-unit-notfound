<?php
/**
 * unit-notfound:/selftest/database.php
 *
 * @creation  2019-02-02
 * @version   1.0
 * @package   unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
/* @var $app \OP\UNIT\App */

//	...
$config = $app->Env()->Get('notfound');

//  DSN configuration.
$app->Unit('selftest')->Config()->DSN([
	'host'     => $config['host'] ?? 'localhost',
	'product'  => $config['prod'] ?? 'mysql',
	'port'     => $config['port'] ?? '3306',
]);

//  Database configuration.
$app->Unit('selftest')->Config()->Database([
	'name'     => $config['database'] ?? 'onepiece',
	'charset'  => $config['charset']  ?? 'utf8',
	'collate'  => $config['collate']  ?? 'utf8mb4_general_ci',
]);
