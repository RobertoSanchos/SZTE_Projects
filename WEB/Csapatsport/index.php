<?php
require_once "main/db_connect.php"
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Csapatsport">
    <meta name="author" content="Budai Róbert">
    <meta name="keywords" content="csapat, mérkőzés, eredmény">
    <title>Csapatsport</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div id="menu"><ul>
            <li><a href="index.php">Főoldal</a></li>
            <li><a href="main/csapat_no_in.php">Csapatok</a></li>
            <li><a href="main/tag_no_in.php">Tagok</a></li>
            <li><a href="main/merkozes_no_in.php">Mérkőzések</a></li>
            <li><a href="main/bere.php" style="width: 270px; padding-left: 70px">Belépés / Regisztráció</a></li>
    </div>
</header>
<div id="main"><h1>Üdvözzöllek a jégkorong ligában!</h1>
    <p style="text-align: center"> <img src="css/logo.png" alt="NHL_logo"></p>
    <table><tr><th colspan="5">Statisztika</th> </tr>
        <tr>
            <th>Név</th>
            <th>Mérkőzések</th>
            <th>Győzelem</th>
        </tr>
        <?php
        $db = 0;
        $csapatok_statisztika = csapatokstatisztika1();
        $csapatok_statisztika2 = csapatokstatisztika2();
        while ($sor = mysqli_fetch_assoc($csapatok_statisztika)) {
            echo '<tr>';
            echo '<td>'.$sor['nev'].'</td>';
            echo '<td>'.$sor['osszes_meccs'].'</td>';
            while($sor2 = mysqli_fetch_assoc($csapatok_statisztika2)) {
                if ($sor2['nyertes'] == $sor['nev']) {
                    echo '<td>'.$sor2['nyeresek'].'</td>';
                    $db++;
                    break;
                }
            }
            $csapatok_statisztika2 = csapatokstatisztika2();
            if ($db === 0) {
                echo '<td> 0 </td>';
            }
            $db = 0;
            echo '</tr>';
        }
        mysqli_free_result($csapatok_statisztika);
        mysqli_free_result($csapatok_statisztika2);

        ?>
</div>
</body>
</html>
