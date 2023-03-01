<?php
    include 'Conexao.php';

	$cpf = $_POST["CPF"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$sql = "INSERT INTO Funcionario (CPF, nome, email, Senha)
		VALUES ('".$cpf."','".$nome."', '".$email."','".$senha."')";

	if ($conn->query($sql) === TRUE) {
		?>
	    <script>
	    	alert('Registro inserido com sucesso.');
			window.location = 'Index.php';
		</script>
        <?php
	} else {
	    echo "Erro: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>