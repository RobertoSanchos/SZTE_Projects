<?php
require_once("../main/db_connect.php");
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
            <li><a href="../main/main.php">Főoldal</a></li>
            <li><a href="../main/csapat.php">Csapatok</a>
                <ul>
                    <li> <a href="../felvetelek/csapatfelvesz.php">Felvétel</a></li>

                </ul>
            </li>
            <li><a href="../main/tag.php">Tagok</a>
                <ul>
                    <li> <a href="../felvetelek/tagfelvetel.php">Felvétel</a></li>

                </ul>
            </li>
            <li><a href="../main/merkozes.php">Mérkőzések</a>
                <ul>
                    <li> <a href="../felvetelek/merkozesfelvesz.php">Felvétel</a></li>

                </ul>
            </li>
            <li><a href="../main/kilep.php">Kilépés</a></li>
        </ul>
    </div>
</header>
<div id="main">
    <div class="bejelent">
        <form action="#" method="POST" autocomplete="off" accept-charset="utf-8">
            <fieldset>
                <legend style="font-size:25px;font-weight:bold">Tagfelvétel</legend>
                <label><input type="text" name="tagnev" maxlength="50" size="25" placeholder="Név"  /></label><br /><br />
                <label>Poszt:  <select name="tagposzt">
                        <?php $posztok = posztleker();
                        while ($sor = mysqli_fetch_assoc($posztok)) {
                            echo '<option value="'.$sor['id'].'">'.$sor['nev'].'</option>';
                        }?>
                    </select></label><br /> <br />
                <label>Csapat: <select name="tagcsnev"> <?php
                    $csleker = csapatleker();
                        while( $sor = mysqli_fetch_assoc($csleker)){
                        echo '<option value="'.$sor['nev'].'">'.$sor['nev'].'</option>';
                    }
                    ?>
                    </select>
                </label><br /><br />
                <label><input type="date" name="tagszuldatum" /> </label><br/><br/>
                <label><input type="text" name="tagallam" maxlength="50" size="25" placeholder="Állampolgárság"  /></label><br /><br />
                <input type="submit" name="felvisz" value="felvétel" /> <br />
                <h3 style="color: red">  <?php
                    include_once"felvetelek.php";
                    tagotfelvesz();
                    ?></h3>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

