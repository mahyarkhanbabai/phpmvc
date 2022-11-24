<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 11:23 PM
 */

class controllerBase
{
	use \functions\controllerTrait,\functions\everywhere;
	protected view $view;

	function __construct()
	{
		$this->view=new view;
		$settingsModel=new settingsModel();
		$this->view->set('appSettings',$settingsModel->getSettings());
	}
}