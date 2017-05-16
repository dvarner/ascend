<?php

function dump($arr) {
	ob_start();
	var_dump($arr);
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function dd() {
	$args = func_get_args();
	echo '<pre>';
	echo dump($args);
	exit;
}
