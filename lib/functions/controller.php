<?php

namespace functions;
/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/24/2022
 * Time: 11:16 AM
 */
trait controller
{
	/**
	 * This function returns a new random string (alphanumeric, special characters etc ...) according to given parameters
	 * @param int $length
	 * @param string $characters
	 * @param string $type
	 * @return string
	 */
	public static function random_str(int $length, string $characters = '0123456789', string $type = 'default'): string
	{
		if ($type != 'default')
		{
			$characters = match ($type)
			{
				'alphabet' => 'abcdefghijklmnopqrstuvwxyz',
				'alphaNumeric' => '0123456789abcdefghijklmnopqrstuvwxyz',
				'caseSensitive' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
				'specialChars' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^*()_+./\\\'|,:;{}[]',
				default => '0123456789',
			};
		}
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function EnglishifyNumbers($number)
	{
		$persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
		$arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
		$num = range(0, 9);
		return str_replace($arabic, $num, str_replace($persian, $num, $number));
	}
}