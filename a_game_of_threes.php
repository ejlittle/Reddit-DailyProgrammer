<?php
/**
Background
	Back in middle school, I had a peculiar way of dealing with super boring classes. I would take my 
	handy pocket calculator and play a "Game of Threes". Here's how you play it:
		First, you mash in a random large number to start with. Then, repeatedly do the following:
		If the number is divisible by 3, divide it by 3.
		If it's not, either add 1 or subtract 1 (to make it divisible by 3), then divide it by 3.
		The game stops when you reach "1".

	While the game was originally a race against myself in order to hone quick math reflexes, it also poses an opportunity for some interesting programming challenges. Today, the challenge is to create a program that "plays" the Game of Threes.

Challenge Description
	The input is a single number: the number at which the game starts. Write a program that plays the Threes game, and outputs a valid sequence of steps you need to take to get to 1. Each step should be output as the number you start at, followed by either -1 or 1 (if you are adding/subtracting 1 before dividing), or 0 (if you are just dividing). The last line should simply be 1.

Input Description
	The input is a single number: the number at which the game starts.
	100

Output Description
	The output is a list of valid steps that must be taken to play the game. Each step is represented by the number you start at, followed by either -1 or 1 (if you are adding/subtracting 1 before dividing), or 0 (if you are just dividing). The last line should simply be 1.
	100 -1
	33 0
	11 1
	4 -1
	1

Challenge Input
	31337357
/**/
$pa = (isset($_GET['pa']) ? $_GET['pa'] : '');
$start_point = (isset($_GET['start_point']) ? $_GET['start_point'] : '');
$html = '';
switch ($pa) {
	case 'threes':
		$threes = 0;
		$test = 0;
		$temp_point = $start_point;
		$html .= '<table width="15%"><thead><th align="right">Calc</th><th align="right">Mod</th></thead><tbody>';
		while ($temp_point > 1) {
			$threes = threes($temp_point);
			$html .= '<tr><td align="right">' . $temp_point . '</td><td align="right">' . $threes . '</td></tr>';
			$temp_point = ($temp_point + $threes) / 3;
		}//END WHILE
		$html .= '<tr><td align="right">1</td><td align="right">&nbsp;</td></tr></tbody></table>';
	default:
		$html .= '<form method="get"><input type="text" name="start_point" /><input type="submit" /><input type="hidden" value="threes" name="pa" /></form>';
		break;
}//END SWITCH

echo $html;

function threes($start_point) {
	if ($start_point % 3 == 2) {
		return 1;
	} else if ($start_point % 3 == 1) {
		return -1;
	} else if ($start_point % 3 == 0) {
		return 0;
	}//END IF
}//END FUNCTION
?>