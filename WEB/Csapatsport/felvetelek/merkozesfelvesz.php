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
                <legend style="font-size:25px;font-weight:bold">Mérkőzésfelvétel</legend>
                <label>1.Csapat: <select name="csapat_1"> <?php
                        $csleker = csapatleker();
                        while( $sor = mysqli_fetch_assoc($csleker)){
                            echo '<option value="'.$sor['nev'].'">'.$sor['nev'].'</option>';
                        }
                        ?>
                    </select> </label><br /> <br />
                    <label>2.Csapat: <select name="csapat_2"> <?php
                            $csleker = csapatleker();
                            while( $sor = mysqli_fetch_assoc($csleker)){
                                echo '<option value="'.$sor['nev'].'">'.$sor['nev'].'</option>';
                            }
                            ?>
                        </select></label> <br /> <br />
                        <label><input type="text" name="helyszin" maxlength="50" size="25" placeholder="Helyszín"  /></label><br /><br />
                <label><input type="datetime-local" name="meccsdatum" /> </label><br/><br/>

                <input type="submit" name="merkozesfelvisz" value="felvétel" /> <br />
                <h3 style="color: red">  <?php
                    include "felvetelek.php";
                    merkozesfelvesz();
                    ?></h3>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

