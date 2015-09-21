<?php

	function print_reduce($eq)
	{
		echo "\n" . 'Reduced form: ';
	
		if (isset($eq['a']))
			$str = $eq['a'] . ' * X^2 ';
		else
			$eq['a'] = 0;

		if (isset($eq['b']))
			$str = $str . '+ '  . $eq['b'] . ' * X^1 ';
		else
			$eq['b'] = 0;
	
		if (isset($eq['c']))
			$str = $str . '+ ' . $eq['c'] . ' * X^0';
		else
			$eq['c'] = 0;

		$str = str_replace('+ -', '- ', $str);
		if ($str[0] == '+')
			$str = substr($str, 2);
		if ($str[0] == '-' && $str[1] == ' ')
			$str[1] = '';
		echo $str . ' = 0' . "\n";
	
		echo 'Polynomial degree: ' . $eq['degree'] . "\n";

		echo 'a = ' . $eq['a'] . ' | ';
		echo 'b = ' . $eq['b'] . ' | ';
		echo 'c = ' . $eq['c'] . "\n\n";

		return ($eq);
	}

?>
