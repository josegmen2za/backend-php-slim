<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// GET Todos las personas 
$app->get('/api/datos', function(Request $request, Response $response){
  $sql = "SELECT * FROM persona";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($clientes);
    }else {
      echo json_encode("No existen datos en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// GET Recueperar datos por ID 
$app->get('/api/persona/{id}', function(Request $request, Response $response){
  $id_persona = $request->getAttribute('id');
  $sql = "SELECT * FROM persona WHERE id = $id_persona";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $persona = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($persona);

      //echo '<pre>';  
      print_r($JSON);
      //echo '</pre>';
      //echo json_encode($cliente);
    }else {
      echo json_encode("No existen el dato en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 


// GET Recueperar datos de estudios 
$app->get('/api/persona/estudios/{id}', function(Request $request, Response $response){
  $id_persona = $request->getAttribute('id');
  $sql = "SELECT * FROM persona INNER JOIN estudios
          ON persona.id= estudios.id_persona
          WHERE persona.id=$id_persona;";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $persona = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($persona);

        
      print_r($JSON);
      
    }else {
      echo json_encode("No existen el dato en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// GET Recueperar datos de estudio 
$app->get('/api/persona/estudio/{id}', function(Request $request, Response $response){
  $id_estudio = $request->getAttribute('id');
  $sql = "SELECT * FROM vitae.estudios 
          WHERE vitae.estudios.id=$id_estudio;";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $estudio = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($estudio);

       
      print_r($JSON);
      
    }else {
      echo json_encode("No existen cliente en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// GET Recueperar datos de trabajos 
$app->get('/api/persona/trabajos/{id}', function(Request $request, Response $response){
  $id_persona = $request->getAttribute('id');
  $sql = "SELECT * FROM persona INNER JOIN trabajos
          ON persona.id= trabajos.id_persona
          WHERE persona.id=$id_persona;";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $trabajos = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($trabajos);

      
      print_r($JSON);
    
    }else {
      echo json_encode("No existen datos en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// GET Recueperar datos de trabajo 
$app->get('/api/persona/trabajo/{id}', function(Request $request, Response $response){
  $id_trabajo = $request->getAttribute('id');
  $sql = "SELECT * FROM trabajos 
          WHERE trabajos.id=$id_trabajo;";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $trabajo = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($trabajo);

       
      print_r($JSON);
      
    }else {
      echo json_encode("No existen datos en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 


// GET Recueperar datos de repuestos 
$app->get('/api/repuestos', function(Request $request, Response $response){
  $sql = "SELECT * FROM repuestos";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $repuestos = $resultado->fetchAll(PDO::FETCH_OBJ);
      
      echo json_encode($repuestos);
    }else {
      echo json_encode("No existen datos en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// GET Recueperar datos de repuesto 
$app->get('/api/persona/repuesto/{id}', function(Request $request, Response $response){
  $id_trabajo = $request->getAttribute('id');
  $sql = "SELECT * FROM trabajos 
          WHERE trabajos.id=$id_trabajo;";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $trabajo = $resultado->fetchAll(PDO::FETCH_OBJ);
      $JSON = json_encode($trabajo);

       
      print_r($JSON);
      
    }else {
      echo json_encode("No existen datos en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 















