<?php

require_once "../main/db_connect.php";

if (isset($_POST['merkozes_modosit'])) {
    $eredeti_csapatnev1 = $_POST["eredeti_csapatnev1"];
    $eredeti_csapatnev2 = $_POST["eredeti_csapatnev2"];
    $eredeti_merkozes_helyszin = $_POST["eredeti_merkozes_helyszin"];
    $eredeti_merkozes_datum = $_POST["eredeti_merkozes_datum"];
    $eredeti_eredmeny = $_POST["eredeti_eredmeny"];

    $csapat_1 = $_POST['csapat_1'];
    $csapat_2 = $_POST['csapat_2'];
    $modositott_helyszin = $_POST['modositott_helyszin'];
    $modositott_meccsdatum = $_POST['modositott_meccsdatum'];
    $modositott_eredmeny = $_POST['hazai'].' : '.$_POST['vendeg'];

    $siker = meccsmodosit($csapat_1, $csapat_2, $modositott_helyszin, $modositott_meccsdatum, $eredeti_csapatnev1,
        $eredeti_csapatnev2, $eredeti_merkozes_helyszin,$eredeti_merkozes_datum,$modositott_eredmeny, $eredeti_eredmeny);

    if ($siker) {
        header('location: ../main/merkozes.php');
    } else {
        error_log("Hiba történt");
    }
}

if (isset($_POST['merkozes_torol'])) {
    $eredeti_csapatnev1 = $_POST["eredeti_csapatnev1"];
    $eredeti_csapatnev2 = $_POST["eredeti_csapatnev2"];
    $eredeti_merkozes_helyszin = $_POST["eredeti_merkozes_helyszin"];
    $eredeti_merkozes_datum = $_POST["eredeti_merkozes_datum"];

    $siker = mecsstorol($eredeti_csapatnev1, $eredeti_csapatnev2, $eredeti_merkozes_helyszin, $eredeti_merkozes_datum);

    if ($siker) {
        header('location: ../main/merkozes.php');
    } else {
        echo 'hiba történt';
    }
}
