<?php
session_start(); //Iniciar a sessao

include_once "banco/conexao.php";
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Celke - Listar duas tabelas</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="cadastrar.php">Cadastrar</a><br>

    <h1>Listar Usuários</h1>    

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $query_usuarios = "SELECT usr.id, usr.nome, usr.email, 
                    ende.logradouro, ende.numero
                    FROM usuarios usr
                    LEFT JOIN enderecos AS ende ON ende.usuario_id=usr.id
                    ORDER BY usr.id DESC";
                    
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID do usuário: $id <br>";
        echo "Nome do usuário: $nome <br>";
        echo "E-mail do usuário: $email <br>";
        echo "Endereço do usuário: $logradouro <br>";
        echo "Número do endereço: $numero <br>";
        echo "<hr>";
    }
    ?>
    
</body>

</html>