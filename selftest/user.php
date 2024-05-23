<?php
/** op-unit-notfound:/selftest/user.php
 *
 * @created   2019-02-04
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

//	...
$config = Config::Get('notfound');

//	...
if( empty($config['database']) and isset($config['dsn']) ){
	Load('DSN');
	$config['database'] = DSN($config['dsn']);
}

//	...
$host     = $config['database']['host'];
$user     = $config['database']['user'];
$password = $config['database']['password'];
$database = $config['database']['database'];
$charset  = $config['database']['charset'];

//  User configuration.
$configer->User([
	'host'     => $host,
	'name'     => $user,
	'password' => $password,
	'charset'  => $charset,
]);

//  Privilege configuration.
$configer->Privilege([
	'host'     => $host,
	'user'     => $user,
	'database' => $database,
	'table'    => 't_host, t_uri, t_ua, t_ua_os, t_ua_browser, t_notfound',
	'privilege'=> 'insert, select, update, delete',
	'column'   => '*',
]);
