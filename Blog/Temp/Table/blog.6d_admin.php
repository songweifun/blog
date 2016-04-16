<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'adminid' => 
  array (
    'field' => 'adminid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'varchar(25)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'password' => 
  array (
    'field' => 'password',
    'type' => 'char(32)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
);
?>