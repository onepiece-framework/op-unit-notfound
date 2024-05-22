<?php
/** op-unit-notfound:/selftest/database.php
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

/* @var $configer object */
$config = Config::Get('notfound')['database'];

//  DSN configuration.
$configer->DSN([
	'host'     => $config['host'] ?? 'localhost',
	'product'  => $config['prod'] ?? 'mysql',
	'port'     => $config['port'] ?? '3306',
]);

//  Database configuration.
$configer->Database([
	'name'     => $config['database'] ?? 'onepiece',
	'charset'  => $config['charset']  ?? 'utf8',
	'collate'  => $config['collate']  ?? 'utf8mb4_general_ci',
]);
