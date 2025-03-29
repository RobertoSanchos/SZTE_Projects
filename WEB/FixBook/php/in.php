<?php session_start();
include "eleres.php";
if(!isset($_SESSION["user"])){header("Location: users.php");}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="laptopok javítása">
    <meta name="author" content="Zoli & Robi">
    <meta name="keywords" content="laptop, notebook, szervíz">
    <title>FixBook laptop szervíz</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">
    <link rel="icon" href="../img/icon.png">
</head>
<body>
<input type="checkbox" id="change" style="position: absolute; z-index:1">
<label for="change" class="dark"><img src="../img/bulb_on1.png" alt="egoki" title="Sötét mód"></label>
<label for="change" class="light"><img src="../img/bulb_off.png" alt="egobe" title="világos mód"></label>
<header>
    <a href="index.php"><img src="../img/logos.png" alt="Logo_head" style="float:left;"></a>
    <div id="nav"><ul>
            <li><a href="index.php">Főoldal</a></li>
            <li><a href="szolg.php">Szolgáltatások</a></li>
            <li><a href="arak.php">Árak</a></li>
            <li><a href="rolunk.php">Rólunk</a></li>
            <?php if(!isset($_SESSION["user"])):?>
            <li><a href="users.php">Belépés</a></li>
            <?php else: ?>
            <li><a href="#kapcs">Kapcsolatfelvétel</a></li>
            <li><a href="in.php" style="color: #d0b588">Profil</a></li>
            <li><a href="out.php">Kijelentkezés</a></li>
            <?php endif;?>

        </ul></div>
    <form name="keres" id="keres">
        <label> <input type="search" name="keres" size="20" maxlength="30" placeholder="Mit keresel?" required /></label>
        <input type="submit" value="Keresés"/>
    </form>
</header>
<h2 style="text-align: center; color:darkred;margin-top: 60px"><?php echo "Üdvözöllek ".$_SESSION["user"]."!"; ?></h2>
<main id="main">
    <div class="regiszt" style="margin-left: auto; margin-top: 20px; margin-right: 200px; max-width: 320px">
        <form action="in.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <fieldset style="height: 100%;text-align: center;">
        <legend style="font-size:25px;font-weight:bold"><?php echo $_SESSION["user"]?></legend>
        <img src="uploads/<?php
        $i = 0;
        $diry = scandir("uploads");
        foreach($diry as $file){
        $cuty = explode(".", $file);
        $ter = strtolower(end($cuty));
        if($_SESSION["user"].".$ter" === $file){
        echo $_SESSION["user"].".$ter";
        $i++;
        break;
        }
        }
        if($i == 0){
            echo "default.png";
        }
