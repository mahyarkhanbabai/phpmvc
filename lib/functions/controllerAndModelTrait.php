<?php
/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/24/2022
 * Time: 11:49 AM
 */

namespace functions;
trait controllerAndModelTrait
{
	/**
	 * Since array_column is deprecated, this function simulates its functionality
	 * @param array $input
	 * @param string $columnKey
	 * @param null $indexKey
	 * @return array|false
	 */
	function arrayColumnManual(array $input, string $columnKey, $indexKey = null): bool|array
	{
		$array = array();
		foreach ($input as $value)
		{
			if (is_array($value) && !array_key_exists($columnKey, $value))
			{
				trigger_error("Key \"$columnKey\" does not exist in array");
				return false;
			}
			if (is_null($indexKey))
			{
				$array[] = $value[$columnKey];
			}
			else
			{
				if (is_array($value) && !array_key_exists($indexKey, $value))
				{
					trigger_error("Key \"$indexKey\" does not exist in array");
					return false;
				}
				if (!is_scalar($value[$indexKey]))
				{
					trigger_error("Key \"$indexKey\" does not contain scalar value");
					return false;
				}
				$array[$value[$indexKey]] = $value[$columnKey];
			}
		}
		return $array;
	}
}