<?php

function csapatfelvesz()
{

    if (isset($_POST['felvisz'])) {
        $err = [];
        $csapnev = $_POST["csapnev"];
        $csapvaros = $_POST["csapvaros"];
        $csapalapit = $_POST["csapalapit"];
        if (empty($_POST["csapnev"]) || trim($_POST["csapnev"]) === "") {
            $err[] = "A név megadása kötelező!";
        }
        if (empty($_POST["csapvaros"]) || trim($_POST["csapvaros"]) === "") {
            $err[] = "A város megadása kötelező!";
        }
        if (empty($_POST["csapalapit"]) || trim($_POST["csapalapit"]) === "") {
            $err[] = "Az alapítási év megadása kötelező!";
        }
        $csleker = csapatleker();
        while( $sor = mysqli_fetch_assoc($csleker)){
            if ($csapnev == $sor["nev"]){
                $err[] = "A név már foglalt!";
            }
        }
        mysqli_free_result($csleker);
        if (empty($err)) {
            csapatfelvetel($csapnev, $csapvaros,$csapalapit);
            echo 'Sikeres tagfelvétel!';
        }
        else{
            foreach ($err as $er){
                echo "$er<br><br>";
            }
        }
    }
}

function tagotfelvesz()
{

    if (isset($_POST['felvisz'])) {
        $err = [];
        $tagnev = $_POST["tagnev"];
        $tagszuldatum = $_POST["tagszuldatum"];
        $tagallam = $_POST["tagallam"];
        $tagcsnev = $_POST["tagcsnev"];
        $tagposzt = $_POST["tagposzt"];

        if (empty($_POST["tagnev"]) || trim($_POST["tagnev"]) === "") {
            $err[] = "A név megadása kötelező!";
        }
        if (empty($_POST["tagposzt"]) || trim($_POST["tagposzt"]) === "") {
            $err[] = "A Poszt megadása kötelező!";
        }
        if (empty($_POST["tagcsnev"]) || trim($_POST["tagcsnev"]) === "") {
            $err[] = "A csapat megadása kötelező!";
        }
        if (empty($_POST["tagszuldatum"]) || trim($_POST["tagszuldatum"]) === "") {
            $err[] = "A születési dátum megadása kötelező!";
        }
        if (empty($_POST["tagallam"]) || trim($_POST["tagallam"]) === "") {
            $err[] = "Az állampolgárság megadása kötelező!";
        }


        if (count($err) == 0) {
            tagfelvetel($tagnev, $tagszuldatum, $tagallam, $tagcsnev, $tagposzt);
            echo 'Sikeres Csapatfelvétel!';
        } else {
            foreach ($err as $er) {
                echo "$er<br><br>";
            }
        }

    }
}
function merkozesfelvesz()
{

    if (isset($_POST['merkozesfelvisz'])) {
        $err = [];

        $csapat_1 = $_POST["csapat_1"];
        $csapat_2 = $_POST["csapat_2"];
        $helyszin = $_POST["helyszin"];
        $meccsdatum = $_POST["meccsdatum"];


        if (empty($helyszin) || trim($helyszin) === "") {
            $err[] = "A helyszín megadása kötelező!";
        }
        if (empty($meccsdatum) || trim($meccsdatum) === "") {
            $err[] = "A dátum megadása kötelező!";
        }
        if (count($err) == 0) {
            meccshozzaad($csapat_1, $csapat_2, $helyszin, $meccsdatum);
            echo 'Sikeres Meccsfelvétel!';
        } else {
            foreach ($err as $er) {
                echo "$er<br><br>";
            }
        }
    }
}