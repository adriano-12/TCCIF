<?php
include 'conexao.php';
$cpf = $_GET['id'];

$sql = "DELETE FROM Funcionario WHERE CPF=$cpf";
if ($conn->query($sql) === TRUE) {
    ?>
        <script>
            alert('Excluido com sucesso!');
            window.location = 'Dadosfunc.php';
        </script>
    <?php
} elseif($conn->error == "Cannot delete or update a parent row: a foreign key constraint fails (`brunoh_adriano`.`formulario`, CONSTRAINT `CPF` FOREIGN KEY (`Funcionario_CPF`) REFERENCES `funcionario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION)") {
    ?>
	    <script>
			alert('Existe um formulário ligado a este CPF, é necessário que ele seja deletado!');
			window.location = 'Dados.php';
			</script>
	<?php
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>