<?php
/** op-unit-notfound:/ci/Admin.php
 *
 * @created     2024-04-10
 * @version     1.0
 * @package     op-unit-notfound
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP\UNIT\NOTFOUND;

/* @var $ci \OP\UNIT\CI\CI_Config */
$ci = OP()->Unit('CI')->Config();

//	...
$method = 'Template';
$arg1   = 'foo';
$arg2   = 'bar';
$args   = ['ci.phtml',['arg1'=>$arg1, 'arg2'=>$arg2]];
$result = $arg1 . $arg2;
$ci->Set($method, $result, $args);

/*
//	...
$is_form     = \OP\Unit::isInstalled('form');
$is_selftest = \OP\Unit::isInstalled('selftest');
*/

//	...
$method = 'Form';
$args   =  null;
$result = 'OP\UNIT\Form';
$ci->Set($method, $result, $args);

//	...
$method = 'Selftest';
$args   =  null;
$result = 'CI is not support';
$ci->Set($method, $result, $args);

//	...
$method = 'GetRecordAtHost';
$args   =  null;
$result = ['CI is not support'];
$ci->Set($method, $result, $args);

//	...
$method = 'GetRecordAtURI';
$args   =  null;
$result = ['CI is not support'];
$ci->Set($method, $result, $args);

//	...
return $ci->Get();
