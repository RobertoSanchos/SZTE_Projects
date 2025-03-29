<?php session_start();
if(isset($_SESSION["user"])){
    header("Location:main.php");
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
            <li><a href="../index.php">Főoldal</a></li>
            <li><a href="csapat_no_in.php">Csapatok</a></li>
            <li><a href="tag_no_in.php">Tagok</a></li>
            <li><a href="merkozes_no_in.php">Mérkőzések</a></li>
            <li><a href="bere.php" style="width: 270px; padding-left: 70px">Belépés / Regisztráció</a></li>
    </div>
</header><br><br>
<div class="bejelent">
<form action="bere.php" method="POST" autocomplete="off">
        <fieldset>
            <legend style="font-size:25px;font-weight:bold">Bejelentkezés</legend>
         <label><input type="text" name="bnev" maxlength="50" size="25" placeholder="Felhasználónév"  /></label>
            <label><br><br><input type="password" name="bpassw" placeholder="Jelszó" maxlength="50" size="25" /><br /><br /></label>

            <input type="submit" name="belep" value="Belépés" /> <br />
            <h3 style="color: red"> <?php include "belep.php" ?></h3>
        </fieldset>
    </form>
</div>
    <div class="regiszt">
        <form action="bere.php" method="POST" autocomplete="off">
            <fieldset style="height: 100%">
                <legend style="font-size:25px;font-weight:bold">Regisztráció</legend>
                <label> <input type="text" name="felh" maxlength="50" size="25" placeholder="Felhasználónév"/></label><br/><br/>
                <label> <input type="password" name="rpassw" placeholder="Jelszó" maxlength="50" size="25" /></label><br/><br/>
                <label><input type="password" name="r2passw" placeholder="Jelszó újra" maxlength="50" size="25" /></label><br/><br/>
                <label> <input type="text" name="tnev" maxlength="50" size="25" placeholder="Teljes név"/></label><br/><br/>
                <div style="text-align: center;">
                <input type="submit" name="reg" value="Regisztráció"></div>
                <p style="color:red; font-weight:bold; font-size:17px; text-align: center">
                    <?php include "regi.php"; ?>
                </p>
            </fieldset>
        </form>

    </div>
</body>
</html>
<?php
