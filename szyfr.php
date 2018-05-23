<!DOCTYPE HTML>
<html lang ="pl">
<head>
	<meta charset="utf-8"?>
	<title>Ceasar</title>
</head>
<body>
<?php
	$text1 = $_POST['twojtext'];
	$liczba = $_POST['liczba'];
	
	$text1 = strtoupper($text1);
	$a = str_split($text1);
	$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');	
	$kopia = $a;
		
	for($i = 0;$i<count($a);$i++)
	{
		for($j = 0;$j<count($alphabet);$j++)
		{
			if($a[$i] === ' ')
			{
				$kopia[$i] = ' ';
			}
			else if($a[$i] === $alphabet[$j])
			{
				$kopia[$i] = $alphabet[($j + $liczba) % count($alphabet)];		
			}
		}
	}
   $answer = implode('', $kopia);
   
	echo $answer;
	
	?>
</body>
</html>