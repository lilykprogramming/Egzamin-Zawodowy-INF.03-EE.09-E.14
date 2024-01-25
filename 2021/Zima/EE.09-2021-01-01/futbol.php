<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/>
		<title>Rozgrywki futbolowe</title>
		<link rel="stylesheet" href="styl.css"/>
	</head>
		<body>
			<!--BANNER-->
			<header>
				<h2>Światowe rozgrywki piłkarskie</h2>
				<img src="obraz1.jpg" alt="boisko"/>
			</header>
			<!--BLOK MECZE-->
			<!--BLOKI INFORMACYJNE-->
			<article>
				<!--SKRYPT 1-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin';
					
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						$query = 'SELECT zespol1,zespol2,wynik,data_rozgrywki FROM rozgrywka WHERE zespol1 = "EVG";';
						$row = mysqli_query($id_connect,$query);
						while($row2 = mysqli_fetch_assoc($row))
						{
							echo '<section>';
							echo '<h3>'.$row2['zespol1'].' - '.$row2['zespol2'].'</h3>';
							echo '<h4>'.$row2['wynik'].'</h4>';
							echo '<p>'.$row2['data_rozgrywki'].'</p>';
							echo '</section>';
						}
					mysqli_close($id_connect);
				?>
			</article>
			<!--BLOK GŁÓWNY-->
			<main>
				<h2>Reprezentacja Polski</h2>
			</main>
			<!--BLOK LEWY-->
			<aside id = "left_block">
				<p>Podaj pozycję zawodników( 1 - bramkarze, 2 - obrońcy, 3 - pomocnicy, 4 napastnicy): </p>
				<form action="futbol.php" method="POST">
					<input type="number" name="number_player"/>
					<button type="submit">Sprawdź</button>
				</form>
				<ol>
					<!--SKRYPT 2-->
					<?php
						$server = 'localhost';
						$user = 'root';
						$password = '';
						$database = 'egzamin';
						
						$number_player2 = $_POST['number_player'];				
						if(!isset($numer_player2))
						{
						$id_connect = mysqli_connect($server,$user,$password,$database);
							$query = 'SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id = '.$number_player2.';';
							$row = mysqli_query($id_connect,$query);
							while($row2 = mysqli_fetch_assoc($row))
							{
								echo '<li>'.$row2['imie'].' '.$row2['nazwisko'].'</li>';
							}
						mysqli_close($id_connect);
						}					
					?>
				</ol>
			</aside>
			<!--BLOK PRAWY-->
			<aside id="right_block">
				<img src="zad1.png" alt="piłkarz"/>
				<p>Autor: lily </p>
			</aside>
		</body>
</html>