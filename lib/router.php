<?php

use exceptions\notFoundException;

/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 10:12 PM
 */

class router
{
	/**
	 * @throws notFoundException
	 */
	function route(array $param): void
	{
		// We try to find the controller/namespace by adding $param indexes one by one to a class name
		$i=0;
		$className='';
		do{
			$className=trim($className.'\\'.$param[$i++],'\\');
		}while((!class_exists($className.'Controller'))&&$i<count($param));

		if(class_exists($className.'Controller'))
		{
			$controllerObj=new ($className.'Controller');
			// Anything after the class name should be the action or "method" name, it is "index" if it doesn't exist
			$methodName=array_key_exists($i,$param)?$param[$i]:'index';
			$indexTriedFlag=0;
			tryAgainWithIndex:
			if(method_exists($controllerObj,$methodName))
			{
				$reflection=new ReflectionMethod($controllerObj,$methodName);
				if(!$reflection->isPublic())
				{
					throw new notFoundException();
				}
				call_user_func_array(array($controllerObj,$methodName),array($param));
			}
			else
			{
				if($indexTriedFlag)
				{
					// If the method name doesn't exist in the desired controller
					// Then we should try index method in that controller
					// So, for addresses such as http://localhost/users/mahyarkhanbabai
					// We call index method of usersController and send 'mahyarkhanbabai' as it's param
					$methodName='index';
					$indexTriedFlag=1;
					goto tryAgainWithIndex;
				}
				throw new notFoundException();
			}
		}
		else
			echo 'not found';
	}
}