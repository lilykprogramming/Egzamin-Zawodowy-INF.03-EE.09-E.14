<!DOCTYPE html>
<html>
<head>
	<title>Lista przyjaciół</title>
	<link rel="stylesheet" href="styl.css"/>
</head>
<body>
	<!--Banner-->
	<header>
	<nav>
		<h1>Portal Społecznościowy - moje konto
	</nav>
	</header>
	<!--Główny blok-->
	<article>
	<section>
		<h2>Moje zainteresowania</h1>
		<ul>
		<li>muzyka</li>
		<li>filmy</li>
		<li>komputery</li>
		</ul>
		<h2>Moi znajomi</h2>
		<?php
				$server = "localhost";
				$user = "root";
				$password = "";
				$database = "dane";
				$id_connect = mysqli_connect($server,$user,$password,$database);
				$query = "SELECT imie,nazwisko,opis,zdjecie FROM osoby WHERE Hobby_id IN(1,2,6);";
				$result = mysqli_query($id_connect,$query);
				while($row = mysqli_fetch_assoc($result))
				{
					echo '<img src="'.$row['zdjecie'].'" alt ="przyjaciel" style="float:left;"/>';
					echo '<section>';
					echo '<h3>'.$row['imie'].' '.$row['nazwisko'].'</h3>';
					echo '<p>Ostatni wpis: '.$row['opis'].'</p>';
					echo '</section>';
					echo '<br>';
					echo '<hr></hr>';
				}
				mysqli_close($id_connect);
		?>
	</section>
	</article>
	<!--Dwa bloki obok siebie-->
	<!--Stopki-->
	<footer id="ft1">
		<p>Stronę wykonał: lily</p>
	</footer>
	<footer id="ft2">
		<a href="mailto:ja@portal.pl">Napisz do mnie</a>
	</footer>
</body>
</html>