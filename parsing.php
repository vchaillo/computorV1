<?php

	function parsing($str)
	{
		$str = str_replace(' ', '', $str);
		$str = str_replace('+', '|+', $str);
		$str = str_replace('-', '|-', $str);

		$l = explode('=', $str)[0];
		$l = explode('|', $l);
		foreach($l as $elem)
		{
			if (preg_match('/X\^([0-9]+)/', $elem, $degree))
				$coef = preg_replace('/X\^([0-9]+)/', '', $elem);
				$coef = str_replace('*', '', $coef);

				if ($degree[1] > $eq['degree'])
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
			if (preg_match('/X\^([0-9]+)/', $elem, $degree))
				$coef = preg_replace('/X\^([0-9]+)/', '', $elem);
				$coef = str_replace('*', '', $coef);
				
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
