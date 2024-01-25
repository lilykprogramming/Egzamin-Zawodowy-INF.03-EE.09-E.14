<!DOCTYPE html>
<html lang="PL">
    <head>
        <meta charset="UTF-8">
        <title>Opinie klientów</title>
        <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <!--BANNER-->
    <header>
        <nav>
            <h1>Hurtownia spożywcza</h1>
        </nav>
    </header>
    <!--BLOK GŁÓWNY-->
    <article>
        <h2>Opinie naszych klientów</h2>
             <!--SKRYPT 1-->
        <?php
                $server = "localhost";
                $user = "root";
                $password = "";
                $database = "hurtowania";

                $id_connect = mysqli_connect($server,$user,$password,$database);
                $query = "SELECT zdjecie,imie,opinia FROM klienci INNER JOIN opinie ON opinie.Klienci_id=klienci.id WHERE Typy_id IN(2,3);";
                $row = mysqli_query($id_connect,$query);
                while($row2 = mysqli_fetch_assoc($row))
                {
                    echo '<section>';
                    echo '<img src="'.$row2['zdjecie'].'" alt="klient"/>';
                    echo '<blockquote>'.$row2['opinia'].'</blocquote>';
                    echo '<h4>'.$row2['imie'].'</h4>';
                    echo '</section>';
                }
                mysqli_close($id_connect);
            ?>
    </article>
    <!--BLOKI STOPKI Cztery bloki-->
   <footer>
        <h3>Współpracują z nami</h3>
        <a href="http://sklep.pl/">Sklep 1</a>
    </footer>
    <footer>
        <h3>Nasi top klienci</h3>
        <ol>
            <?php
                  $server = "localhost";
                  $user = "root";
                  $password = "";
                  $database = "hurtowania";
  
                  $id_connect = mysqli_connect($server,$user,$password,$database);
                  $query = "SELECT imie,nazwisko,punkty FROM klienci ORDER BY punkty DESC LIMIT 3;";
                  $row = mysqli_query($id_connect,$query);
                  while($row2 = mysqli_fetch_assoc($row))
                  {
                      echo '<li>';
                      echo $row2['imie'].' '.$row2['nazwisko'].', '.$row2['punkty'].' pkt';
                      echo '</li>';
                  }
                  mysqli_close($id_connect);
            ?>
        </ol>
    </footer>
    <footer>
        <h3>Skontaktuj się</h3>
        <p>telefon: 111222333</p>
    </footer>
    <footer>
        <h3>Autor: lily </h3>
    </footer>
</body>
</html>