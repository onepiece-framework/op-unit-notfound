<?php
/** op-unit-notfound:/admin/config.form.php
 *
 * @created   2019-01-30
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
$form = [];
$form['name'] = 'notfound';

//	host
$input = [];
$input['name']  = 'host';
$input['type']  = 'select';
$input['label'] = 'Host';
$input['required'] = true;
$input['option'][] = '';
$input['onchange'] = 'this.form.submit();';

//	host -> option
$config = [];
$config['table'] = 't_notfound.host = t_host.ai';
$config['limit'] = 100;
$config['group'] = 't_notfound.host';
$config['field'][] = ' t_host.host as host ';
$config['where'][] = ' t_host.timestamp not null ';
foreach( \OP\UNIT\NOTFOUND\Common::DB()->Select($config) as $record ){
	$input['option'][] = $record['host'];
};

//	...
$form['input'][] = $input;

//	...
$input = [];
$input['name']  = 'date-st';
$input['type']  = 'date';
$input['label'] = 'date-st';
$input['value'] = Env::Timestamp(false, '-30 days');
$input['required'] = true;
$form['input'][] = $input;

//	...
$input = [];
$input['name']  = 'date-en';
$input['type']  = 'date';
$input['label'] = 'date-en';
$input['value'] = Env::Timestamp();
$input['required'] = true;
$form['input'][] = $input;

//	...
$input = [];
$input['name']  = 'submit';
$input['type']  = 'submit';
$input['label'] = 'Submit';
$input['value'] = 'Submit';
$form['input'][] = $input;

//	...
return $form;
