<?php
    include 'conexao.php';
    $id = $_POST["idform"];
	$resp = $_POST["res"];
	$id = $id*10;
	$cont = 0;
	$cont2 = 0;
	$idres = $id * 10 + rand(1,1000);

	while($cont<$_POST["nques"]){
		$cont2 = $cont+10;
		$sql = "INSERT INTO resposta (idResposta, Resposta, RespostaSecundaria)
			VALUES ('".$idres."', '".$resp[$cont]."','".$resp[$cont2]."')";
		if ($conn->query($sql) === TRUE) {
			$sql = "INSERT INTO pergunta_resposta (Pergunta_idPerguntas, Respostas_idResposta)
				VALUES ('".$id."','".$idres."')";
			if ($conn->query($sql) === TRUE) {

			} else {
				echo "Erro: " . $sql . "<br>" . $conn->error;
			}
		} else {
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}
		$id=$id+1;
		$cont = $cont+1;
		$idres = $idres+1;
	}
	?>
		<script>
			alert('Enviado com sucesso!');
			window.location = 'Index.php';
		</script>
	<?php
	$conn->close();
?>