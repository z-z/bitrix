<?php

use Bitrix\Main\Application;
use Bitrix\Main\Engine\Resolver;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$app     = Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();

[$controller, $actionName] = Resolver::getControllerAndAction($_GET['vendor'], $_GET['module'], "{$_GET['scope']}.{$_GET['action']}");

if(!$controller || !method_exists($controller, $controller->generateActionMethodName($actionName)))
	[$controller, $actionName] = Resolver::getControllerAndAction($_GET['vendor'], $_GET['module'], "{$_GET['scope']}.index.notfound");

$app->runController($controller, $actionName);
