<?php

session_start();

$_SESSION = [];
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), session_id(), time()-1200, '/');

}

session_destroy();

header("Location: ../index.php");



