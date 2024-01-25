<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Warzywniak</title>
        <link rel="stylesheet" href="styl2.css"/>
    </head>
<body>
    <!--DWA BLOKI BANERA-->
     <!--1 BLOK BANERA LEWY-->
    <header id="banner_left">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </header>
     <!--2 BLOK BANERA PRAWY -->
    <header id="banner_right">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </header>
    <!--BLOK GŁÓWNY-->
    <article id="main_section">
        <!--BLOK PRODUKTÓW GENEROWANE PRZEZ SKRYPT-->
        <section>
        <?php
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "dane2";
            $id_connect = mysqli_connect($server,$user,$password,$database);
            $query = "SELECT nazwa,ilosc,opis,cena,zdjecie FROM produkty WHERE rodzaje_id IN(1,2)";
            $result = mysqli_query($id_connect,$query);
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<section class="s1">';
                echo '<img src="'.$row['zdjecie'].'" alt="warzywniak"/>';
                echo '<h5>'.$row['nazwa'].'</h5>';
                echo '<p>opis: '.$row['opis'].'</p>';
                echo '<p>na stanie: '.$row['ilosc'].'</p>';
                echo '<h2>'.$row['cena'].' zł </h2>';
                echo '</section>';
            }
       ?>
       <section>
        <?php
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            if(isset($nazwa) && isset($cena))
            {
                $query2 = "INSERT INTO produkty (Rodzaje_id,Producenci_id,nazwa,ilosc,opis,cena,zdjecie) VALUES (1,4,'$nazwa',10,null,$cena,'owoce.jpg')";
                $result = mysqli_query($id_connect,$query2);
                ini_set('display_errors', 0);

                if($result)
                {
                    echo '<section class="s1">';
                    echo '<img src="'.$result['zdjecie'].'" alt="warzywniak"/>';
                    echo '<h5>'.$result['nazwa'].'</h5>';
                    echo '<p>opis: '.$result['opis'].'</p>';
                    echo '<p>na stanie: '.$result['ilosc'].'</p>';
                    echo '<h2>'.$result['cena'].' zł </h2>';
                    echo '</section>';  
                }
                else
                {
                    echo "Error";
                }
            }
            mysqli_close($id_connect);
        ?>
        <section>
    </section>
    </article>
    <footer>
    <form method="POST" action="sklep.php">
        <label for="text">Nazwa: </label>
        <input type="text" name="nazwa"/>
        <label for="number">Cena: </label>
        <input type="number" name="cena"/>
        <input type="submit" name="button" value="Dodaj produkt"/>
    </form>
    <p>Stronę wykonał: lily </p>
    </footer>
</body>
    </html>