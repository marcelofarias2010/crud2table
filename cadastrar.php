<?php
session_start(); //Iniciar a sessao
include_once 'banco/conexao.php';

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Celke - Cadastrar em duas tabelas</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="cadastrar.php">Cadastrar</a><br>
    
    <h1>Cadastrar Usuário</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="processa.php">
        <h3>Dados básicos</h3>

        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do usuário"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" id="email" placeholder="E-mail do usuário"><br><br>

        <h3>Endereço do usuário</h3>

        <label>Logradouro: </label>
        <input type="text" name="logradouro" id="logradouro" placeholder="Endereço do usuário, ex: Rua, avenida"><br><br>

        <label>Número: </label>
        <input type="text" name="numero" id="numero" placeholder="Número endereço"><br><br>
        <label for="uf">Estado</label>
        <select name="uf" id="uf">
            <option value="">Estados...</option>
            <?php
                $query_estado = "SELECT idEstado, UF FROM estado";
                
                $result_estado = $conn->prepare($query_estado);
                $result_estado->execute();

                while ($row_estado = $result_estado->fetch(PDO::FETCH_ASSOC)){
                    //var_dump($row_estado);
                    extract($row_estado);          
                    echo "<option value=".$idEstado.">".$UF."</option>";
           
                }
            ?>
        </select>

        <input type="submit" value="Cadastrar" name="CadUsuario">
    </form>

</body>

</html>