<?php
$id = $_GET['id'];
include 'menu.php';
include 'conexao.php';
$sql = "SELECT * FROM formulario WHERE idFormulario=$id";
$con = $conn->query($sql) or die($conn->error);
$dado = $con->fetch_assoc();
$sql2 = "SELECT pp.idPerguntas,pp.Titulo,pp.Tipo FROM pergunta AS pp JOIN pergunta_formulario AS pf ON pp.idPerguntas = pf.Pergunta_idPerguntas WHERE pf.Form_id = $id";
$con2 = $conn->query($sql2) or die($conn->error);
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $dado['Nome']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CS.css">
    <script src="main.js">
    </script>
</head>

<body>

    <div class="box2"><br>
    <h1><?php echo $dado['Nome']; ?></h1> <br>
    <p>Descrição: <?php echo $dado['Descricao']; ?></p>
    <form class="formu" action="Preencher.php" method="POST">
    <div id="qlista">
        <?php $cont = 0;
        while($dado2 = $con2->fetch_array()) {
            $break = explode('*',$dado2['Titulo']); ?>
            <div>
            <fieldset>
                <legend><?php echo $break[0]; ?></legend>
                <?php
                    switch ($dado2['Tipo']) {
                        case 'txt':
                            ?> <input type="text" name="res[<?php echo($cont+10);?>]"><br>
                            <?php
                            break;
                        case 'txt2':
                            ?>
                            <textarea rows="8" cols="80" name="res[<?php echo($cont+10);?>]" ></textarea><br>
                            <?php
                            break;
                        case 'drop':
                            ?>
                            <select name="res[<?php echo($cont);?>]">
                            <?php
                                $x = count($break) - 1;
                                while($x > 0) {
                                    ?> <option value="<?php echo $break[$x];?>"><?php echo $break[$x];?></option>
                                 <?php $x=$x-1; }
                            ?>
                            </select><br>
                            <?php
                            break;
                        case '2op':
                            ?> <input type="radio" name="res[<?php echo($cont);?>]" value="sim">Sim
                            <input type="radio" name="res[<?php echo($cont);?>]" value="nao">Não<br>
                            <?php
                            break;
                        case '4op':
                            ?> <input type="radio" name="res[<?php echo($cont);?>]" value="otimo">Ótimo
                            <input type="radio" name="res[<?php echo($cont);?>]" value="bom">Bom
                            <input type="radio" name="res[<?php echo($cont);?>]" value="regular">Regular
                            <input type="radio" name="res[<?php echo($cont);?>]" value="ruim">Ruim <br>
                            <?php
                            break;
                        case 'txt2op':
                            ?> <input type="radio" name="res[<?php echo($cont);?>]" value="sim">Sim
                            <input type="radio" name="res[<?php echo($cont);?>]" value="nao">Não<br>
                            Comentarios:
                            <input type="text" name="res[<?php echo($cont+10);?>]"><br>
                            <?php
                            break;
                        case 'txt4op':
                            ?> <input type="radio" name="res[<?php echo($cont);?>]" value="otimo">Ótimo
                            <input type="radio" name="res[<?php echo($cont);?>]" value="bom">Bom
                            <input type="radio" name="res[<?php echo($cont);?>]" value="regular">Regular
                            <input type="radio" name="res[<?php echo($cont);?>]" value="ruim">Ruim <br><br>
                            Comentários:
                            <input type="text" name="res[<?php echo($cont+10);?>]"><br>
                            <?php
                            break;
                        case 'dt':
                            ?> <input type="date" name="res[<?php echo($cont+10);?>]"><br>
                            <?php
                            break;
                        default:
                            ?> <input type="number" name="res[<?php echo($cont+10);?>]"><br>
                            <?php
                    }
                ?>
                <br>
            </fieldset>
            </div>
        <?php $cont = $cont+1; } ?>
        </div><br>
        <input type="text" name="CPF" value ="<?php echo ($_SESSION['Nome']); ?>" style="display: none"> 
        <input type="number" name="idform" id="idform" style="display: none" value = "<?php echo $id; ?>">
        <input type="number" name="nques" id="nques" style="display: none" value = "<?php echo $cont; ?>">
        <input class="submit" type="submit" name="submit" value="Enviar Formulário">
        <br><br>
        </form>
    </div>
</body>

</html>
<?php $conn->close(); ?>