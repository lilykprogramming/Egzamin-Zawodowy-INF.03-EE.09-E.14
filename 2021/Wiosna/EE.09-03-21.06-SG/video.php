<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"/>
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css"/>
</head>
<body>
    <main>
<!--DWA BLOKI BANNERA-->
<!--BLOK LEYW-->
        <header id="lewy">
        <h1>Internetowa wypoźyczalnia filmów</h1>
        </header>
<!--BLOK PRAWY-->
        <header id="prawy">
            <table>
                <tr>
                <td>Kryminał</td>
                <td> Horror</td>
                <td> Przygodowy</td>
                </tr>
                <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
                </tr>
            </table>
        </header>
<!-- BLOK LISTY  pOLECAMY-->
    <article>
        <h3>Polecamy</h3>
        <?php
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "dane3";
            $id_connect = mysqli_connect($server,$user,$password,$database);
            /*SKRYPT 1*/
            $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(18,22,23,25)";
            $row = mysqli_query($id_connect,$query);
            while($row2 = mysqli_fetch_assoc($row))
            {
                echo '<section>';
                echo '<h4>'.$row2["id"].' '.$row2["nazwa"].'</h4>';
                echo '<img src="'.$row2["zdjecie"].'" alt="film"/>';
                echo '<p>'.$row2["opis"].'<p>';
                echo '</section>';
            }
            mysqli_close($id_connect);
        ?>
    </article>
<!--BLOK LISTY FILMY-->
    <article>
        <h3>Filmy fantastyczne</h3>
        <?php
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "dane3";
            $id_connect = mysqli_connect($server,$user,$password,$database);
            /*SKRYPT 2*/
            $query2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12";
            $row2 = mysqli_query($id_connect,$query2);
            while($row3 = mysqli_fetch_assoc($row2))
            {
                echo '<section>';
                echo '<h4>'.$row3["id"].' '.$row3["nazwa"].'</h4>';
                echo '<img src="'.$row3["zdjecie"].'" alt="film"/>';
                echo '<p>'.$row3["opis"].'<p>';
                echo '</section>';
            }
            mysqli_close($id_connect);
        ?>
    </article>
<!--STOPKA-->
        <footer>
            <form action="video.php" method="POST">
            <label for="liczba">Usuń film nr.:</label>
            <input type="number" name="liczba"/>
            <button type="submit">Usuń film</button>
            <?php
                $server = "localhost";
                $user = "root";
                $password = "";
                $database = "dane3";
                $id_connect = mysqli_connect($server,$user,$password,$database);
                $liczba = $_POST["liczba"];
                $query3 = "DELETE FROM produkty WHERE id = $liczba;";
                $row4 = mysqli_query($id_connect,$query3);
                mysqli_close($id_connect);
            ?>
            </form>
            <p>Stronę wykonał: lily</p>
            <a href="mailto:ja@poczta.com">lily</a>
        </footer>
    </main>
</body>
</html>