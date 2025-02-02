<?php
/** op-unit-notfound:/config.php
 *
 * @created   2020-08-23
 * @version   1.0
 * @package   op-unit-notfound
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Execution flag.
 *
 * @created   2020-08-23
 * @var       boolean      $execute
 */
$execute = true;

/** Database of Data Source Name.
 *
 * @created   2020-08-23
 * @var       string       $dsn
 */
$database = [];
$database['prod']     = 'mysql';
$database['host']     = 'localhost';
$database['user']     = 'notfound';
$database['password'] = 'password';
$database['database'] = 'onepiece';
$database['charset']  = 'utf8';

/** Where is the data stored?
 *
 * 1. apcu
 * 1. memcache
 * 1. database
 * 1. mongodb
 *
 * @created   2024-05-18
 * @var       string       $store
 */
$store = 'apcu';

/** Return config array.
 *
 * @created   2020-08-21
 * @return    array        $config
 */
return [
	'store'    => $store,
	'execute'  => $execute,
	'database' => $database,
];
