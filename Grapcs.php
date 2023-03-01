<?php
include 'menu.php';
include 'conexao.php';
error_reporting(0);
$id = $_GET['id'];
$idp = $id * 10;
$sql2 = "SELECT pp.Titulo FROM pergunta AS pp JOIN pergunta_formulario AS pf ON pp.idPerguntas = pf.Pergunta_idPerguntas WHERE pf.Form_id = $id";
$con2 = $conn->query($sql2) or die($conn->error);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Grapcs</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CS2.css'>
    <script src="Chart.js-2.8.0/dist/Chart.js"></script>
</head>
<body >

    <h1>Dados do Formulário</h1>
    <?php
    $idp = $id * 10;
    while($dado2 = $con2->fetch_array()) {
    $sql = "SELECT r.Resposta, count(*) FROM resposta AS r LEFT JOIN pergunta_resposta AS p ON r.idResposta = p.Respostas_idResposta WHERE Pergunta_idPerguntas=$idp group by r.Resposta order by  r.Resposta != 'otimo', r.Resposta != 'sim' ,r.Resposta ASC;";
    $con = $conn->query($sql) or die($conn->error);
    $resposta = array();
    $nomes = array();
    while($dado = $con->fetch_array()){
        if($dado['Resposta'] != NULL) {
            array_push($resposta, array( $dado['count(*)'])); 
            array_push($nomes, array( $dado['Resposta']));
        }
    }
    $dado = $con->fetch_array();
    $break = explode('*',$dado2 ['Titulo']);
    ?>
    <h3><?php echo $break[0]; ?></h3> 
    <?php if($resposta != NULL) { ?>
    <div id="container" style="width: 50%;">
        <canvas id="myChart<?php echo $idp;?>"></canvas>
    </div>
    <?php
        }
    $sql3 = "SELECT r.RespostaSecundaria FROM resposta AS r LEFT JOIN pergunta_resposta AS p ON r.idResposta = p.Respostas_idResposta WHERE Pergunta_idPerguntas=$idp;";
    $con3 = $conn->query($sql3) or die($conn->error);
    ?> <h4>Respostas/Comentarios:</h4> <br> <?php
    while($dado3 = $con3->fetch_array()){
        if($dado3['RespostaSecundaria'] != NULL) { ?> 
        <p><?php echo $dado3['RespostaSecundaria'];?> </p> <br>
        <?php }
    }
    ?>
    <script>
    var ctx = document.getElementById('myChart<?php echo $idp;?>').getContext('2d');
    var valores = <?php echo json_encode($resposta, JSON_PRETTY_PRINT) ?>;
    var nomes = <?php echo json_encode($nomes, JSON_PRETTY_PRINT) ?>;
    var myChart<?php echo $idp;?> = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: nomes,
            datasets: [{ 
                data: valores,
                backgroundColor: [
                    'rgba(101, 228, 108, 1.0)',
                    'rgba(10, 6, 226, 1.0)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(243, 7, 7, 1)'
                ],
                borderColor: [
                    'rgba(101, 228, 108, 1.0)',
                    'rgba(10, 6, 226, 1.0)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(243, 7, 7, 1)'
                ],
            }],
        },
        options: {
            cutoutPercentage : 0,
        }
    });
    </script>
    <?php $idp = $idp + 1;
    } ?>
</body>
</html>
<?php $conn->close(); ?>