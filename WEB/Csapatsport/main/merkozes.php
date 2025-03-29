<?php
require_once("db_connect.php");
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

?>
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Csapatsport">
        <meta name="author" content="Budai Róbert">
        <meta name="keywords" content="csapat, mérkőzés, eredmény">
        <title>Csapatsport</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header>
        <div id="menu"><ul>
                <li><a href="main.php">Főoldal</a></li>
                <li><a href="csapat.php">Csapatok</a>
                    <ul>
                        <li> <a href="../felvetelek/csapatfelvesz.php">Felvétel</a></li>
                    </ul>
                </li>
                <li><a href="tag.php">Tagok</a>
                    <ul>
                        <li> <a href="../felvetelek/tagfelvetel.php">Felvétel</a></li>
                    </ul>
                </li>
                <li><a href="merkozes.php">Mérkőzések</a>
                    <ul>
                        <li> <a href="../felvetelek/merkozesfelvesz.php">Felvétel</a></li>
                    </ul>
                </li>

                <li><a href="kilep.php">Kilépés</a></li>
            </ul>
        </div>
    </header>
    <div id="main">
        <table>
            <tr><th colspan="6">Mérkőzések</th> </tr>
            <tr>
                <th>1.csapat</th>
                <th>2.csapat</th>
                <th>Helyszín</th>
                <th>Időpont</th>
                <th>Eredmény</th>
                <th>Módosítás</th>

            </tr>
            <?php
            $merkozesek = merkozesleker();

            while( $sor = mysqli_fetch_assoc($merkozesek)){
                echo '<tr>';
                echo '<td>'.$sor['csapatnev1'].'</td>';
                echo '<td>'.$sor['csapatnev2'].'</td>';
                echo '<td>'.$sor['helyszin'].'</td>';
                echo '<td>'.substr($sor['datum'],0,16).'</td>';
                echo '<td>'.$sor['eredmeny'].'</td>';
                echo '<td><form method="POST" action="../modositasok/merkozes_modosit.php">
<input type="hidden" name="eredeti_csapatnev1" value="' . $sor['csapatnev1'] . '">
<input type="hidden" name="eredeti_csapatnev2" value="' . $sor['csapatnev2'] . '">
<input type="hidden" name="eredeti_merkozes_helyszin" value="' . $sor['helyszin'] . '">
<input type="hidden" name="eredeti_merkozes_datum" value="' . $sor['datum'] . '">
<input type="hidden" name="eredeti_eredmeny" value="' . $sor['eredmeny'] . '">
<input type="submit" value="Módosít" class="mode">
</form> </td>';
                echo '</tr>';
            }
            mysqli_free_result($merkozesek);
            ?>
        </table>
    </div>
    </body>
    </html>
<?php
