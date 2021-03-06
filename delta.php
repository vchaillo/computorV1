<?php

	function get_delta($eq)
	{
		echo 'Δ = b² - 4ac' . "\n";
		echo 'Δ = (' . $eq['b'] . ')² - 4 * ' . $eq['a'] . ' * ' . $eq['c'] . "\n";

		$d = $eq['b'] * $eq['b'] - (4 * $eq['a'] * $eq['c']);
		$eq['delta'] = $d;

		echo 'Δ = ' . $d . "\n\n";

		if ($d > 0)
			echo 'Discriminant is strictly positive, the two solutions are:';
		else if ($d < 0)
			echo 'Discriminant is strictly negative, the two solutions are:';
		else // d == 0
			echo 'Discriminant is equal to zero, the solution is:';
		echo "\n\n";

		return ($eq);
	}

?>
