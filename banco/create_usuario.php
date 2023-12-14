<?php 
    require_once('conn.php');

    function createUserDb($conn, $nome, $ddd, $celular, $email, $estado, $cidade, $servidor) {
        $nome = mysqli_real_escape_string($conn, $nome);
        $ddd = mysqli_real_escape_string($conn,  $ddd);
        $celular = mysqli_real_escape_string($conn,  $celular);
        $email = mysqli_real_escape_string($conn,  $email);
        $estado = mysqli_real_escape_string($conn,  $estado);
        $cidade = mysqli_real_escape_string($conn,  $cidade);
        $servidor = mysqli_real_escape_string($conn,  $servidor);
        if($nome && $ddd && $celular && $email && $estado && $cidade && $servidor) {
            $sql = "INSERT INTO Usuarios (nome, ddd, celular, email, estado, cidade, servidor) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');
            mysqli_stmt_bind_param($stmt, 'sssssss', $nome, $ddd, $celular, $email, $estado, $estado, $cidade, $servidor);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
        return true;
        }
    }

    if(isset($_POST['submit'])) {
        $nome = $_POST['nome']; 
        $ddd = $_POST['ddd'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $servidor = $_POST['servidor'];
        
        if (createUserDb($conn,$nome,$ddd, $celular, $email, $estado, $cidade, $servidor)){
        
        // exibir resultado
           echo "usuario criado com sucesso <br>";
           echo "<a href='formulario.html'>Clique aqui para criar outro</a> " ;
           
        }
    }

  ?>  