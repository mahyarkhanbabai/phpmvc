<?php
/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/24/2022
 * Time: 11:19 AM
 */

/**
 * A trait including methods to be used in all controllers, views and models
 */
namespace functions;
trait everywhere
{
	/**
	 * As the name implies, it var_dumps a PHP Array in a pretty, readable way
	 * @param array $array
	 * @return void
	 */
	public function prettyVarDump(array $array): void
	{
		highlight_string("<?php\n\$data =\n" . var_export($array, true) . ";\n?>");
	}
}