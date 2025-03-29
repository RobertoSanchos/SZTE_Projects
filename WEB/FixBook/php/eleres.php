<?php
function load_users(string $file):array{
 $felhasznalok = [];

 $be = fopen($file,"r");

while(($sor = fgets($be)) !== false){
    $felhasznalok[] = unserialize($sor);
}
 fclose($be);

 return $felhasznalok;
}

function save_users(string $file, array $fiok) {
    $ki = fopen($file, 'a');
    fwrite($ki, serialize($fiok). "\n");
    fclose($ki);
}
function save_users2(string $file, array $fiok) {
    $ki = fopen($file, 'w');
    fwrite($ki, serialize($fiok). "\n");
    fclose($ki);
}
?>