<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/>
		<title>Port Lotniczy</title>
		<link rel="stylesheet" href="styl5.css"/>
	</head>
		<body>
			<!--BANNERY-->
			<header id="header1">
				<img src="zad5.png" alt="logo lotnisko"/>
			</header>
			<header id="header2">
				<h5>Przyloty</h5>
			</header>
			<header id="header3">
				<h3>przydatne linki</h3>
				<a href="kwerendy.txt" target="_blank">Pobierz...</a>
			</header>
			<!--BLOK GŁÓWNY-->
			<main>
				<table>
					<tr>
						<th>czas</th>
						<th>kierunek</th>
						<th>numer rejsu</th>
						<th>status</th>
					</tr>
					<!--SKRYPT 1-->
					<?php
						$server = 'localhost';
						$user = 'root';
						$password = '';
						$database = 'egzamin';
						
						$id_connect = mysqli_connect($server,$user,$password,$database);
						
							$query = 'SELECT czas,kierunek,nr_rejsu,status_lotu FROM przyloty ORDER BY czas ASC;';
							$row = mysqli_query($id_connect,$query);
							while($row2 = mysqli_fetch_assoc($row))
							{
								echo '<tr>';
								echo '<td>';
								echo $row2['czas'];
								echo '</td>';
								echo '<td>';
								echo $row2['kierunek'];
								echo '</td>';
								echo '<td>';
								echo $row2['nr_rejsu'];
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
			<!--STOPKI-->
			<footer id="footer1">
				<!---SKRYPT 2-->
				<?php
					setcookie('user','gosc',time()+7200);
					if(!isset($_COOKIE['user']))
					{
						echo '<p><i>Dzień dobry! Strona lotniska używa ciasteczek</i></p>';
					}
					else
					{
						echo '<p><i>Witaj ponownie na stronie lotniska</i></p>';
					}
				
				?>
			</footer>
			<footer id="footer2">
				<p> Autor: lily </p>
			</footer>
		</body>
</html>