<?php

namespace Zaur\Test\Controller;

use \Bitrix\Main\Error;
use \Bitrix\Main\HttpResponse;

use \Bitrix\Main\Engine\Controller;
use \Bitrix\Main\Engine\Action;

class Base extends Controller
{
	protected function processBeforeAction(Action $action)
	{
		$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../views/templates');
		$this->twig = new \Twig\Environment($loader, ['cache' => false]);
		$this->twig->addExtension(new \Twig\Extension\DebugExtension());

		global $APPLICATION, $USER;

		$this->twig->addGlobal('APPLICATION', $APPLICATION);
		$this->twig->addGlobal('USER', $USER);

		$this->response = new HttpResponse();

		return true;
	}

	protected function processAfterAction(Action $action, $result)
	{
		$this->response->setContent($result);
		return $this->response;
	}
}
