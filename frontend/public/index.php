<?php
if ($_SERVER['SERVER_PORT'] == 80) {
  $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  var_Dump($location);
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . $location);
  exit;
}

chdir('..');
require_once'../vendor/autoload.php';
require_once 'lib/Frontend.php';
$api=new Frontend('front');
$api->main();
