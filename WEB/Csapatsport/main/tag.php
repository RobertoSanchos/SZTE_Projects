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
            <tr><th colspan="6">Csapattagok</th> </tr>
            <tr>
                <th>Név</th>
                <th>Születési dátum</th>
                <th>Állampolgárság</th>
                <th>Csapat neve</th>
                <th>Poszt</th>
                <th>Módosít</th>
            </tr>
            <?php
            $tagok = tagokleker();

            while( $sor = mysqli_fetch_assoc($tagok)) {
                echo '<tr>';
                echo '<td>' . $sor['nev'] . '</td>';
                echo '<td>' . $sor['szuletesidatum'] . '</td>';
                echo '<td>' . $sor['allampolgarsag'] . '</td>';
                echo '<td>' . $sor['csapatnev'] . '</td>';
                echo '<td>' . $sor['Poszt'] . '</td>';
                echo '<td><form method="POST" action="../modositasok/tag_modosit.php">
<input type="hidden" name="tag_nev" value="' . $sor['nev'] . '">
<input type="hidden" name="csapat_nev" value="' . $sor['csapatnev'] . '">
<input type="hidden" name="regi_poszt_id" value="' . $sor['poszt_id'] . '">
<input type="hidden" name="regi_poszt" value="' . $sor['Poszt'] . '">
<input type="submit" value="Módosít" class="mode">
</form> </td>';
            }
            mysqli_free_result($tagok);
            ?>
</table>
</div>
</body>
</html>