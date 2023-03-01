<?php
include 'conexao.php';
$id = $_GET['id'];
$sql = "SELECT Pergunta_idPerguntas FROM pergunta_formulario
        WHERE Form_id = $id";
$con = $conn->query($sql) or die($conn->error);
$sql = "DELETE FROM pergunta_formulario WHERE Form_id=$id";

if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM formulario WHERE idFormulario=$id";
    if ($conn->query($sql) === TRUE) {
        while($dado = $con->fetch_array()){
            $id = $dado['Pergunta_idPerguntas'];
            $sql = "DELETE FROM pergunta WHERE idPerguntas=$id";
            if ($conn->query($sql) === TRUE) {
            } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    ?>
		<script>
			alert('Excluido com sucesso!');
			window.location = 'Dados.php';
		</script>
	<?php
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>