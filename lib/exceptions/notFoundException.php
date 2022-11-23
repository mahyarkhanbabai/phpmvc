<?php

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 11:37 PM
 */
namespace exceptions;
use http\Header;

class notFoundException extends \Exception
{
	public function __construct($exmsg='We could not find this URL in the application.', $val = 0, \Exception $old = null) {
		http_response_code(404);
		// ensure assignment of all values correctly
		parent::__construct($exmsg, $val, $old);
	}
}