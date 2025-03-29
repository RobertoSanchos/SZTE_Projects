<?php

function csapatsport_connect(){
    // Csatlakozás mysql adatbázishoz:
    $csatlakozas = mysqli_connect("localhost","root","") or die("Nem lehet csatlakozni!");

    // Ha nem sikerül csatlakozni az adatbázishoz nullal tér vissza
    if(!(mysqli_select_db($csatlakozas,"CSAPATSPORT"))){
        return null;
    }
    // Karakterek helyes megjelenítése miatt:
    mysqli_query($csatlakozas, "SET NAMES utf8");
    mysqli_query($csatlakozas, "SET Character_set_results=utf8");
    mysqli_set_charset($csatlakozas,"utf8");

    // Ha sikeres volt a csatlakozás:
    return $csatlakozas;
}

function felhasznaloleker()
{
    if (!($felhasznalo = csapatsport_connect())){
        return false;
    }
    $leker = mysqli_query($felhasznalo,"SELECT felhasznalonev, jelszo FROM felhasznalo");
    mysqli_close($felhasznalo);

    return $leker;
}

function csapatleker(){
if (!($csapat = csapatsport_connect())){
    return false;
}
$leker = mysqli_query($csapat,"SELECT * FROM csapat");
mysqli_close($csapat);

return $leker;
}

