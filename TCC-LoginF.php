<!DOCTYPE html>
<html>
<head>
    
    <title>Login Funcionários</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CS.css">
    <meta charset="utf-8">
    
    

</head>
<body>

<?php

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
            
            <a href="TCC-Funcionario.php">Cadastrar-se</a>
            <a href="Index.php">Início</a>
            
         </li>
    </ul>

</div><br>
<?php  } ?>
    
        <br>

    <div style="align-content: center">
    <nav class="box">
        
	<form action="Login.php" method="POST">
        <div>
            <h2 style="color:black">Login Funcionário:</h2>
            CPF: <br>
            <input type="number" name="CPF" id="CPF" />
        </div>
        
        <div>
            Senha: <br>
            <input type="password" name="senha" id="senha" />
            <br>
            <br>
            <input class="submit" type="submit" name="submit" value="Enviar"/>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div style="text-align: center">   
    
    </div> 

    </div>
    </form>
    </nav>
    </body>

    

</html>