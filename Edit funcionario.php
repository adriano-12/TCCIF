<?php
    include 'Conexao.php';

	$cpf = $_GET["cpf"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$sql = "UPDATE funcionario set nome = '$nome', email = '$email', Senha = '$senha' WHERE CPF = '$cpf'";

	if ($conn->query($sql) === TRUE) {
		?>
	    <script>
	    	alert('Registro modificado com sucesso.');
			window.location = 'Dadosfunc.php';
		</script>
        <?php
	} else {
	    echo "Erro: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>