<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 11:24 PM
 */
class view
{
	use \functions\view,\functions\everywhere;
	/**
	 * A method that sets view variables (to be used in view html files)
	 * @param string $var
	 * @param $data, the data to be saved as a view variable
	 * @return void
	 */
	function set(string $var,$data): void
	{
		$this->vars[$var]=$data;
	}

	function render($contentView): void
	{
		extract($this->vars);
		include PROJECT_ROOT . '/view/parentPageView.php';
	}

	private array $vars=array();
}