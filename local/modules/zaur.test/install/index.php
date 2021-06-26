<?php

class zaur_test extends CModule
{
	public function __construct()
	{
		$this->MODULE_ID           = "zaur.test";
		$this->MODULE_NAME         = "Test module";
	}

	public function DoInstall()
	{
		RegisterModule($this->MODULE_ID);
	}

	function DoUninstall()
	{
		UnRegisterModule($this->MODULE_ID);

	}
}
