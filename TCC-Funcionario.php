<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title >Cadastro Funcionários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CS.css">
    <script src="main.js">
    </script>
</head>
<body>


<?php
session_start();
error_reporting(0);
 if ($_SESSION != NULL) { ?>

<div class="menu">

    <ul>
        <li>
            
            <a href="Dados.php">Tabela de Formulários</a>
            <a href="Dadosfunc.php">Tabela de Funcionários</a>
            <a href="Index.php">Preencher Formulários</a>
            <p href="">Logado como:<?php echo ($_SESSION['Nome']); ?></p>
            
            
         </li>
    </ul>

</div><br>
<?php } else{ ?>
<div class="menu">

    <ul>
        <li>
            
            <a href="TCC-LoginF.php">Login</a>
            <a href="Index.php">Início</a>
            
         </li>
    </ul>

</div><br>
<?php  } ?>

    <nav class="box">
    <div style="align-content: center"></div>
        
	<form action="Insert funcionario.php" method="POST">
        
        <h2>Cadastro Funcionário</h2><br><br>

        Nome:
        <input type="text" name="nome" id="nome"/>
        <br>
        <br>
        E-mail: <br>
        <input type="email" name="email" id="email"/>
        <br>
        <br>
        Senha: <br>
        <input  type="password" name="senha" id="senha" />
        <br>
        <br>
        CPF: <br>
        <input type="number" name="CPF" id="CPF"/>
        <br>
        <br>
        <br>
        <br>
        <input  class="submit" type="submit" name="submit" value="Enviar" >
        <br>
        <br>
        
         
        
            
    </form>
    </div>
</nav>
</body>
</html>