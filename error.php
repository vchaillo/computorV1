<?php

	function print_error($er)
	{
		echo PHP_EOL;

		if ($er == 1)
			echo "\033[31m" . 'Syntax error! I can\'t read this equation' . PHP_EOL;
		else if ($er == 2)
			echo "\033[31m" . 'Missing argument! Give me an equation to solve' . PHP_EOL;
		else if ($er == 3)
			echo "\033[31m" . 'Too many arguments!' . PHP_EOL;
		else if ($er == 4)
			echo "\033[31m" . 'The polynomial degree is strictly greater than 2, I can\'t solve' . PHP_EOL;


		echo "\033[0m" . PHP_EOL . 'Exemples :' . PHP_EOL;
		echo './computor "5 * X^0 + 4 * X^1 - 9.3 * X^2 = 1 * X^0"' . PHP_EOL;
		echo './computor "5 * X^0 + 4 * X^1 = 4 * X^0"' . PHP_EOL . PHP_EOL;
		exit(0);
	}

?>
