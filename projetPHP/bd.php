<?php
$dsn = "mysql:host=localhost;dbname=id20171303_projetphp";

try {
    $test = new PDO($dsn, "id20171303_admin", "w4~b@d%q{5/GqUQ!");
    //echo "Connection successful";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

}