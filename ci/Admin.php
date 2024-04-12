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

//	...
$method = 'Form';
$args   =  null;
$result = 'Notice: Class "OP\UNIT\NOTFOUND\Common" not found';
$ci->Set($method, $result, $args);

//	...
$method = 'Selftest';
$args   =  null;
$result = 'Exception: Call to a member function Config() on null';
$ci->Set($method, $result, $args);

//	...
$method = 'GetRecordAtHost';
$args   =  null;
$result = 'Notice: This method has not been exists. (OP\UNIT\Selftest->Unit(Form))';
$ci->Set($method, $result, $args);

//	...
$method = 'GetRecordAtURI';
$args   =  null;
$result = [];
$ci->Set($method, $result, $args);

//	...
return $ci->Get();
