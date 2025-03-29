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
        <form action="tag_modosit_function.php" method="POST" autocomplete="off" accept-charset="utf-8">
            <fieldset>
                <legend style="font-size:25px;font-weight:bold">Módosítás</legend>

               <h3><?php echo $_POST['tag_nev']?> </h3>
                <label>Csapat: <select name="ujtagcsnev"> <?php
                        $csleker = csapatleker();
                        while( $sor = mysqli_fetch_assoc($csleker)){
                            if($_POST['csapat_nev'] === $sor['nev']){
                                echo '<option value="'.$sor['nev'].'" selected>'.$sor['nev'].'</option>';
                            }
                            else{echo '<option value="'.$sor['nev'].'">'.$sor['nev'].'</option>';}
                        }
                        ?>
                    </select>
                </label><br /><br />

                <label>Poszt: <select name="ujtagposzt">
                <?php $posztok = posztleker();
                        while ($sor = mysqli_fetch_assoc($posztok)) {
                            if($_POST['regi_poszt'] === $sor['nev']){
                                echo '<option value="'.$sor['id'].'" selected>'.$sor['nev'].'</option>';
                            }
                            else {
                                echo '<option value="' . $sor['id'] . '">' . $sor['nev'] . '</option>';
                            }
                        }?>
                    </select></label><br /> <br />
                <input type="hidden" name="regitagnev" value="<?php echo $_POST['tag_nev']?>">
                <label><input type="hidden" name="regicsapatnev" value="<?php echo $_POST['csapat_nev']?>">
                <label><input type="hidden" name="regiposzt" value="<?php echo $_POST['regi_poszt_id']?>">
                <input type="submit" name="tagmodosit" value="Módosít" /><br /><br />
                <input type="submit" name="tagtorol" value="Töröl" /> <br />
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

?>