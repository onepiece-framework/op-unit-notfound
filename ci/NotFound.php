<?php
/** op-unit-notfound:/ci/NotFound.php
 *
 * @created     2024-04-11
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
$result = 'array(2) {
  ["arg1"]=>
  string(3) "foo"
  ["arg2"]=>
  string(3) "bar"
}
';
$ci->Set($method, $result, $args);

//	...
$method = '_Host';
$args   =  null;
$result =  0;
$ci->Set($method, $result, $args);

//	...
$method = '_URI';
$args   =  null;
$result =  0;
$ci->Set($method, $result, $args);

//	...
$method = '_UA';
$args   =  null;
$result =  0;
$ci->Set($method, $result, $args);

//	...
$method = '_OS';
$args   = ['',''];
$result =  null;
$ci->Set($method, $result, $args);

//	...
$method = '_Browser';
$args   = ['',''];
$result =  null;
$ci->Set($method, $result, $args);

//	...
$method = '_NotFound';
$args   = [0, 0, 0];
$result =  0;
$ci->Set($method, $result, $args);

//	...
return $ci->Get();
