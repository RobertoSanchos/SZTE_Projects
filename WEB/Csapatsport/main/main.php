<?php session_start();
if(!isset($_SESSION["user"])){
    header("Location: ../index.php");
}
require_once ("db_connect.php")
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
<div id="main"><h1>Üdvözzöllek a jégkorong ligában!</h1>
   <p style="text-align: center"> <img src="../css/logo.png" alt="NHL_logo"></p>
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
<?php
