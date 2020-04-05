<?php
require __DIR__ . '/../../vendor/autoload.php';
define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(dirname(__FILE__)));

$paths = explode('/', $_SERVER['REQUEST_URI']);
$controller = 'user';
$action = 'index';
if (isset($_GET['load'])) {
   $params = array();
   $params = explode("/", $_GET['load']);
   $controller = ucwords($params[0]);
   if (isset($params[1]) && !empty($params[1])) {
      $action = $params[1];
   }
}

if (count($paths) == 2) {
   $controller = $paths[0];
   $action = $paths[1];
} else if (count($paths) == 1) {
   $action = $paths[0];
}
$controller = strtolower($controller);
$controllerClass = DS.'Exeo' . DS . 'http' . DS . ucfirst($controller).'Controller';
$cls = '\Exeo\http\UserController';
$load = new $controllerClass($controller, $action);
if (method_exists($load, $action)) {
   $load->$action();
} else {
   die('Invalid method. Please check the URL.');
}
