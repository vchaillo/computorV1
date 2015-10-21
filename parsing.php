<?php

	function parsing($str)
	{
		$eq = array();
		$eq['degree'] = 0;
		$eq['a'] = NULL;
		$eq['b'] = NULL;
		$eq['c'] = NULL;
		$eq['delta'] = 0;

		$str = str_replace(' ', '', $str);
		if (!preg_match('#^[0-9xX\-+*^=]+$#', $str))
			print_error(0);
		if (!preg_match('#=#', $str))
			print_error(0);
		$str = str_replace('+', '|+', $str);
		$str = str_replace('-', '|-', $str);
		echo 'str = ' . $str . PHP_EOL . PHP_EOL;

		$l = explode('=', $str)[0];
		$l = explode('|', $l);
		foreach($l as $elem)
		{
			echo 'elem_l = ' . $elem . PHP_EOL;
			if (preg_match('/[Xx]\^([0-9]+)/', $elem, $degree) || $elem == '' || $elem == '+' || $elem == '-')
			{
				$coef = preg_replace('/[Xx]\^([0-9]+)/', '', $elem);
				$coef = str_replace('*', '', $coef);
			}
			else
				print_error(0);

				if ($degree[1] > $eq['degree'] && $coef != '0')
					$eq['degree'] = $degree[1];
					
				switch ($degree[1])
				{
					case '2':
						$eq['a'] += floatval($coef);
						break;
					case '1':
						$eq['b'] += floatval($coef);
						break;
					case '0':
						$eq['c'] += floatval($coef);
						break;
				}
		}

		$r = explode('=', $str)[1];
		$r = explode('|', $r);
		foreach($r as $elem)
		{
			echo 'elem_r = ' . $elem . PHP_EOL;
			if (preg_match('/[Xx]\^([0-9]+)/', $elem, $degree))
				$coef = preg_replace('/[Xx]\^([0-9]+)/', '', $elem);
				$coef = str_replace('*', '', $coef);
				
				if ($degree[1] > $eq['degree'] && $coef != '0')
					$eq['degree'] = $degree[1];

				switch ($degree[1])
				{
					case '2':
						$eq['a'] -= floatval($coef);
						break;
					case '1':
						$eq['b'] -= floatval($coef);
						break;
					case '0':
						$eq['c'] -= floatval($coef);
						break;
				}
		}

		return($eq);
	}

?>
