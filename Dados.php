<?php
    include 'conexao.php';
    include 'menu.php';
    $sql = "SELECT * FROM formulario";
    $con = $conn->query($sql) or die($conn->error);
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

    <div class="box2">
    <table>
        <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>CPF do Funcionario</td>
        <td>Data Limite</td>
        <td>Ação</td>
        </tr>
        <?php while($dado = $con->fetch_array()) { ?>
        <tr>
        <td><?php echo $dado['idFormulario']; ?></td>
        <td><?php echo $dado['Nome']; ?></td>
        <td><?php echo $dado['Funcionario_CPF']; ?></td>
        <td><?php echo $dado['Datafechar']; ?></td>
        <td>
            <a title="Editar Formulário" href="formed.php?id=<?php echo $dado['idFormulario'];?>"><i class="fas fa-edit"></i></a>
            <a title="Excluir Formulário" href="formex.php?id=<?php echo $dado['idFormulario']; ?>"><i class="fas fa-trash"></i></a>
            <a title="Gerar gráfico" href="Grapcs.php?id=<?php echo $dado['idFormulario'];?>"><i class="fas fa-chart-pie"></i></a>
        </td>
        </tr>
        <?php } ?>
    </table>
    <div class="center">
    <a title="Criar Formulário" href="T1.php"><i class="fas fa-plus"></i></a>
    </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>