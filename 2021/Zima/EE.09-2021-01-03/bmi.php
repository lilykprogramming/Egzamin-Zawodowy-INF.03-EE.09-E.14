<!DOCTYPE html>
<html lang="PL">
	<head>
		<meta charset="UTF-8"/>
		<title>Twoje BMI</title>
		<link rel="stylesheet" href="styl3.css"/>
	</head>
		<body>
			<!--LOGO-->
			<aside>
				<img src="wzor.png" alt="wzór BMI"/>
			</aside>
			<!--BANNER-->
			<header>
				<h1>Oblicz swoje BMI</h1>
			</header>
			<!--BLOK GŁÓWNY-->
			<main>
				<table>
					<tr>
						<th>Interpretacja BMI</th>
						<th>Wartość minimalna</th>
						<th>Wartość maksymalna</th>
					</tr>
					<!--SKRYPT 1-->
						<?php
							$server = 'localhost';
							$user = 'root';
							$password = '';
							$database = 'egzamin';
							
							
							$id_connect = mysqli_connect($server,$user,$password,$database);
								$query = 'SELECT informacja,wart_min,wart_max FROM bmi;';
								$row = mysqli_query($id_connect,$query);
								while($row2 = mysqli_fetch_assoc($row))
								{
									echo '<tr>';
									echo '<td>';
									echo $row2['informacja'];
									echo '</td>';
									echo '<td>';
									echo $row2['wart_min'];
									echo '</td>';
									echo '<td>';
									echo $row2['wart_max'];
									echo '</td>';
									echo '</tr>';
								}
								
							
							mysqli_close($id_connect);
						?>
				</table>
			</main>
			<!-- BLOK LEWY-->
			<article id="left_block">
				<h2>Podaj wagę i wzrost</h2>
				<form action="bmi.php" method="POST">
					<label for="waga">Waga: </label>
					<input type="number" name="waga" minlength="1"/><br>
					<label for="wzrost">Wzrost w cm: </label>
					<input type="number" name="wzrost" minlength="1"/><br>
					<button type="submit">Oblicz i zapamiętaj wynik</button>
				</form>
				<!--SKRYPT 2-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin';
					
					$waga = $_POST['waga'];
					$wzrost = $_POST['wzrost'];
					
					if(isset($waga) || isset($wzrost))
					{
						$bmi = (($waga/($wzrost*$wzrost))*10000);
						echo 'Twoja waga: '.$waga;
						echo ' Twój wzrost: '.$wzrost;
						echo '<br> BMI wynosi: '.$bmi;
						
						$bmi_id = 0;
						
						if($bmi >= 0 && $bmi <= 18)
						{
							$bmi_id = 1;
						}
						else if($bmi>= 19 && $bmi <= 25)
						{
							$bmi_id = 2;
						}
						else if($bmi >= 26 && $bmi <= 30)
						{
							$bmi_id = 3;
						}
						else if($bmi >= 31 && $bmi_id <= 100)
						{
							$bmi_id = 4;
						}
						
						$id_connect = mysqli_connect($server,$user,$password,$database);
							$query = 'INSERT INTO wynik(bmi_id,data_pomiaru,wynik) VALUES ('.$bmi_id.',"'.date("20y-m-d").'",'.$bmi.');';
							mysqli_query($id_connect,$query);
						mysqli_close($id_connect);
					}
				?>
			</article>
			<!-- BLOK PRAWY-->
			<article id="right_block">
				<img src="rys1.png" alt="ćwiczenia"/>
			</article>
			<!--STOPKA-->
			<footer>
				<text>Autor lily </text>
				<a href="kwerendy.txt">Zobacz kwerendy</a>
			</footer>
		</body>
</html>