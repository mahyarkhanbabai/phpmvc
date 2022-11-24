<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/24/2022
 * Time: 11:42 AM
 */
class settingsModel extends modelBase
{
	/**
	 * This function gets application main settings from database and
	 * returns an associative array like this:
	 * array(
	 *      "settingName"=>"settingValue"
	 * )
	 * @return array
	 */
	function getSettings():array{
		$settingsList=$this->db->query('SELECT * FROM settings');
		$settingsList=$settingsList?:[];
		return array_combine($this->arrayColumnManual($settingsList,'name'),$this->arrayColumnManual($settingsList,'value'));
	}
}