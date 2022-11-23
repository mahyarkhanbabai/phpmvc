<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 11:23 PM
 */
class controllerBase
{
	protected view $view;

	function __construct()
	{
		$this->view=new view;
	}
}