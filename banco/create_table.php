<?php
//importar conexão
require "conn.php";

// sql para criar tabela

$sql = "CREATE TABLE Usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    DDD INT(3) NOT NULL,
    celular INT(10) NOT NULL,
    email VARCHAR(50),
    estado VARCHAR(15),
    cidade VARCHAR(25),
    servidor VARCHAR(15)
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Tabela Usuarios criada com sucesso";
    } else {
      echo "Erro ao criar a tabela: " . $conn->error;
    }
    
    $conn->close();


?>