function tagokleker(){
    if (!($tag = csapatsport_connect())){
        return false;
    }
    $leker = mysqli_query($tag,"SELECT t.nev, szuletesidatum, allampolgarsag, csapatnev, p.nev as Poszt, p.id as poszt_id FROM tag t 
    INNER JOIN poszt p ON t.posztid = p.id order by csapatnev");
    mysqli_close($tag);

    return $leker;
}

function merkozesleker(){
    if (!($merkozes = csapatsport_connect())){
        return false;
    }
    $leker = mysqli_query($merkozes,"SELECT csapatnev1, csapatnev2, helyszin, datum, eredmeny FROM merkozes order by datum");
    mysqli_close($merkozes);

    return $leker;
}

function posztleker(){
    if (!($eredmeny = csapatsport_connect())){
        return false;
    }
    $leker = mysqli_query($eredmeny,"SELECT * FROM poszt;");
    mysqli_close($eredmeny);

    return $leker;
}

function felhasznaloregi($fnev, $jelszo, $nev)
{
    if(!($felregi = csapatsport_connect())){
        return false;
    }
    $pre = mysqli_prepare($felregi,"INSERT INTO felhasznalo VALUES(?,?,?)");
    mysqli_stmt_bind_param($pre,"sss",$fnev, $jelszo, $nev);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($felregi);
    return $siker;
}

function csapatfelvetel($nev, $varos, $alapitaseve){
    if(!($tagin = csapatsport_connect())){
        return false;
    }
    $pre = mysqli_prepare($tagin,"INSERT INTO csapat VALUES(?,?,?)");
    mysqli_stmt_bind_param($pre,"ssd",$nev, $varos, $alapitaseve);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($tagin);
    return $siker;
}

function tagfelvetel($nev, $szuldatum, $allampolgar, $csapat, $poszt ){
    if(!($tagin = csapatsport_connect())){
        echo "Sikertelen tagfelvétel!";
        return false;
    }
    $pre = mysqli_prepare($tagin,"INSERT INTO tag VALUES(?,?,?,?,?)");
    mysqli_stmt_bind_param($pre,"ssssd",$nev,$szuldatum, $allampolgar, $csapat, $poszt );

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($tagin);
    return $siker;
}

function meccshozzaad($csapat_1, $csapat_2, $helyszin, $meccsdatum)
{
    if(!($csatlakozas = csapatsport_connect())){
        echo "Sikertelen kapcsolódás!";
        return false;
    }
    $pre = mysqli_prepare($csatlakozas,"INSERT INTO merkozes(csapatnev1, csapatnev2, helyszin, datum) VALUES(?,?,?,?)");
    mysqli_stmt_bind_param($pre,"ssss",$csapat_1, $csapat_2, $helyszin, $meccsdatum );

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($csatlakozas);
    return $siker;
}

function csapattorol($nev)
{
    if (!($delcsapat = csapatsport_connect())) {
        return false;
    }
    $pre = mysqli_prepare($delcsapat, "DELETE FROM csapat WHERE nev = ?");
    mysqli_stmt_bind_param($pre, "s", $nev);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($delcsapat);
    return $siker;
}

function tagtorol($nev, $csapatnev, $poszt)
{
    if (!($csatlakozas = csapatsport_connect())) {
        return false;
    }
    $pre = mysqli_prepare($csatlakozas, "DELETE FROM tag WHERE nev = ? and posztid = ? and csapatnev=?");
    mysqli_stmt_bind_param($pre, "sds", $nev, $poszt, $csapatnev);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($csatlakozas);
    return $siker;
}

function mecsstorol($eredeti_csapatnev1, $eredeti_csapatnev2, $eredeti_merkozes_helyszin, $eredeti_merkozes_datum)
{
    if (!($csatlakozas = csapatsport_connect())) {
        return false;
    }
    $pre = mysqli_prepare($csatlakozas, "DELETE FROM merkozes WHERE csapatnev1=? and csapatnev2=? and helyszin=? and datum=?");
    mysqli_stmt_bind_param($pre, "ssss", $eredeti_csapatnev1, $eredeti_csapatnev2, $eredeti_merkozes_helyszin, $eredeti_merkozes_datum);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($csatlakozas);
    return $siker;
}

function csapatmodosit($ujnev, $varos, $alapitaseve, $reginev)
{
    if (!($csapat_modosit = csapatsport_connect())) {
        echo "Sikertelen módosítás!";
        return false;
    }
    $pre = mysqli_prepare($csapat_modosit, "UPDATE csapat SET nev=?, varos=?, alapitaseve=? WHERE nev=?");
    mysqli_stmt_bind_param($pre, "ssds",  $ujnev, $varos, $alapitaseve, $reginev);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($csapat_modosit);
    return $siker;
}

function tagmodosit($ujcsapat, $ujposzt, $reginev, $regicsapatnev, $regiposzt_id)
{
    if (!($tag_modosit = csapatsport_connect())) {
        echo "Sikertelen módosítás!";
        return false;
    }
    $pre = mysqli_prepare($tag_modosit, "UPDATE tag SET csapatnev=?, posztid=? WHERE nev=? and csapatnev=? and posztid=?");
    mysqli_stmt_bind_param($pre, "sdssd",$ujcsapat,$ujposzt, $reginev, $regicsapatnev, $regiposzt_id);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($tag_modosit);
    return $siker;
}

function meccsmodosit($csapat_1, $csapat_2, $modositott_helyszin, $modositott_meccsdatum, $eredeti_csapatnev1, $eredeti_csapatnev2, $eredeti_merkozes_helyszin, $eredeti_merkozes_datum, $modositott_eredmeny, $eredeti_eredmeny)
{
    if (!($csatlakozas = csapatsport_connect())) {
        echo "Sikertelen kapcsolódás!";
        return false;
    }
    $pre = mysqli_prepare($csatlakozas, "UPDATE merkozes SET csapatnev1=?, csapatnev2=?, helyszin=?, datum=?, eredmeny=? WHERE csapatnev1=? and csapatnev2=? and helyszin=? and datum =? and eredmeny=?");
    mysqli_stmt_bind_param($pre, "ssssssssss",$csapat_1,$csapat_2, $modositott_helyszin, $modositott_meccsdatum, $modositott_eredmeny, $eredeti_csapatnev1, $eredeti_csapatnev2, $eredeti_merkozes_helyszin, $eredeti_merkozes_datum, $eredeti_eredmeny);

    $siker = mysqli_stmt_execute($pre);

    mysqli_close($csatlakozas);
    return $siker;
}

function csapatokstatisztika1()
{
    if (!($csapat_statisztika = csapatsport_connect())) {
        echo "Sikertelen Lekérés!";
        return false;
    }
    $leker = mysqli_query($csapat_statisztika, "SELECT nev, count(me.eredmeny) as osszes_meccs FROM merkozes me JOIN csapat csa ON me.csapatnev1 = csa.nev or me.csapatnev2 = csa.nev and me.eredmeny <> 'Nincs rögzítve' GROUP by nev;");
    mysqli_close($csapat_statisztika);
    return $leker;
}
function csapatokstatisztika2()
{
    if (!($csapat_statisztika2 = csapatsport_connect())) {
        echo "Sikertelen Lekérés!";
        return false;
    }
    $leker = mysqli_query($csapat_statisztika2, "SELECT nyertes, COUNT(*) as nyeresek FROM(select
CASE 
    WHEN cast(substr(eredmeny,1, 1) as int) > cast(substr(eredmeny,5, 5) as int) THEN merkozes.csapatnev1
    WHEN cast(substr(eredmeny,1, 1) as int) < cast(substr(eredmeny,5, 5) as int) THEN merkozes.csapatnev2 
end as nyertes 
FROM merkozes) as nyertes_keres
GROUP BY nyertes
HAVING nyertes != 'NULL'");
    mysqli_close($csapat_statisztika2);
    return $leker;
}