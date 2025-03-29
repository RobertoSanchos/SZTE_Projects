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
        <form action="#" method="POST" autocomplete="off">
            <fieldset>
                <legend style="font-size:25px;font-weight:bold">Csapatfelvétel</legend>
                <label><input type="text" name="csapnev" maxlength="50" size="25" placeholder="Név"  /></label><br /><br />
                <label><input type="text" name="csapvaros" maxlength="50" size="25" placeholder="Város"  /></label><br /><br />
                <label><input type="text" name="csapalapit" maxlength="50" size="25" placeholder="Alapítás éve"  /></label><br /><br />
                <input type="submit" name="felvisz" value="felvétel" /> <br />
                <h3 style="color: red">  <?php
                    include "felvetelek.php";
                    csapatfelvesz();
                    ?></h3>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

