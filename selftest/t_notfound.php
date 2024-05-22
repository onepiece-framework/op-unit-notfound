<?php
/** op-unit-notfound:/selftest/t_notfound.php
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
	'name'    => 't_notfound',
	'charset' => 'utf8',
	'collate' => 'utf8mb4_general_ci',
	'comment' => 'Stack each host name.',
]);

//  Auto incrment id.
$configer->Set('column', [
	'name'    =>  'ai',
	/*
	'type'    => 'int',
	'length'  =>    11,
	'null'    => false,
	'default' =>  null,
	*/
	'ai'      =>  true,
	'comment' => 'Auto increment id.',
]);

//  Count of access.
$configer->Set('column', [
	'name'     => 'count',
	'type'     => 'int',
	'length'   =>  10,
	'unsigned' =>  true,
	'null'     =>  false,
	'comment'  => 'Count of access.',
]);

//  Reference of t_host.ai.
$configer->Set('column', [
	'name'      => 'host',
	'type'      => 'int',
	'unsigned'  =>  true,
	'null'      =>  false,
	'comment'   => 'Reference of t_host.ai.',
	'reference' => 't_host.ai'
]);

//  Reference of t_uri.ai.
$configer->Set('column', [
	'name'      => 'uri',
	'type'      => 'int',
	'unsigned'  =>  true,
	'null'      =>  false,
	'comment'   => 'Reference of t_uri.ai.',
	'reference' => 't_uri.ai'
]);

//  Reference of t_ua.ai.
$configer->Set('column', [
	'name'      => 'ua',
	'type'      => 'int',
	'unsigned'  =>  true,
	'null'      =>  false,
	'comment'   => 'Reference of t_ua.ai.',
	'reference' => 't_ua.ai'
]);

//  Add timestamp.
$configer->Set('column', [
	'name'    => 'timestamp',
	'type'    => 'timestamp',
	'comment' => 'On update current timestamp.',
]);

//--------------------------------------------//

//  Unique index.
$configer->Set('index', [
	'name'    => 'host-uri-ua',
	'type'    => 'unique',
	/*
	'type'    => 'index',
	'unique'  =>  true,
	*/
	'column'  => 'host, uri, ua',
	'comment' => 'Compound index.',
]);

//  Use to GROUP.
$configer->Set('index', [
	'name'    => 'uri',
	'type'    => 'index',
	'column'  => 'uri',
	'comment' => 'Use for grouprize.',
]);

//  Always use WHERE.
$configer->Set('index', [
	'name'    => 'host',
	'type'    => 'index',
	'column'  => 'host',
	'comment' => 'User agent.',
]);

//  ...
$configer->Set('index', [
	'name'    => 'ua',
	'type'    => 'index',
	'column'  => 'ua',
	'comment' => 'User agent.',
]);
