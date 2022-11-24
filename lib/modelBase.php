<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/24/2022
 * Time: 11:38 AM
 */
class modelBase
{
	use \functions\modelTrait;
	protected DB $db;
	function __construct(){
		$this->db=DB::getInstance();
	}
}