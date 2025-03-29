<?php
require_once "../main/db_connect.php";

if (isset($_POST["modosit"])) {
    $csapatnev_modositott = $_POST["csapnev"];
    $varos_modositott = $_POST["csapvaros"];
    $alapitev_modositott = $_POST["csapalapit"];
    $reginev = $_POST['reginev'];

    if (empty($_POST["csapnev"]) || trim($_POST["csapnev"]) === "") {
        $err[] = "Az új név megadása kötelező!";
    }
    if (empty($_POST["csapvaros"]) || trim($_POST["csapvaros"]) === "") {
        $err[] = "Az új város megadása kötelező!";
    }
    if (empty($_POST["csapalapit"]) || trim($_POST["csapalapit"]) === "") {
        $err[] = "Az új alapítási év megadása kötelező!";
    }

    if(empty($err)){
csapatmodosit($csapatnev_modositott, $varos_modositott, $alapitev_modositott, $reginev);
        header('location: ../main/csapat.php');
    }
    else{
        foreach ($err as $hiba) {
            echo '<style>body{background-color:beige};</style></style><h1 style="color: darkred">'."$hiba".'<h1>';
        }
    }
    echo '<a href="../main/csapat.php"><input type="submit" name="modosit" value="Vissza"></a>';

}

if (isset($_POST['torol'])){
    $reginev = $_POST['reginev'];
    $siker = csapattorol($reginev);

    if($siker){
        header('location: ../main/csapat.php');
    }
    else{
        echo 'hiba történt';
    }
}