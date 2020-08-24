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
$dsn = 'mysql://notfound:password@localhost:3306?database=onepiece&charset=utf8';

/** Return config array.
 *
 * @created   2020-08-21
 * @return    array        $config
 */
return [
	'execute'  => $execute,
	'dsn'      => $dsn,
];
