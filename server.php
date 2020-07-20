<?php

// Includo il database
include __DIR__ . '/database.php';

// Converto il risultato in un'oggetto JSON
// $database_json = json_encode($filteredeArray);

// Avverto il browser che si tratta di un'oggetto JSON
header('Content-Type: application/json');

// Metto a disposizione il risultato convertito
if (!empty($_GET['author-list'])) {
  $authorsArray = [];
  foreach ($database as $cd) {
    if (!in_array($cd['author'], $authorsArray)) {
      $authorsArray[] = $cd['author'];
    }
  }
  echo json_encode($authorsArray);
  } elseif (!empty($_GET['author'])){
  $filteredeArray = [];
  foreach ($database as $cd) {
    if ($cd['author'] === $_GET['author']) {
      $filteredeArray[] = $cd;
    }
  }
  echo json_encode($filteredeArray);
  } else {
  echo json_encode($database);
}


?>
