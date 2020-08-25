<?php
/** op-unit-notfound:/config/browser.php
 *
 * Use from NotFound::_browser()
 *
 * @created   2019-02-08
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

//	...
$configs = [];

//	...
$configs['cfnetwork']= 'CFNetwork\/(\d+)\.(\d+)';
$configs['vivaldi']	 = 'Vivaldi\/(\d+)\.(\d+)';
$configs['opera']	 = 'OPR\/(\d+)\.(\d+)';
$configs['chrome']	 = 'Chrome\/(\d+)\.(\d+)';
$configs['safari']	 = 'Safari\/(\d+)\.(\d+)';
$configs['firefox']	 = 'Firefox\/(\d+)\.(\d+)';
$configs['googlebot']= 'Googlebot\/(\d+)\.(\d+)';

//	...
return $configs;
