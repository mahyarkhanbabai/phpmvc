<?php
/**
 * Created by PhpStorm.
 * User: Mahyar Khanbabai (khanbabai.ir)
 * Date: 11/23/2022
 * Time: 11:50 PM
 *
 *
 * This is the parent page of views. all views are included in this page so we don't have to repeat headers and footers everywhere.
 */
if(!isset($contentView))
	throw new Exception('A contentView is required to create parent page.');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Website</title>
</head>
<body>
<h1>This is a test website</h1>
<nav>
	<a href="index">Home Page</a><a href="#">users</a><a href="#">Lists</a><a href="#">Hey</a><a href="#">Test</a>
</nav>
<main>
	<?php
	require_once dirname(__FILE__).'/'.$contentView.'View.php';
	?>
</main>
</body>
</html>