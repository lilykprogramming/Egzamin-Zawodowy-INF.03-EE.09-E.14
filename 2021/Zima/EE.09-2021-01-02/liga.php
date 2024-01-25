<!DOCTYPE html>
<html lang="PL">
	<head>
		<meta charset="UTF-8"/>
		<title>Piłka nożna</title>
		<link rel="stylesheet" href="styl2.css"/>
	</head>
		<body>
			<!--BANNER-->
			<header>
				<h3>Reprezentacja polski w piłce nożnej</h3>
				<img src="obraz1.jpg" alt="reprezentacja"/>
			</header>
			<!--BLOK LEWY-->
			<article id="left_block">
				<form action="liga.php" method="POST">
					<select name = "list">
						<option value="1">Bramkarze</option>
						<option value="2">Obrońcy</option>
						<option value="3">Pomocnicy</option>
						<option value="4">Napastnicy</option>
					</select>
					<button type="submit">Zobacz</button>
				</form>
				<img src="zad2.png" alt="piłka"/>
				<p> Autor: lily </p>
			</article>
			<!--BLOK PRAWY-->
			<article id="right_block">
				<ol>
					<!--SKRYPT 1-->
					<?php
						$server = 'localhost';
						$user = 'root';
						$password = '';
						$database = 'egzamin';
						
						$option_list = $_POST['list'];
						
						if(isset($option_list))
						{
							$id_connect = mysqli_connect($server,$user,$password,$database);
	
							$query = 'SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id ='.$option_list.';';
							
							$row = mysqli_query($id_connect,$query);
							
							while($row2 = mysqli_fetch_assoc($row))
							{
								echo '<li><p>'.$row2['imie'].' '.$row2['nazwisko'].'</p></li>';
							}
							mysqli_close($id_connect);
						}
					?>
				</ol>
			</article>
			<!--BLOK GŁÓWNY-->
			<main>
				<h3>Liga mistrzów</h3>
			</main>
			<!--BLOK LIGA-->
				<!--BLOKI INFORMACYJNE-->
				<!--SKRYPT 2-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin';						
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						$query = 'SELECT zespol,punkty,grupa FROM liga ORDER BY punkty DESC;';
							
						$row = mysqli_query($id_connect,$query);
							
						while($row2 = mysqli_fetch_assoc($row))
						{	
							echo '<aside>';
								echo '<h2>'.$row2['zespol'].'</h2>';
								echo '<h1>'.$row2['punkty'].'</h1>';
								echo '<p>grupa: '.$row2['grupa'].'</p>';
							echo '</aside>';
						}
					mysqli_close($id_connect);
				?>
		</body>
</html>