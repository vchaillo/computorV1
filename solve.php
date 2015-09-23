<?php

	function square_root($n)
	{
		$precision = 0.00001;
		$res = $n;

		if ($res <= 0)
			return (0);
		while (($res * $res >= $n + $precision) || ($res *$res <= $n - $precision))
		{
			$res = ($res + $n / $res) / 2;
		}
		$res = round($res, 2);
		return ($res);
	}

	function solve_deg1($eq)
	{

	}

	function solve_deg2($eq)
	{
		if ($eq['delta'] > 0)
		{
			$sq_delta = square_root($eq['delta']);
			$x1 = ($eq['b'] - $sq_delta) / (2 * $eq['a']);
			$x2 = (-$eq['b'] - $sq_delta) / (2 * $eq['a']);

			echo $eq['b'] - $sq_delta / (2 * $eq['a']);

			echo 'x1 = b - √Δ / 2a' . "\n";
			echo 'x1 = ' . $eq['b'] . ' - √' . $eq['delta'] . '/ 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx1 = " . $x1 . "\033[0m\n\n";

			echo 'x2 = -b - √Δ / 2a' . "\n";
			echo 'x2 = -' . $eq['b'] . ' - √' . $eq['delta'] . '/ 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx2 = " . $x2 . "\033[0m\n\n";
		}
		else if ($eq['delta'] < 0)
		{
			echo 'z1 = ' . "\n";
			echo 'z2 = ' . "\n";
		}
		else // delta == 0
		{
			$x = -1 * $eq['b'] / (2 * $eq['a']);

			echo 'x = -b / 2a' . "\n";
			echo 'x = -' . $eq['b'] . ' / 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx = " . $x . "\033[0m\n";
		}
	}

?>
