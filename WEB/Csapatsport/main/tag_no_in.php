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
<header>
    <div id="menu"><ul>
            <li><a href="../index.php">Főoldal</a></li>
            <li><a href="csapat_no_in.php">Csapatok</a></li>
            <li><a href="tag_no_in.php">Tagok</a></li>
            <li><a href="merkozes_no_in.php">Mérkőzések</a></li>
            <li><a href="bere.php" style="width: 270px; padding-left: 70px">Belépés / Regisztráció</a></li>
    </div>
</header><div id="main">
<table>
    <tr><th colspan="6">Csapattagok</th> </tr>
    <tr>
        <th>Név</th>
        <th>Születési dátum</th>
        <th>Állampolgárság</th>
        <th>Csapat neve</th>
        <th>Poszt</th>
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
}
mysqli_free_result($tagok);
?>
</table>
</div>
</body>
</html>
