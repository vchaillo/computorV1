#!/usr/bin/php
<?php

	include('parsing.php');
	include('reduce.php');
	include('delta.php');
	include('solve.php');

	if ($argc == 2)
	{
		$eq = parsing($argv[1]);
		$eq = print_reduce($eq);
		$eq = get_delta($eq);

		if ($eq['degree'] == 0)
			solve_deg0($eq);
		else if ($eq['degree'] == 1)
			solve_deg1($eq);
		else // degree == 2
			solve_deg2($eq);
	}
	else if ($argc == 1)
	{
		echo 'Missing argument! Give me an equation to solve!' . "\n";
		echo 'Exemple :' . "\n";
		echo './computor.php "4 * X^2 + 6 * X^1 - 2 * X^0 = 3 * X^2 + 5 * X ^0"' . "\n";
	}
	else
	{
		echo 'Too many arguments!';
		echo 'Exemple :' . "\n";
		echo './computor.php "4 * X^2 + 6 * X^1 - 2 * X^0 = 3 * X^2 + 5 * X ^0"' . "\n";
	}

?>
