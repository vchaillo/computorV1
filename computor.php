#!/usr/bin/php
<?php

	include('parsing.php');
	include('reduce.php');
	include('delta.php');

	if ($argc == 2)
	{
		$eq = parsing($argv[1]);
		$eq = print_reduce($eq);
		$eq = get_delta($eq);

		print_r($eq);
	}

?>
