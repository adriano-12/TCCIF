<?php 
session_start();
include 'Conexao.php';

$CPF = $_POST['CPF'];
$submit = $_POST['submit'];
$senha = $_POST['senha'];
  if (isset($submit)) {
           
    $verifica = $conn->query("SELECT * FROM funcionario WHERE CPF = 
    '$CPF' AND senha = '$senha'") or die("erro ao selecionar");
      if ($verifica->num_rows<=0){
        ?>
	    <script>
	    	alert('Senha e/ou CPF errados');
			window.location = 'TCC-LoginF.php';
		</script>
        <?php
        die();
      }else{
        $sql = ("SELECT nome FROM funcionario WHERE CPF = '$CPF'");
        $con = $conn->query($sql) or die($conn->error);
        $dado = $con->fetch_assoc();
        $_SESSION["fun"] = $_POST['CPF'];
        $_SESSION["Nome"] = $dado['nome'];
        ?>
	    <script>
	    	alert('Logado Com sucesso!');
			window.location = "Dados.php?cpf=<?php echo $CPF; ?>";
		</script>
        <?php
      }
  }
?>