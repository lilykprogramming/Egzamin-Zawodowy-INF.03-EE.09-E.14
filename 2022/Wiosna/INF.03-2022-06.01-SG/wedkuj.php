<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Wędkowanie</title>
        <link rel="stylesheet" href="styl1.css">
    </head>
<body>
    <!--BANNER-->
        <header>
            <nav><h1>Portal dla wędkarzy</h1></nav>
        </header>
        <!--BLOK LEWY-->
        <article class="blok_lewy" id="blok_lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $database = "wedkowanie";

                    $id_connect = mysqli_connect($server,$user,$password,$database);
                    $query = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM lowisko INNER JOIN ryby ON ryby.id=lowisko.Ryby_id WHERE rodzaj=3;";
                    $row = mysqli_query($id_connect,$query);
                    while($row1 = mysqli_fetch_assoc($row))
                    {
                        echo '<li>';
                        echo $row1['nazwa'].' pływa w rzece'.$row1['akwen'].' , '.$row1['wojewodztwo'];
                        echo '</li>';
                    }
                    mysqli_close($id_connect);
                ?>
            </ol>
        </article>
        <!--BLOK LEWY-->
    <article class="blok_lewy" id="blok_lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table border=1>
            <th>
                L.p
            </th>
            <th>
                Gatunek
                </th>
             <th>
                Występowanie
                </th>
            <?php
                                $server = "localhost";
                                $user = "root";
                                $password = "";
                                $database = "wedkowanie";
            
                                $id_connect = mysqli_connect($server,$user,$password,$database);
            $query2 = "SELECT id,nazwa,wystepowanie FROM ryby WHERE styl_zycia = 1;";
            $row3 = mysqli_query($id_connect,$query2);
            while($row4 = mysqli_fetch_assoc($row3))
            {
                echo '<tr>';
                echo '<td>';
                echo $row4['id'];
                echo '</td>';
                echo '<td>';
                echo $row4['nazwa'];
                echo '</td>';
                echo '<td>';
                echo $row4['wystepowanie'];
                echo '</td>';
                echo '</tr>';
            }
            mysqli_close($id_connect);
            ?>
        </table>
    </article>
    <!--BLOK PRAWY PO URUCHOMIENIU PRZEGLĄDARKI -->
    <section class="blok_prawy">
        <img src="ryba1.jpg" alt="Sum"/>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <footer>
        <p>Stronę wykonał: lily</p>
    </footer>
</body>
</html>