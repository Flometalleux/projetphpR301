<?php
$dsn = "mysql:host=localhost;dbname=projetphp";

try {
    $test = new PDO($dsn, "root", "");
    //echo "Connection successful";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

}

//prepare pour verif si existe
//query chercher données

//000webhost
//$dsn = "mysql:host=localhost;dbname=id20171303_projetphp";
//$test = new PDO($dsn, "id20171303_admin", "w4~b@d%q{5/GqUQ!");