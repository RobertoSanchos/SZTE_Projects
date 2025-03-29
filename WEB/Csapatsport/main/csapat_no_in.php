<?php
require_once "db_connect.php"
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
                <li><a href="../index.php">Főoldal</a></li>
                <li><a href="csapat_no_in.php">Csapatok</a></li>
                <li><a href="tag_no_in.php">Tagok</a></li>
                <li><a href="merkozes_no_in.php">Mérkőzések</a></li>
                <li><a href="bere.php" style="width: 270px; padding-left: 70px">Belépés / Regisztráció</a></li>
        </div>
    </header>
    <div id="main">
        <table><tr><th colspan="5">Csapatok</th> </tr>
            <tr>
                <th>Név</th>
                <th>Város</th>
                <th>Alapítás éve</th>
            </tr>
            <?php
            $csapatok = csapatleker();
            while ($sor = mysqli_fetch_assoc($csapatok)) {
                echo '<tr>';
                echo '<td>'.$sor['nev'].'</td>';
                echo '<td>'.$sor['varos'].'</td>';
                echo '<td>'.$sor['alapitaseve'].'</td>';
            }
            mysqli_free_result($csapatok);

            ?>

        </table>
    </div>
    </body>
    </html>
