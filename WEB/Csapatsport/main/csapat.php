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
    <table><tr><th colspan="5">Csapatok</th> </tr>
        <tr>
            <th>Név</th>
            <th>Város</th>
            <th>Alapítás éve</th>
            <th>Módosít</th>
        </tr>
<?php
$csapatok = csapatleker();
    while ($sor = mysqli_fetch_assoc($csapatok)) {
        echo '<tr>';
        echo '<td>'.$sor['nev'].'</td>';
        echo '<td>'.$sor['varos'].'</td>';
        echo '<td>'.$sor['alapitaseve'].'</td>';
        echo '<td><form method="POST" action="../modositasok/csapat_modosit.php">
<input type="hidden" name="csapat_nev" value="' .$sor['nev'].'">
<input type="hidden" name="csapat_varos" value="' .$sor['varos'].'">
<input type="hidden" name="csapat_alapitaseve" value="' .$sor['alapitaseve'].'">
<input type="submit" value="Módosít" class="mode">
</form> </td>';
    }
mysqli_free_result($csapatok);

?>

    </table>
</div>
</body>
</html>
