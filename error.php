<?php

	function errors($er)
	{
		if ($er == 1)
			echo 'Error, this is not an equation!' . PHP_EOL;
		else if ($er == 2)
			echo 'Missing argument! Give me an equation to solve' . PHP_EOL;
		else if ($er == 3)
			echo 'Too many arguments!' . PHP_EOL;
		else if ($er == 4)
			echo 'The polynomial degree is strictly greater than 2, I can\' solve' . PHP_EOL;


		echo PHP_EOL . 'Exemples :' . PHP_EOL;
		echo './computor "5 * X^0 + 4 * X^1 - 9.3 * X^2 = 1 * X^0"' . PHP_EOL;
		echo './computor "5 * X^0 + 4 * X^1 = 4 * X^0"' . PHP_EOL;
	}

?>
