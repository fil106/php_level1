<?php



function TimeSpeed($nameFunc1, $nameFunc2, $it=50)
{
	$sum_avg1 = TimeFunc($nameFunc1, $it)[2];
	$sum_avg2 = TimeFunc($nameFunc2, $it)[2];

	$speed = round(($sum_avg2 / $sum_avg1) * 100, 3);
	
	echo "Увеличение скорости $speed % <br>";
}





function Deb(...$mass)
{
	echo "<pre>";
		print_r($mass);
	echo "</pre>";
}

function TimeFunc($nameFunc, $it = 50)
{
	ob_start(); //Запускаем буферизауию вывода	
	$max = 0;
	$min = PHP_INT_MAX;
	$sum = 0;
	for ($i = 1; $i < $it; $i++)
	{
		$start = microtime(true);
		$nameFunc();
		$end = microtime(true) - $start;
		$sum += $end;
		$max = $end < $max ? $max : $end;
		$min = $end < $min ? $end : $min;
	}
	$str = ob_get_contents(); //Записываем в переменную то, что в буфере, в данном случае не используется это значение
	$sum_avg = $sum / $it;
	ob_end_clean(); //Очищаем буфер
	return [$max, $min, $sum_avg];

}

?>
