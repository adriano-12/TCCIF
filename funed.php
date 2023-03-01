<?php
error_reporting(0);
$cpf = $_GET['id'];
include 'menu.php';
include 'conexao.php';
$sql = "SELECT * FROM Funcionario WHERE CPF=$cpf";
$con = $conn->query($sql) or die($conn->error);
$dado = $con->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title >Cadastro Funcionários</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CS.css">
    <meta charset="utf-8">
    


</head>
<body>

    <nav class="box">
    <div style="align-content: center"></div>
        
	<form action="Edit funcionario.php?cpf=<?php echo $cpf; ?>" method="POST">
        
        <h2 style="color:black " >Cadastro Funcionário:</h2>

        Nome: <br>
        <input style="height: 30px" type="text" name="nome" id="nome" size="57" value = "<?php echo $dado['nome']; ?>"/>
        <br>
        E-mail: <br>
        <input style="height: 30px" type="email" name="email" id="email" size="57" value = "<?php echo $dado['email']; ?>"/>
        <br>
        Senha: <br>
        <input style="height: 30px" type="password" name="senha" id="senha" size="57" value = "<?php echo $dado['Senha']; ?>"/>
        <br>
        <p> CPF: <?php echo $cpf; ?> </p>
        <br>
        <br>
        <br>
        <br>
        <input class="submit" style="height: 40px" type="submit" name="submit" value="Enviar" >
            
    </form>
    </div>
</nav>
</body>
</html>
<?php $conn->close(); ?>