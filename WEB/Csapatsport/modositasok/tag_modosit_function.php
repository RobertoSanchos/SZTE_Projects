<?php
require_once "../main/db_connect.php";

if (isset($_POST['tagmodosit'])) {
    $regiposzt_id = $_POST['regiposzt'];
    $ujposzt = $_POST['ujtagposzt'];
    $ujtagcsnev = $_POST['ujtagcsnev'];
    $regitagnev = $_POST['regitagnev'];
    $regicsapatnev = $_POST['regicsapatnev'];

    $sikeres = tagmodosit($ujtagcsnev, $ujposzt, $regitagnev, $regicsapatnev, $regiposzt_id);
    if($sikeres) {
        header('location: ../main/tag.php');
    }
    else{
        error_log("Hiba történt");
    }
}

$tagtorol = $_POST['tagtorol'];
if (isset($tagtorol)){
    $regiposzt_id = $_POST['regiposzt'];
    $regitagnev = $_POST['regitagnev'];
    $regicsapatnev = $_POST['regicsapatnev'];


    $siker = tagtorol($regitagnev, $regicsapatnev, $regiposzt_id);

    if($siker){
        header('location: ../main/tag.php');
    }
    else{
        echo 'hiba történt';
    }
}