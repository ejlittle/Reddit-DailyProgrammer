<?php
/**
Description
	In number theory, a deficient or deficient number is a number n for which the sum of divisors 
	sigma(n)<2n, or, equivalently, the sum of proper divisors (or aliquot sum) s(n)<n. The value 2n - 
	sigma(n) (or n - s(n)) is called the number's deficiency. In contrast, an abundant number or 
	excessive number is a number for which the sum of its proper divisors is greater than the number 
	itself
	
	As an example, consider the number 21. Its divisors are 1, 3, 7 and 21, and their sum is 32. 
	Because 32 is less than 2 x 21, the number 21 is deficient. Its deficiency is 2 x 21 - 32 = 10.
	
	The integer 12 is the first abundant number. Its divisors are 1, 2, 
	3, 4, 6, and 12, and their sum is 28. Because 28 is greater than 2 x 12, the number 12 is 
	abundant. It's abundant by is 28 - 24 = 4. (Thanks /u/Rev0lt_ for the correction.)

Input Description
	You'll be given an integer, one per line. Example:
	18
	21
	9

Output Description
	Your program should emit if the number if deficient, abundant (and its abundance), or neither. Example:
	18 abundant by 3
	21 deficient
	9 ~~neither~~ deficient

Challenge Input
	111  
	112 
	220 
	69 
	134 
	85 

Challenge Output
	111 ~~neither~~ deficient 
	112 abundant by 24
	220 abundant by 64
	69 deficient
	134 deficient
	85 deficient
/**/

$challenge1 = calc_deficiency(111);
$challenge2 = calc_deficiency(112);
$challenge3 = calc_deficiency(220);
$challenge4 = calc_deficiency(69);
$challenge5 = calc_deficiency(134);
$challenge6 = calc_deficiency(85);

echo $challenge1 . '<br />';
echo $challenge2 . '<br />';
echo $challenge3 . '<br />';
echo $challenge4 . '<br />';
echo $challenge5 . '<br />';
echo $challenge6 . '<br />';

function calc_deficiency($num) {
	$compare = $num * 2;
	
	$sum_of_divisors = 0;
	
	for ($i = 1; $i < $num; $i++) {
		if ($num % $i == 0) {
			$sum_of_divisors += $i;
		}
	}
	
	$diff = $num - $sum_of_divisors;
	
	if ($diff > 0) {
		return $num . ' deficient';
	} else if ($diff < 0) {
		return $num . ' abundant by ' . abs($diff);
	} else {
		return $num . ' neither';
	}
}//END FUNCTION

?>