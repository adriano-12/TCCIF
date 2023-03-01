<?php
    include 'conexao.php';
    include 'menu.php';
    $sql = "SELECT * FROM Funcionario";
    $con = $conn->query($sql) or die($conn->error);
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tabela de Dados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CS.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
</head>
<body>

    <div class ="box3">
    <table>
        <tr>
        <td class="dadosfunc">CPF</td>
        <td class="dadosfunc">Nome</td>
        <td class="dadosfunc">E-mail</td>
        <td class="dadosfunc">Ação</td>
        </tr>
        <?php while($dado = $con->fetch_array()) { ?>
        <tr>
        <td><?php echo $dado['CPF']; ?></td>
        <td><?php echo $dado['nome']; ?></td>
        <td><?php echo $dado['email']; ?></td>
        <td>
            <a title="Editar Funcionário" href="funed.php?id=<?php echo $dado['CPF']; ?>"><i class="fas fa-edit"></i></a>
            <a title="Excluir Funcionário" href="funex.php?id=<?php echo $dado['CPF']; ?>"><i class="fas fa-trash"></i></a>
        </td>
        </tr>
        <?php } ?>
    </table>
    <a href="TCC-Funcionario.php">Cadastrar Funcionário</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>