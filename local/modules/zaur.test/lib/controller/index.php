<?php

namespace Zaur\Test\Controller;

use Zaur\Test\Controller\Base;

class Index extends Base
{
	public function configureActions()
	{
		return [
			'index'    => ['prefilters' => []],
			'notfound' => ['prefilters' => []],
		];
	}

	public function indexAction()
	{
		global $APPLICATION;

		$APPLICATION->SetTitle('Главная');

		return $this->twig->render('index.twig');
	}

	public function notfoundAction()
	{
		$this->response->setStatus('404 Not Found');
		return '404 Not Found';
	}
}
