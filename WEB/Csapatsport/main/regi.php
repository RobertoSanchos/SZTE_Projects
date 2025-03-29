<?php
require_once("db_connect.php");

$err = [];

if(isset($_POST["reg"])) {
    $felhasznalo = $_POST["felh"];
    $password = $_POST["rpassw"];
    $re_password = $_POST["r2passw"];
    $tnev = $_POST["tnev"];

    if (empty($_POST["felh"]) || trim($_POST["felh"]) === "") {
        $err[] = "A felhasználónév megadása kötelező!";
    }
    if (empty($_POST["rpassw"]) || trim($_POST["rpassw"]) === "" || empty($_POST["r2passw"]) || trim($_POST["r2passw"]) === "") {
        $err[] = "A jelszó és a jelszó megerősítés megadása kötelező!";
    }
    if ($password != $re_password) {
        $err[] = "A beírt jelszó nem egyezik meg!";
    }
    if (strlen($password) < 6) {
        $err[] = "A Jelszónak legalább 6 karakter hosszúnak kell lennie!";
    }
    $ellenoriz = felhasznaloleker();

    while( $sor = mysqli_fetch_assoc($ellenoriz)){
        if($sor["felhasznalonev"] == $felhasznalo){
            $err[] = 'A felhasználónév már foglalt!';
    }
    }

    if (count($err) === 0) {
        felhasznaloregi($felhasznalo, md5($password), $tnev);
        $siker = True;
    } else {
        $siker = False;
    }
    if($siker){
        echo "A regisztráció sikeres volt, most már beléphetsz!";
    }
    else{
        foreach($err as $hiba){
            echo "$hiba<br><br> ";
        }
    }

}