?>" style="border-radius: 10px; width: 150px" alt="Nincs profilkép beállítva!">
        <h3>Profilkép csere</h3>
            <input type="file" id="profile" name="profile" accept="image/*"/> <br/><br>
            <input type="submit" name="upload" value="Csere"/><br><br>
        <h3 style="color: red; text-align: center"><?php
            if(isset($_POST["upload"])) {

                if (isset($_FILES["profile"]) && is_uploaded_file($_FILES["profile"]["tmp_name"])) {
                    $cut = explode(".", $_FILES["profile"]["name"]);
                    $terj = strtolower(end($cut));
                    $file_name = $_SESSION["user"];
                    $cel = "uploads/$file_name.$terj";
                    if ($_FILES["profile"]["size"] > 31457280) {
                        echo "A fájl mérete maximum 30 mb lehet!";
                    }
                    if(file_exists($cel)) {
                        unlink($cel);
                    }
                    move_uploaded_file($_FILES["profile"]["tmp_name"], $cel);
                    if ($_FILES["profile"]["error"] === 0) {
                        header("Location:in.php");
                    }
                    else {
                        echo "Hiba történt a fájl feltöltése közben!";
                    }
                }
                else echo "Először válaszd ki a fájlt!";

            }
            ?> </h3>

        <h3>Fiók törlése</h3>
        <input type="submit" name="delete" value="Törlés"/>
        <h3 style="color: red; text-align: center">
            <?php
            $siker = false;
        if(isset($_POST["delete"])) {
            global $siker;
            $seged = [];
            $j = 0;
            $csere = load_users("felhasznalok.txt");
            for ($i = 0; $i < (count($csere)) - 1; $i++) {
                if ($csere[$i]["felhasznalo"] === $_SESSION["user"]) {
                    $j++;
                }
                $seged[$i] = $csere[$j];
                $j++;
            }
            if (count($seged) == 0) {
                $ki2 = fopen("felhasznalok.txt", 'w');
                fwrite($ki2, "");
                fclose($ki2);
            }
            else {
                for ($i = 0; $i < count($seged); $i++) {
                    if ($i == 0) {
                        $ki1 = fopen("felhasznalok.txt", 'w');
                        fwrite($ki1, serialize($seged[$i]));
                        fclose($ki1);
                    } else {
                        $ki2 = fopen("felhasznalok.txt", 'a');
                        fwrite($ki2, "\n" . serialize($seged[$i]));
                        fclose($ki2);
                    }
                }
            }
            if($seged != $csere){
                $siker = true;
            }
        }
            if($siker){
            $diry = scandir("uploads");
            foreach($diry as $file){
            $cuty = explode(".", $file);
            $ter = strtolower(end($cuty));
            if($_SESSION["user"].".$ter" === $file) {
                unlink("uploads/".$_SESSION["user"].".$ter");
            }
            }
                $_SESSION = [];
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), session_id(), time() - 1200, '/');
                }
                session_destroy();
                  header("Location: index.php");
              }


        ?>
        </h3>

    </fieldset>
        </form>
    </div>
    <div class="regiszt" style="margin-top: 20px; max-width: 270px">
        <form action="in.php" method="POST" autocomplete="off">
            <fieldset style="text-align: center; max-height: 100%">
                <legend style="font-size:25px;font-weight:bold">Adatmódosítás</legend>
                <h3 style="text-decoration: underline">Jelszó</h3>
                <label><input type="password" name="passw1" maxlength="50" size="25" placeholder="Régi jelszó"  /></label>
                <label><br><br><input type="password" name="passw2" placeholder="Új Jelszó" maxlength="50" size="25" /><br /><br /></label>
                <input type="submit" name="modosit" value="Módosít" /><br><br>
                <h3 style="color: red; text-align: center"> <?php  $csere = load_users("felhasznalok.txt");
                    if(isset($_POST["modosit"])) {
                        $seged = [];
                        if(isset($_POST["passw1"]) && trim($_POST["passw1"]) !== "" && isset($_POST["passw2"]) && trim($_POST["passw2"] !== "")){
                        for ($i = 0; $i < count($csere); $i++) {
                            if(password_verify($_POST["passw1"], $csere[$i]["jelszo"]) && $csere[$i]["felhasznalo"] === $_SESSION["user"]) {
                                $csere[$i]["jelszo"] = password_hash($_POST["passw2"], PASSWORD_DEFAULT);
                                $seged = $csere[$i];
                                $csere[$i] = $seged;
                                echo "A Jelszót sikeresen lecserélted, kérlek jelentkezz ki, és lépj be újra!";
                            }
                        }
                        if(!$seged) echo "A régi jelszó nem stimmel!";
                        for ($i = 0; $i < count($csere); $i++){
                            if($i == 0){
                                $ki1 = fopen("felhasznalok.txt", 'w');
                                fwrite($ki1, serialize($csere[$i]));
                                fclose($ki1);
                            }
                            else{ $ki2 = fopen("felhasznalok.txt", 'a');
                            fwrite($ki2, "\n".serialize($csere[$i]));
                            fclose($ki2);}
                        }

                    }
                        else echo "Hiányos kitöltés!";
                    }

                    ?></h3>
                <h3 style="text-decoration: underline">E-mail</h3>
                <label><input type="email" name="email" maxlength="50" size="25" placeholder="Régi E-mail cím"  /></label><br><br>
                <label><input type="email" name="email1" maxlength="50" size="25" placeholder="Új E-mail cím"  /></label><br><br>
                <input type="submit" name="modosit1" value="Módosít" /><br>
                <h3 style="color: red; text-align: center">
                    <?php
                    $bool = false;
                    $csere = load_users("felhasznalok.txt");
                    if(isset($_POST["modosit1"])) {
                        if (isset($_POST["email1"]) && trim($_POST["email1"]) !== "") {
                            for ($i = 0; $i < count($csere); $i++) {
                                if ($csere[$i]["email"] === $_POST["email"]) {
                                    $bool = true;
                                    $seged = [];
                                    $csere[$i]["email"] = $_POST["email1"];
                                    $seged = $csere[$i];
                                    $csere[$i] = $seged;
                                    echo "<br>Az E-mail címet sikeresen lecserélted!";
                                }
                            }
                            for ($i = 0; $i < count($csere); $i++){
                                if($i == 0){
                                    $ki1 = fopen("felhasznalok.txt", 'w');
                                    fwrite($ki1, serialize($csere[$i]));
                                    fclose($ki1);
                                }
                                else{ $ki2 = fopen("felhasznalok.txt", 'a');
                                    fwrite($ki2, "\n".serialize($csere[$i]));
                                    fclose($ki2);}
                            }
                         if(!$bool) echo "Nem egyezik a régi E-mail címed!";
                        }
                        else echo "Hiányos kitöltés!";
                    }
                    ?>
                </h3>
            </fieldset>

        </form>

    </div>


