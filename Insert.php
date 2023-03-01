<?php
	include 'conexao.php';
	$cont = 0;
	$id = $_POST["idform"];
	$nameper = $_POST["ti"];
	$tip = $_POST["tipres"];
	$nomeform = $_POST["nomef"];
	$CPF = $_POST["CPF"];
	$desc = $_POST["descf"];
	$dataf = $_POST["dataf"];

	$sql = "INSERT INTO formulario (Nome, Funcionario_CPF, idFormulario, Descricao, Datafechar)
			VALUES ('".$nomeform."', '".$CPF."','".$id."','".$desc."','".$dataf."')";
	if ($conn->query($sql) === TRUE) {
		$idper = $id*10;
		while($cont<$_POST["nques"]){
			$sql = "INSERT INTO pergunta (idPerguntas, Titulo, Tipo)
				VALUES ('".$idper."', '".$nameper[$cont]."','".$tip[$cont]."')";
			if ($conn->query($sql) === TRUE) {
				$sql = "INSERT INTO pergunta_formulario (Pergunta_idPerguntas, Form_id)
					VALUES ('".$idper."','".$id."')";
				if ($conn->query($sql) === TRUE) {

				} else {
					echo "Erro: " . $sql . "<br>" . $conn->error;
				}
			} else {
				echo "Erro: " . $sql . "<br>" . $conn->error;
			}
			$idper=$idper+1;
			$cont = $cont+1;
		}
		?>
			<script>
				alert('Enviado com sucesso!');
				window.location = 'Dados.php?cpf=<?php echo $CPF; ?>';
			</script>
		<?php
	} elseif($conn->error == "Cannot add or update a child row: a foreign key constraint fails (`brunoh_adriano`.`formulario`, CONSTRAINT `Funcionario_CPF` FOREIGN KEY (`Funcionario_CPF`) REFERENCES `funcionario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION)"){
		?>
			<script>
				alert('O CPF digitado está incorreto!');
				window.location = 'Dados.php?cpf=<?php echo $CPF; ?>';
			</script>
		<?php
	} else {
	    echo "Erro: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?>