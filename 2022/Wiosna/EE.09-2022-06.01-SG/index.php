<!DOCTYPE html>
<html lang="PL">
    <head>
        <meta charset="UTF-8"/>
        <title>Forum o psach</title>
        <link rel="stylesheet" href="styl.css"/>
    </head>
    <body>
        <main>
            <header>
                <h1>Forum miłośników psów</h1>
            </header>
            <!--LEWY BLOK-->
            <article class="lewy_blok">
                <img src="Avatar.png" alt="Użytkownik forum"/>
                <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "forumpsy";

                    $id_connect = mysqli_connect($server,$user,$password,$database);
                    $query = "SELECT nick,postow,pytanie FROM konta INNER JOIN pytania ON pytania.konta_id=konta.id WHERE pytania.id = 1;";
                    $row = mysqli_query($id_connect,$query);
                    while($row2 = mysqli_fetch_assoc($row))
                    {
                        echo '<h4>Użytkownik: '.$row2['nick'].'</h4>';
                        echo '<p>'.$row2['postow'].' postów na forum</p>';
                        echo '<p>'.$row2['pytanie'].'</p>';
                    }
                    mysqli_close($id_connect);
                ?>
                <video src="video.mp4" controls/>
            </article>
            <!--PRAWY BLOK-->
            <article class="prawy_blok">
                <form action="index.php" method="POST">
                    <input type="textarea" cols="40" rows="4" name="text_odp"/>
                    <button type="submit">Dodaj odpowiedź</button>
                    <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "forumpsy";
                    $text = $_POST['text_odp'];
                    if($text != "")
                    {
                    $id_connect = mysqli_connect($server,$user,$password,$database);
                    $query = "INSERT INTO odpowiedzi(Pytania_id,konta_id,odpowiedz) VALUES (1,5,'$text');";
                    $row = mysqli_query($id_connect,$query);
                    }
                    else
                    {
                        echo "błąd";
                    }
                    mysqli_close($id_connect);
                     ?>
                </form>
                <h2>Odpowiedzi na pytanie</h2>
                <ol>
                <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "forumpsy";

                    $id_connect = mysqli_connect($server,$user,$password,$database);
                    $query = "SELECT odpowiedzi.id, odpowiedz, nick FROM odpowiedzi JOIN konta ON konta_id = konta.id WHERE Pytania_id = 1;";
                    $row3 = mysqli_query($id_connect,$query);
                    while($row4 = mysqli_fetch_assoc($row3))
                    {
                        echo "<li>";
                        echo $row4['odpowiedz'];
                        echo '<em>'.$row4['nick'].'</em>';
                        echo "</li>";
                        echo "<hr></hr>";
                    }
                    mysqli_close($id_connect);
                ?>
                </ol>
            </article>
            <footer>
                <p>Autor: lily</p>
                <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
            </footer>
        </main>
    </body>
</html>