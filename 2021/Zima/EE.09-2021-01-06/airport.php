<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/>
		<title>Odloty samolotów</title>
		<link rel="stylesheet" href="styl6.css"/>
	</head>
		<body>
		<!--BANNER-->
		<header id="banner_one">
			<h2>Odloty z lotniska</h2>
		</header>
		<header id="banner_two">
			<img src="zad6.png" alt="logotyp"/>
		</header>
		<!--BLOK GŁÓWNY-->
		<main>
			<h4>tabela odlotów</h4>
			<table>
				<tr>
					<th>lp</th>
					<th>numer rejsu</th>
					<th>czas</th>
					<th>kierunek</th>
					<th>status</th>
				</tr>
				<!--SKRYPT 1-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin';
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
					$query = 'SELECT id,nr_rejsu,czas,kierunek,status_lotu FROM odloty ORDER BY czas DESC;';
					$row = mysqli_query($id_connect,$query);
					while($row2 = mysqli_fetch_assoc($row))
					{
						echo '<tr>';
						echo '<td>';
						echo $row2['id'];
						echo '</td>';
						echo '<td>';
						echo $row2['nr_rejsu'];
						echo '</td>';
						echo '<td>';
						echo $row2['czas'];
						echo '</td>';
						echo '<td>';
						echo $row2['kierunek'];
						echo '</td>';
						echo '<td>';
						echo $row2['status_lotu'];
						echo '</td>';
						echo '</tr>';
					}
					mysqli_close($id_connect);
						
				?>
			</table>
		</main>
		<!--TRZY BLOKI STOPKI-->
		<footer id="footer_one">
			<a href="kw1.png" target="_blank">Pobierz obraz</a> 
		</footer>
		<footer id="footer_two">
			<!--SKRYPT 2-->
			<?php
				setcookie('user','bill',time()+3600,"/");
				if(!isset($_COOKIE['user']))
				{
					echo '<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>';
				}
				else
				{
					echo '<p><i>Miło nam, że nas znowu odwiedziłeś</i></p>';
				}
			?>
		</footer>
		<footer id="footer_three">
			<text> Autor: lily </text>
		</footer>
		</body>
</html>