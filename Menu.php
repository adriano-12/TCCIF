<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CS2.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
</head>

<body>
<?php if ( $_SESSION != NULL) { ?>

<div class="menu">

    <ul>
        <li>
            
            <a href="Dados.php">Tabela de Formulários</a>
            <a href="Dadosfunc.php">Tabela de Funcionários</a>
            <a href="Index.php">Preencher Formulários</a>
            <a href="Destroyer.php">Deslogar</a>
            <p href="">Logado como:<?php echo ($_SESSION['Nome']); ?></p>
            
         </li>
    </ul>

</div><br>
<?php } else{ ?>
<div class="menu">

    <ul>
        <li>
            
            <a href="TCC-LoginF.php">Login</a>
            
         </li>
    </ul>

</div><br>
<?php  } ?>