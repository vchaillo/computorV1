<?php

	function solve_deg0($eq)
	{
	
	}

	function solve_deg1($eq)
	{

	}

	function solve_deg2($eq)
	{
		if ($eq['delta'] > 0)
		{
			echo 'x1 = ' . "\n";
			echo 'x2 = ' . "\n";
		}
		else if ($eq['delta'] < 0)
		{
			echo 'z1 = ' . "\n";
			echo 'z2 = ' . "\n";
		}
		else // delta == 0
		{
			$tmp = 2 * $eq['a'];
			$x = -1 * $eq['b'] / $tmp;
			echo 'x = -b / 2a' . "\n";
			echo 'x = -' . $eq['b'] . ' / 2 * ' . $eq['a'] . "\n";
			echo "\033[41m\033[1mx = " . $x . "\n";
		}
	}

?>
