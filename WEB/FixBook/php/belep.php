<?php
$us = load_users("felhasznalok.txt");
if (isset($_POST["belep"])) {
    if ((empty($_POST["bnev"]) || trim($_POST["bnev"]) === "" || empty($_POST["bpassw"]) || trim($_POST["bpassw"]) === "")) {
        echo "Hiányos kitöltés!";
    } else {
        $bool = false;
        $felhasznalo = $_POST["bnev"];
        $jelszo = $_POST["bpassw"];
        foreach ($us as $users) {
            if ($users["felhasznalo"] === $felhasznalo && password_verify($jelszo, $users["jelszo"])) {
                $_SESSION["user"] = $felhasznalo;
                $bool = true;
                header("Location: in.php");
                break;
            }
        }
        if ($bool == false) {
                echo "Hibás felhasználónév vagy jelszó!";
            }
    }
}

?>



