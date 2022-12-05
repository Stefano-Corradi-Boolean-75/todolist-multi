<?php
	
  //header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
	
  //header("Access-Control-Allow-Headers: X-Requested-With");

$string = file_get_contents('db.json');

$list = json_decode($string, true);


// se ricevo in post questa variabile vuol dire che devo aggiungere un elemento all'array
if(isset($_POST['todoText'])){
  // creo l'elemento da aggiungere
  $todo = [
    'text' => $_POST['todoText'],
    'done' => false
  ];
  // lo aggiungo alla lista
  $list[] = $todo;

  // salvo il nuovo array encodato in db.json
  file_put_contents('db.json', json_encode($list));
}

// $_POST['toggleDone'] contiene l'indice
if(isset($_POST['toggleDone'])){
  // utlizzo l'indice per prendere l'elemento interessato
  $list[$_POST['toggleDone']]['done'] = !$list[$_POST['toggleDone']]['done'];

  // salvo il nuovo array encodato in db.json
  file_put_contents('db.json', json_encode($list));
}

if(isset($_POST['deleteTodo'])){

  // $_POST['deleteTodo'] contiene l'indice dell'elememento da eliminare
  array_splice($list,$_POST['deleteTodo'],1);

  // salvo il nuovo array encodato in db.json
  file_put_contents('db.json', json_encode($list));
}

// alla fine stampo sempre un json del mio array
header('Content-Type: application/json');
echo json_encode($list);
