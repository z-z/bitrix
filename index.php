<?php

use Bitrix\Main\Engine\Router;
use Bitrix\Main\Engine\Resolver;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\ControllerBuilder;
use Bitrix\Main\Engine\CurrentUser;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$app     = \Bitrix\Main\Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();

[$controller, $actionName] = Resolver::getControllerAndAction($_GET['vendor'], $_GET['module'], "{$_GET['scope']}.{$_GET['action']}");

if(!$controller || !method_exists($controller, $controller->generateActionMethodName($actionName)))
	[$controller, $actionName] = Resolver::getControllerAndAction($_GET['vendor'], $_GET['module'], "{$_GET['scope']}.index.notfound");

$app->runController($controller, $actionName);