</main>
<footer>
    <form class="kapcs" name="kapcsolat" id="kapcs" autocomplete="off">
        <fieldset>
            <legend style="font-size:25px;font-weight:bold">Kapcsolat</legend>
            <label><input type="text" name="tnev" maxlength="50" size="25" placeholder="Név" required /></label>
            <label><input type="email" name="email" placeholder="E-mail cím" maxlength="50" size="25" required /></label><br /><br />
            <label><textarea name="uzenet" cols="54" rows="8" placeholder="írj üzenetet nekünk" required >
            </textarea></label><br /><br />
            <label for="kapcsfel"> <input type="submit" name="kuld" value="Kapcsolatfelvétel" id="kapcsfel"></label>
        </fieldset>
    </form>
    <div id="egyberak">
        <table class="elerhetoseg"><caption>Elérhetőségünk</caption>
            <tr><td><img src="../img/gps.png" alt="GPS Logo"></td> <td>Makói szervíz<br>
                    6900, Makó Csízma utca 3.</td></tr>
            <tr><td><img src="../img/gps.png" alt="GPS Logo" ></td> <td>Szegedi szervíz<br>
                    6792, Szeged Ábrahám utca 11.</td></tr>
            <tr><td>  <img src="../img/email.png" alt="E-mail Logo"></td><td> <a href="mailto:fixbookservice@gmail.com">fixbookservice@gmail.com</a>
                </td></tr>
            <tr><td><img src="../img/telefon.png" alt="Telefon Logo"></td> <td>Makó: +36 62 510 443<br />
                    Szeged: +36 62 399 8198</td></tr></table>

        <table class="side">
            <caption> Értékeléseink</caption>
            <tr><th colspan="3">Makói szervíz</th></tr>
            <tr><td><img src="../img/google.png" alt="Google Logo"></td> <td><img src="../img/stars.png" alt="Csillagok"> </td><td>( 4,52 ) </td></tr>
            <tr><th colspan="3">Szegedi szervíz</th></tr>
            <tr><td><img src="../img/google.png" alt="Google Logo"></td> <td><img src="../img/stars.png" alt="Csillagok"> </td><td>( 4,58 ) </td></tr>
        </table>
        <table class="social">
            <caption> <img src="../img/logos.png" alt="Fixbook Logo"></caption>
            <tr><th>Partnereink</th></tr>
            <tr><td><a href="https://muszakilapi.hu">www.muszakilapi.hu</a></td></tr>
            <tr><td><a href="https://javitomuhely.hu">www.javitomuhely.hu</a></td></tr>
            <tr><th>Social</th></tr>
            <tr><td><a href="https://facebook.com"><img src="../img/face.png" alt="Facebook Logo"></a>
                    <a href="https://instagram.com"><img src="../img/insta.png" alt="Instagramm Logo"></a>
                    <a href="https://twitter.com"><img src="../img/twitter.png" alt="Twitter Logo"></a>
                    <a href="https://youtube.com"><img src="../img/youtube.png" alt="Youtube Logo"></a>
                </td></tr>

        </table>
    </div>
    <p style="text-align: center;color: lightgray;margin-bottom:10px ;background-color:darkslategray;width: 100%;float:left">&#128187; Fixbook.hu 2024 &copy; Minden jog fenntartva</p>
</footer>

</body>

</html>