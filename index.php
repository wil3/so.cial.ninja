<?php

$re_hash_url = '/^\/[a-zA-Z0-9]{5}$/';
$re_root = '/^\/$/';

if (preg_match($re_hash_url, $_SERVER['REQUEST_URI'])){
	
	require_once 'db.php';
	require_once 'fn.php';
	$hash = substr($_SERVER['REQUEST_URI'],1);
	if (hash_exists($hash)){	
		include 'preview.php';
	} else {
		include '404.php';
	}
} else if (preg_match($re_root, $_SERVER['REQUEST_URI'])){
	include 'create.php';
} else {
	include '404.php';
}
?>
