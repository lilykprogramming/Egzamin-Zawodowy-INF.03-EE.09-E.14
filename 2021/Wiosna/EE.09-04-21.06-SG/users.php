<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/>
		<title>Panel administratora</title>
		<link rel="stylesheet" href="styl4.css"/>
	</head>
		<body>
			<!--BANNER-->
			<header>
				<h3>Portal Społecznościowy - panel administratora</h3>
			</header>
			<!-- LEWY BLOK-->
			<article>
				<h4>Użytkownicy</h4>
				<!--SKRYPT 1-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'dane4';
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						$query = 'SELECT id,imie,nazwisko, rok_urodzenia,zdjecie FROM osoby LIMIT 30';
						$row = mysqli_query($id_connect, $query);
						while($row2 = mysqli_fetch_assoc($row))
						{
							$year = 2024;
							$age = ($year - $row2['rok_urodzenia']);
							echo $row2['id'].'.'.$row2['imie'].' '.$row2['nazwisko'].', '.$age.' lat'.'<br>';
						}
					mysqli_close($id_connect);
				
				?>
				<a href="settings.html">Inne ustawienia</a>
			</article>
			<!-- PRAWY BLOK-->
			<article>
				<h4>Podaj id użytkownika</h4>
				<form action="users.php" method="POST">
					<input type="number" name="id_user"/>
					<button type="submit">ZOBACZ</button>
				</form>
				<hr></hr>
				<!--SKRYPT 2-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'dane4';
					
					$id = $_POST['id_user'];
					
					$id_connect = mysqli_connect($server,$user,$password,$database);
						$query = 'SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie,nazwa FROM osoby INNER JOIN hobby ON hobby.id=osoby.Hobby_id WHERE osoby.id = '.$id.'';
						$row = mysqli_query($id_connect, $query);
						while($row2 = mysqli_fetch_assoc($row))
						{
							echo '<h2>'.$id.'. '.$row2['imie'].' '.$row2['nazwisko'].'</h2>';
							echo '<img src='.$row2['zdjecie'].' alt='.$id.'/>';
							
							echo '<p>Rok urodzenia: '.$row2['rok_urodzenia'].'</p>';
							echo '<p>Opis: '.$row2['opis'].'</p>';
							echo '<p>Hobby: '.$row2['nazwa'].'</p>';
						}
					mysqli_close($id_connect);
				
				?>
			</article>
			<footer>
				<p>Stronę wykonał: lily</p>
			</footer>
		</body>
</html>