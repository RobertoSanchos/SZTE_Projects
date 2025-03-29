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
        <form action="merkozes_modosit_function.php" method="POST" autocomplete="off" accept-charset="utf-8">
            <fieldset>
                <legend style="font-size:25px;font-weight:bold">Mérkőzésmódosítás</legend>

                <label>1.Csapat: <select name="csapat_1"> <?php
                        $csleker = csapatleker();
                        while( $sor = mysqli_fetch_assoc($csleker)){
                            if($_POST['eredeti_csapatnev1'] === $sor['nev']){
                            echo '<option value="'.$sor['nev'].'" selected>'.$sor['nev'].'</option>';
                            }
                            else {
                                echo '<option value="' . $sor['nev'] . '">' . $sor['nev'] . '</option>';
                            }
                        }
                        ?>
                    </select> </label><br /> <br />
                <label>2.Csapat: <select name="csapat_2"> <?php
                        $csleker = csapatleker();
                        while( $sor = mysqli_fetch_assoc($csleker)) {
                            if ($_POST['eredeti_csapatnev2'] === $sor['nev']) {
                                echo '<option value="' . $sor['nev'] . '" selected>' . $sor['nev'] . '</option>';
                            } else {
                                echo '<option value="' . $sor['nev'] . '">' . $sor['nev'] . '</option>';
                            }
                        }
                        ?>
                    </select></label> <br /> <br />

                <label><input type="text" name="modositott_helyszin" maxlength="50" size="25" placeholder="Helyszín" value=<?php echo $_POST['eredeti_merkozes_helyszin']?> /></label><br /><br />
                <label><input type="datetime-local" name="modositott_meccsdatum" value=<?php
                    $rogzitett = date("Y-m-d H:i:s", strtotime($_POST['eredeti_merkozes_datum']));
                    $valtozoba = date("Y-m-d\TH:i:s", strtotime($rogzitett));
                   echo $valtozoba;
                   ?> /></label><br /> <br />
                Jelenlegi Eredmény:<br><br>
                <?php echo $_POST['eredeti_eredmeny']?><br>
                <br>Eredmény módosítása:<br><br>
                <label><input type="text" maxlength="1" size="1" name="hazai" value="<?php if($_POST['eredeti_eredmeny'] != 'Nincs rögzítve'){echo $_POST['eredeti_eredmeny'][0];}?>"> : <input type="text" maxlength="1" size="1" name="vendeg" value="<?php if($_POST['eredeti_eredmeny'] != 'Nincs rögzítve'){echo $_POST['eredeti_eredmeny'][4];}?>"><br><br></label>
                <label><input type="hidden" name="eredeti_csapatnev1" value="<?php echo $_POST['eredeti_csapatnev1'] ?>"></label>
                <label><input type="hidden" name="eredeti_csapatnev2" value="<?php echo $_POST['eredeti_csapatnev2']?>"></label>
                <label><input type="hidden" name="eredeti_merkozes_helyszin" value="<?php echo $_POST['eredeti_merkozes_helyszin']?>"></label>
                <label> <input type="hidden" name="eredeti_merkozes_datum" value="<?php echo $_POST['eredeti_merkozes_datum']?>"></label>
                <label> <input type="hidden" name="eredeti_eredmeny" value="<?php echo $_POST['eredeti_eredmeny']?>"></label>
                <input type="submit" name="merkozes_modosit" value="Módosít" />
                <input type="submit" name="merkozes_torol" value="Töröl" /> <br />
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

