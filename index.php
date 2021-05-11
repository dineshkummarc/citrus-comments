<?php

include 'vendor/autoload.php';
include 'config/dbhelper.php';
include 'config/MySQLDatabase.php';
define('TEMPLATE_DIR','./view/');

$action = '';
$queryString = '';
$params = [];
$isAjax = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']);
if ($isAjax) {
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    parse_str($queryString, $paramsArray);
    $action = array_shift($paramsArray);
    $params = $paramsArray;
}
function request_path()
{
    $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
    $parts = array_diff_assoc($request_uri, $script_name);
    if (empty($parts))
    {
        return '/';
    }
    $path = implode('/', $parts);
    if (($position = strpos($path, '?')) !== FALSE)
    {
        $path = substr($path, 0, $position);
    }
    return $path;
}

$db = new \Config\MySQLDatabase($host, $user, $password, $db);
$controllerFactory = new \WebPage\Handler\Base\Factory\ControllerFactory($db);
$controller = $controllerFactory->make(request_path(), $action, $params);