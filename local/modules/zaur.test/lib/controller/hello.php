<?php

namespace Zaur\Test\Controller;

use Zaur\Test\Controller\Base;

class Hello extends Base
{
	public function configureActions()
	{
		return [
			'index' => ['prefilters' => []],
		];
	}

	public function indexAction()
	{
		return $this->twig->render('hello.twig');
	}
}
