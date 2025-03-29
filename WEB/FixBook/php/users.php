<?php session_start();
include "eleres.php";
if(isset($_SESSION["user"])){
    header("Location: in.php");
}
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
        <li><a href="users.php" style="color: #d0b588">Belépés</a></li>
        <li><a href="#kapcs">Kapcsolatfelvétel</a></li>
    </ul></div>
    <form name="keres" id="keres">
         <label><input type="search" name="keres" size="20" maxlength="30" placeholder="Mit keresel?" /></label>
        <input type="submit" value="Keresés"/>
    </form>
</header>
<div id="main">

<div class="bejelent">
<form action="users.php" method="POST" autocomplete="off">
        <fieldset>
            <legend style="font-size:25px;font-weight:bold">Bejelentkezés</legend>
         <label><input type="text" name="bnev" maxlength="50" size="25" placeholder="Felhasználónév"  /></label>
            <label><br><br><input type="password" name="bpassw" placeholder="Jelszó" maxlength="50" size="25" /><br /><br /></label>

            <input type="submit" name="belep" value="Belépés" /> <br /><br /><a href="#">Elfelejtett jelszavát?</a>
            <h3 style="color: red"> <?php include "belep.php"?></h3>
        </fieldset>
    </form>
</div>
    <div class="regiszt">
        <form action="users.php" method="POST" autocomplete="off">
            <fieldset style="height: 100%">
                <legend style="font-size:25px;font-weight:bold">Regisztráció</legend>
                <label><input type="text" name="tnev" maxlength="50" size="25" placeholder="Név" /></label>
                <label><input type="email" name="email" placeholder="E-mail cím" maxlength="50" size="25"
                             value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>"/><br /><br /></label>
                <label> Születési dátum <br /><input type="date" name="szuldatum" /> </label><br/><br/>
                <label> <input type="text" name="felh" maxlength="50" size="25" placeholder="Felhasználónév"
                             value="<?php if(isset($_POST["felh"])) echo $_POST["felh"]?>" /></label><br/><br/>
                <label> <input type="password" name="rpassw" placeholder="Jelszó" maxlength="50" size="25" /></label>
                    <label><input type="password" name="r2passw" placeholder="Jelszó újra" maxlength="50" size="25" /></label>
              <br /> <br />Milyen laptop márkát preferálsz? <br/> <br/><label><select>
                <option>ACER</option>
                <option>ASUS</option>
                <option selected>HP</option>
                <option>MSI</option>
                <option>Egyéb</option>
            </select></label><br /> <br />
                <label> Elmúltam 16 éves<input type="checkbox" name="check[]" value="kor"><br /> <br /></label>
                <label> Elolvastam és megértettem a feltételeket<input type="checkbox" name="check[]" value="feltet"></label>
                <div style="text-align: center;">
                    <br/>  <br/> <input type="submit" name="reg" value="Regisztráció"><input type="reset" name="vissza" value="Visszaállítás" ><br><br></div>
                <p style="color:red; font-weight:bold; font-size:17px;">
                    <?php include "regi.php"; ?>
                </p>
            </fieldset>
        </form>

    </div>
</div>
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