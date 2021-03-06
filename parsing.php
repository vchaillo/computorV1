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

		if (!preg_match('#^[0-9xX\-+.*^=]+$#', $str))
			print_error(1);
		if (preg_match('#([x.+\-*^=])(\1{1,})#i', $str))
			print_error(1);
		if (preg_match('#-\+|\+-|-\.|\.-|\+\.|\.\+|-\*|\*-|\+\*|\*\+|\^[xX]|\.[xX]|[xX]\.|\*[0-9]|[xX]\*|[0-9]\^|-\^|\+\^|\^-|\^\+|\^\*|\*\^|=\^|\^=|=\*|\*=|\+=|-=#', $str))
			print_error(1);
		if (!preg_match('#=#', $str))
			print_error(1);
		if (preg_match('#[-\+\*]$#', $str))
			print_error(1);
		if (preg_match_all('#=#', $str) > 1)
			print_error(1);
		$str = str_replace('+', '|+', $str);
		$str = str_replace('-', '|-', $str);

		$l = explode('=', $str)[0];
		if ($l[0] == '')
			print_error(1);
		$l = explode('|', $l);
		foreach($l as $elem)
		{
			$degree = array();
			if (preg_match('#[Xx]\^([0-9]+)#', $elem, $degree) || preg_match('#[xX]$#', $elem) || preg_match('#^[+\-]?([0-9].?)*$#', $elem) || $elem == '+' || $elem == '-' || $elem == '0')
			{
				if (preg_match('#[xX]$#', $elem))
					$degree[1] = '1';
				else if (preg_match('#^[+\-]?([0-9].?)+$#', $elem))
					$degree[1] = '0';
				$coef = preg_replace('#[Xx](\^([0-9]+))?#', '', $elem);
				$coef = str_replace('*', '', $coef);
				if ($coef == '' || $coef == '+')
					$coef = '1';
				else if ($coef == '-')
					$coef = '-1';
			}
			else
				print_error(1);

			if ($degree && $degree[1] > $eq['degree'] && $coef != '0')
					$eq['degree'] = $degree[1];

			if ($degree)
			{
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
		}

		$r = explode('=', $str)[1];
		if ($r[0] == '')
			print_error(1);
		$r = explode('|', $r);
		foreach($r as $elem)
		{
			if (preg_match('#[Xx]\^([0-9]+)#', $elem, $degree) || preg_match('#[xX]$#', $elem) || preg_match('#^[+\-]?([0-9].?)*$#', $elem) || $elem == '+' || $elem == '-' || $elem == '0')
			{
				if (preg_match('#[xX]$#', $elem))
					$degree[1] = '1';
				else if (preg_match('#^[+\-]?([0-9].?)+$#', $elem))
					$degree[1] = '0';
				$coef = preg_replace('#[Xx](\^([0-9]+))?#', '', $elem);
				$coef = str_replace('*', '', $coef);
				if ($coef == '' || $coef == '+')
					$coef = '1';
				else if ($coef == '-')
					$coef = '-1';
			}
			else
				print_error(1);

			if ($degree && $degree[1] > $eq['degree'] && $coef != '0')
				$eq['degree'] = $degree[1];

			if ($degree)
			{
				switch ($degree[1])
				{
					case '2':
						$eq['a'] -= floatval($coef);
						break;
					case '1':
						$eq['b'] -= floatval($coef);
						break;
					case '0':
						#echo "coef          => " . floatval($coef) . PHP_EOL;
						#echo "eq['c']before => " . $eq['c'] . PHP_EOL;
						#echo $eq['c'] . " -= " . floatval($coef) . PHP_EOL;
						$eq['c'] -= floatval($coef);
						#echo "eq['c']after  => " . $eq['c'] . PHP_EOL;
						break;
				}
			}
		}

		if ($eq['a'] == 0 && $eq['degree'] == 2)
			$eq['degree']--;
		if ($eq['b'] == 0 && $eq['degree'] == 1)
			$eq['degree']--;

		#print_r($eq);
		#echo 'c = ' . $eq['c'] . PHP_EOL;
		if (preg_match('#E#', $eq['c']))
			$eq['c'] = 0;

		return($eq);
	}

?>
