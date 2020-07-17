<?php

// Includo il database
include __DIR__ . '/database.php';

// Converto il risultato in un'oggetto JSON
$database_json = json_encode($database);

// Avverto il browser che si tratta di un'oggetto JSON
header('Content-Type: application/json');

// Metto a disposizione il risultato convertito
echo $database_json;

?>
