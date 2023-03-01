<?php
    include 'menu.php';
    include 'conexao.php';
    $dataagr = localtime();
    $dataagr[5] = $dataagr[5] + 1900;
    $dataagr[4] = $dataagr[4] + 1;
    $sql = "SELECT * FROM formulario";
    $con = $conn->query($sql) or die($conn->error);
    $dataagr = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tela Inicial</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CS.css'>
    <script src='main.js'></script>

</head>
<body>
    <div class="box3">
    <table>
        <tr>
        <td class="dadosfunc">Código</td>
        <td class="dadosfunc">Nome</td>
        <td class="dadosfunc">Data Limite</td>
        <td class="dadosfunc">Ação</td>
        </tr>
        <?php while($dado = $con->fetch_array()) { 
            if($dataagr <= $dado['Datafechar']) { ?>
        <tr>
        <td><?php echo $dado['idFormulario']; ?></td>
        <td><?php echo $dado['Nome']; ?></td>
        <td><?php echo $dado['Datafechar']; ?></td>
        <td>
            <a href="formu.php?id=<?php echo $dado['idFormulario'];?>">Preencher</a>
            <a>&nbsp;</a>
        </td>
        </tr>
        <?php } } ?>
    </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>