<?php

$DB_COL = 'mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME;
try {
    $DB_CON = new PDO($DB_COL , $DB_USER, $DB_PASS);
}
catch(PDOException $e) {
  echo 'Attenzione: '.$e->getMessage();
}
?>