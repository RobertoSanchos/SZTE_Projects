<?php
$err = [];
$fiok = [];
if(isset($_POST["reg"])) {
    $felhasznalo = $_POST["felh"];
    $password = $_POST["rpassw"];
    $re_password = $_POST["r2passw"];
    $szuldatum = $_POST["szuldatum"];
    $tnev = $_POST["tnev"];
    $email = $_POST["email"];

    if (empty($_POST["tnev"]) || trim($_POST["tnev"]) === "") {
        $err[] = "A teljes név megadása kötelező!";
    }
    if (empty($_POST["email"]) || trim($_POST["email"]) === "") {
        $err[] = "Az e-mail cím megadása kötelező!";
    }
    if (empty($_POST["szuldatum"])) {
        $err[] = "Add meg a születési dátumod!";
    }
    if (empty($_POST["felh"]) || trim($_POST["felh"]) === "") {
        $err[] = "A felhasználónév megadása kötelező";
    }
    if (empty($_POST["rpassw"]) || trim($_POST["rpassw"]) === "" || empty($_POST["r2passw"]) || trim($_POST["r2passw"]) === "") {
        $err[] = "A jelszó és a jelszó megerősítés megadása kötelező!";
    }
    if (empty($_POST["check"]) || count($_POST["check"]) != 2) {
        $err[] = "A feltételek elfogadása kötelező!";
    }

    foreach ($fiok as $regek) {
        if ($regek["felhasznalo"] === $felhasznalo) {
            $err[] = "A felhasználónév már foglalt!";
        }
        if ($regek["email"] === $email) {
            $err[] = "Az E-mail cím már foglalt!";
        }
    }
    if ($password != $re_password) {
        $err[] = "A beírt jelszó nem egyezik meg";
    } elseif (strlen($password) < 6) {
        $err[] = "A Jelszónak legalább 6 karakter hosszúnak kell lennie!";
    }

    if (count($err) === 0) {
        $fiok = [
            "szuldatum" => $szuldatum,
            "tnev" => $tnev,
            "felhasznalo" => $felhasznalo,
            "jelszo" => password_hash($password, PASSWORD_DEFAULT),
            "email" => $email
        ];
        save_users("felhasznalok.txt", $fiok);
        $siker = True;
    } else {
        $siker = False;
    }
    if(isset($siker) && $siker == true){
        echo "A regisztráció sikeres volt, most már beléphetsz!";
    }
    else{
        foreach($err as $hiba){
            echo "$hiba<br> ";
        }
    }
}
?>