<?php
    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $dbname = 'notaria';
    $username = 'root';
    $password = '';
    
    // Valor de búsqueda obtenido desde la solicitud AJAX
    $searchText = $_GET['query'];
    
    try {
      // Establecer la conexión PDO
      $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
      $pdo = new PDO($dsn, $username, $password);
    
      // Configurar el modo de errores de PDO para mostrar excepciones
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // Preparar la consulta SQL
      $query = "SELECT * FROM cliente WHERE nombre LIKE :searchText";
      $stmt = $pdo->prepare($query);
    
      // Asignar el valor de búsqueda al parámetro de la consulta
      $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    
      // Ejecutar la consulta
      $stmt->execute();
    
      // Obtener los resultados en un array
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
      // Devolver los resultados en formato JSON
      echo json_encode($resultados);
    } catch (PDOException $e) {
      // Manejar errores de conexión o consulta
      echo "Error: " . $e->getMessage();
    }
?>