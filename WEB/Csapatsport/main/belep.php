<?php
require_once("db_connect.php");
$us = felhasznaloleker();

if (isset($_POST["belep"])) {
    if ((empty($_POST["bnev"]) || trim($_POST["bnev"]) === "" || empty($_POST["bpassw"]) || trim($_POST["bpassw"]) === "")) {
        echo "Hiányos kitöltés!";
    } else {
        $bool = false;
        $felhasznalo = $_POST["bnev"];
        $jelszo = md5($_POST["bpassw"]);

        while( $sor = mysqli_fetch_assoc($us)){
            if($sor["felhasznalonev"] == $felhasznalo && $jelszo == $sor["jelszo"]){
                $_SESSION["user"] = $felhasznalo;
                $bool = true;
                header("Location: main.php");
                break;
            }
            }
        if (!$bool) {
            echo "Hibás felhasználónév vagy jelszó!";
        }
    }
}


