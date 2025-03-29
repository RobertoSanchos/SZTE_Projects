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
    <table>
        <tr><th colspan="6">Mérkőzések</th> </tr>
        <tr>
            <th>1.csapat</th>
            <th>2.csapat</th>
            <th>Helyszín</th>
            <th>Időpont</th>
            <th>Eredmény</th>
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
            echo '</tr>';
        }
        mysqli_free_result($merkozesek);
        ?>
    </table>
</div>
</body>
</html>
