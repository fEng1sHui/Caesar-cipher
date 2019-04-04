<!DOCTYPE html>
<html>
<head>
	<title>Ceasar cipher.</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h1>Ceasar cipher</h1>
	<div class="container">
		<div class="col-sm-8 offset-sm-2">
			<form class="form-inlin justify-content-center" action="/" method="POST">
				<div class="form-group">
					<label for="exampleInputText">Text for encryption</label>
					<input type="text" class="form-control" id="exampleInputText" placeholder="Enter text here for encryption" name="text" required>
				</div>
				<div class="form-group">
					<label for="exampleInputKey">Key</label>
					<input type="number" pattern="[0-9]" class="form-control" id="exampleInputKey" placeholder="Enter key here (1-25)" name="key" required>
				</div>
				<button type="submit" class="btn btn-outline-dark padding-lf-rg" name="encrypt"><b>Encrypt</b></button>
			</form></br>
			
			<?php
			function encryption($text, $key)
			{
				$text = strtoupper($text);
				$a = str_split($text);
				$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
				$copy = $a;

				for($i = 0;$i<count($a);$i++)
				{
					for($j = 0;$j<count($alphabet);$j++)
					{
						if($a[$i] === ' ')
						{
							$copy[$i] = ' ';
						}
						else if($a[$i] === $alphabet[$j])
						{
							$copy[$i] = $alphabet[($j + $key) % count($alphabet)];		
						}
					}
				}
				$encryptedText = implode('', $copy);
				return $encryptedText;
			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$text = $_POST['text'];
				$key = $_POST['key'];

				if (isset($_POST['encrypt'])) {
					echo '<h5 class="text-center">Encrypted text:</h5>';
					$encryptedText = encryption($text, $key);
					echo '<div class="col border new-line">'.$encryptedText.'</div>';
				}
			}
			?>
		</div>
	</div>
	</br></br>
</body>
</html>