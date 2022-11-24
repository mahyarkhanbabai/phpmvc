<?php
/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 10:08 PM
 */
error_reporting(E_ALL);
ini_set('display_errors',1);

define('PROJECT_ROOT', dirname(__FILE__));
define('WEB_ROOT', substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], '/index.php')));

session_start();

/**
 * A helper function for autoloader
 */
function decideToLoadFileOrNamespace($className,$classNameArray,$folderName): void
{
	// If the file exists in the main directory
	if (file_exists(PROJECT_ROOT . '/'.$folderName.'/' . $className . '.php') == 1) {
		require_once PROJECT_ROOT . '/'.$folderName.'/' . $className . '.php';
	}
	// If it is a single file inside a namespace (folder structure in the whole project is the same as namespaces)
	elseif(count($classNameArray)>1&&file_exists(PROJECT_ROOT.'/'.$folderName.'/'.implode('/',$classNameArray).'.php')){
		require_once PROJECT_ROOT.'/'.$folderName.'/'.implode('/',$classNameArray).'.php';
	}
}

/**
 * Autoloader function
 * @param string $className
 */
function autoloader(string $className): void
{
	// We try to explode this className by "\" character to see if we are loading a namespace or a single class
	$classNameArray=explode("\\",$className);

	if (strlen($className) > 10 && substr($className, -10) == 'Controller') {
		decideToLoadFileOrNamespace($className,$classNameArray,'controller');
	}
	elseif (strlen($className) > 5 && substr($className, -5) == 'Model'){
		decideToLoadFileOrNamespace($className,$classNameArray,'model');
	}
	else {
		decideToLoadFileOrNamespace($className,$classNameArray,'lib');
	}
}

// activates the autoloader
spl_autoload_register('autoloader');

$_GET['param']=array_key_exists('param',$_GET)?$_GET['param']:'index';
$router = new router();
$router->route(explode('/',$_GET['param']));