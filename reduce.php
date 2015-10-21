<?php

	function print_reduce($eq)
	{
		echo "\n" . 'Reduced form: ';

		$str = '';
		if (isset($eq['a']) && $eq['a'] != 0)
			$str = $eq['a'] . ' * x^2 ';
		else
			$eq['a'] = 0;

		if (isset($eq['b']) && $eq['b'] != 0)
			$str = $str . '+ '  . $eq['b'] . ' * x ';
		else
			$eq['b'] = 0;
	
		if (isset($eq['c']) && $eq['c'] != 0)
			$str = $str . '+ ' . $eq['c'];
		else
			$eq['c'] = 0;

		$str = str_replace('+ -', '- ', $str);
		if ($str[0] == '+')
			$str = substr($str, 2);
		if ($str[0] == '-' && $str[1] == ' ')
			$str[1] = '';
		echo $str . ' = 0' . "\n";
	
		echo 'Polynomial degree: ' . $eq['degree'] . "\n";

		if ($eq['degree'] == 2)
		{
			echo 'a = ' . $eq['a'] . ' | ';
			echo 'b = ' . $eq['b'] . ' | ';
			echo 'c = ' . $eq['c'] . "\n\n";
		}

		return ($eq);
	}

?>
