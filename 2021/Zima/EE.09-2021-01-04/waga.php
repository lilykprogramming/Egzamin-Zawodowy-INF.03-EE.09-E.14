<!DOCTYPE html>
<html lang="PL">
	<head>
		<meta charset="UTF-8"/>
		<title>Twój wskaźnik BMI</title>
		<link rel="stylesheet" href="styl4.css"/>
	</head>
		<body>
			<!--BANNER-->
			<header>
				<h2>Oblicz wskaźnik BMI</h2>
			</header>
			<!--LOGO--->
			<aside>
				<img src="wzor.png" alt="liczymy BMI"/>
			</aside>
			<!--BLOK LEWY-->
			<article id="left_block">
				<img src="rys1.png" alt="zrzuć kalorie!"/>
			</article>
			<!-- BLOK PRAWY-->
			<article id="right_block">
				<h5>Podaj dane</h5>
				<form action="waga.php" method="POST">
					<label for="waga">Waga:</label>
					<input type="number" name="waga"/><br>
					<label for="wzrost">Wzrost[cm]:</label>
					<input type="number" name="wzrost"/><br>
					<button type="submit">Licz BMI i zapisz wynik</button>
				</form>
				<!--SKRYPT 1-->
				<?php
					$server = 'localhost';
					$user = 'root';
					$password = '';
					$database = 'egzamin';
					
					$waga = $_POST['waga'];
					$wzrost = $_POST['wzrost'];
					
					if(isset($waga) || isset($wzrost))
					{
						$bmi = ((($waga)/($wzrost*$wzrost))*10000);
						echo 'Twoja waga: '.$waga;
						echo ' Twój wzrost: '.$wzrost;
						echo '<br>BMI wynosi: '.$bmi;
						$bmi_id = "";
						if($bmi >= 0 && $bmi <= 18)
						{
							$bmi_id = 1;
						}
						else if($bmi >= 19 && $bmi <= 25)
						{
							$bmi_id = 2;
						}
						else if($bmi >= 31 && $bmi <= 100)
						{
							$bmi_id = 3;
						}
						$id_connect = mysqli_connect($server,$user,$password,$database);
							$query = 'INSERT INTO wynik(bmi_id,data_pomiaru,wynik) VALUES ('.$bmi_id.',"'.date("20y-m-d").'",'.$bmi.');';
							mysqli_query($id_connect,$query);
						mysqli_close($id_connect);
						
						
					}
				?>
			</article>
			<!--BLOK GŁÓWNY-->
			<main>
				<table>
					<tr>
						<th>lp.</th>
						<th>Interpretacja</th>
						<th>zaczyna się od...</th>
					</tr>
					<!--SKRYPT 2-->
					<?php
						$server = 'localhost';
						$user = 'root';
						$password = '';
						$database = 'egzamin';
						$id_connect = mysqli_connect($server,$user,$password,$database);
							$query = 'SELECT id,informacja,wart_min FROM bmi;';
							$row = mysqli_query($id_connect,$query);
							while($row2 = mysqli_fetch_assoc($row))
							{
								echo '<tr>';
								echo '<td>';
								echo $row2['id'];
								echo '</td>';
								echo '<td>';
								echo $row2['informacja'];
								echo '</td>';
								echo '<td>';
								echo $row2['wart_min'];
								echo '</td>';
								echo '</tr>';
							}
						mysqli_close($id_connect);
					
					
					?>
				</table>
			</main>
			<!--STOPKA--->
			<footer>
				<text>Autor: lily </text><a href="kw2.jpg">Wynik działania kwerendy 2</a>
			</footer>
		</body>
</html>