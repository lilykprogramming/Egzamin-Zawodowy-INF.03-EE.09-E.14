<!DOCTYPE html>
<html lang="PL">
	<head>
		<meta charset="UTF-8"/>
		<title>Wycieczki i urlopy</title>
		<link rel="stylesheet" href="styl3.css"/>
	</head>
		<body>
			<!--BANNER-->
			<header>
				<h1>BIURO PODRÓŻY</h1>
			</header>
			<!--LEWY BLOK-->
			<article>
				<h2>KONTAKT</h2>
				<a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
				<p>telefon: 555666777</p>
			</article>
			<!--ŚRODKOWY BLOK-->
			<main>
				<h2>GALERIA</h2>
				<!--SKRYPT 1-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin3';
					
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						if(!$id_connect)
						{
							die("Błąd połączenia z bazą danych:".mysqli_connect_error());
						}
						$query = 'SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;';
						$row = mysqli_query($id_connect,$query);
						if(!$row)
						{
							die("Błąd zapytania: ".mysqli_error($id_connect));
						}
						while($row2 = mysqli_fetch_assoc($row))
						{
							echo '<img src="' . $row2['nazwaPliku'] . '" alt="' . $row2['podpis'] . '">';						
						}
					mysqli_close($id_connect);
				?>
			</main>
			<!--PRAWY BLOK-->
			<article>
				<h2>PROMOCJA</h2>
				<table>
					<tr>
						<th>Jesień</th>
						<th>Grupa 4+</th>
						<th>Grupa 10+</th>
					</tr>
					<tr>
						<td>5%</td>
						<td>10%</td>
						<td>15%</td>
					</tr>
				</table>
			</article>
			<!--BLOK Z DANYMI-->
			<aside>
				<h2>LISTA WYCIECZEK</h2>
				<!--SKRYPT 2-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin3';
					
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						if(!$id_connect)
						{
							die("Błąd połączenia z bazą danych:".mysqli_connect_error());
						}
						$query = 'SELECT id,dataWyjazdu,cel,cena FROM wycieczki WHERE dostepna = true;';
						$row = mysqli_query($id_connect,$query);
						if(!$row)
						{
							die("Błąd zapytania: ".mysqli_error($id_connect));
						}
						while($row2 = mysqli_fetch_assoc($row))
						{
							echo $row2['id'].'. '.$row2['dataWyjazdu'].', '.$row2['cel'].', '.$row2['cena'].'<br>';
						}
					mysqli_close($id_connect);
				?>
			</aside>
			<!--STOPKA-->
			<footer>
				<p>Stronę wykonał: lily </p>
			</footer>
		</body>
</html>