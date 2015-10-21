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
		return ($res);
	}

	function solve_deg1($eq)
	{
		$x = -$eq['c'] / $eq['b'];
		$x = round($x, 6);

		echo "\n" . 'x * ' . $eq['b'] . ' = ' . -$eq['c'] . "\n";
		echo 'x = ' . -$eq['c'] . '  / ' . $eq['b'] . "\n";
		echo "\033[41m\033[1mx = " . $x . "\033[0m\n\n";
	}

	function solve_deg2($eq)
	{
		if ($eq['delta'] > 0)
		{
			$sq_delta = square_root($eq['delta']);
			$x1 = (-$eq['b'] + $sq_delta) / (2 * $eq['a']);
			$x2 = (-$eq['b'] - $sq_delta) / (2 * $eq['a']);
			$x1 = round($x1, 6);
			$x2 = round($x2, 6);

			echo 'x1 = -b + √Δ / 2a' . "\n";
			echo 'x1 = -' . $eq['b'] . ' + √' . $eq['delta'] . ' / 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx1 = " . $x1 . "\033[0m\n\n";

			echo 'x2 = -b - √Δ / 2a' . "\n";
			echo 'x2 = -' . $eq['b'] . ' - √' . $eq['delta'] . ' / 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx2 = " . $x2 . "\033[0m\n\n";
		}
		else if ($eq['delta'] < 0)
		{

			$sq_delta = square_root(-$eq['delta']);
			$z1r = (-$eq['b'] / (2 * $eq['a']));
			$z1i = ($sq_delta / (2 * $eq['a']));
			$z2r = $z1r;
			$z2i = -$z1i;
			$z1r = round($z1r, 6);
			$z1i = round($z1i, 6);
			$z2r = round($z2r, 6);
			$z2i = round($z2i, 6);

			echo 'z1 = -b + i√Δ / 2a' . "\n";
			echo 'z1 = -' . $eq['b'] . ' + i√' . -$eq['delta'] . ' / 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mz1 = " . $z1r;
			if ($z1i >= 0)
				echo ' + ' . $z1i;
			else
				echo ' - ' . -$z1i;
			echo ' * i' . "\033[0m\n\n";

			echo 'z2 = -b - i√Δ / 2a' . "\n";
			echo 'z2 = -' . $eq['b'] . ' - i√' . -$eq['delta'] . '/ 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mz2 = " . $z2r;
			if ($z2i >= 0)
				echo ' + ' . $z2i;
			else
				echo ' - ' . -$z2i;
			echo ' * i' . "\033[0m\n\n";
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
