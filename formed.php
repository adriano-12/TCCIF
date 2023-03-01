<?php
$id = $_GET['id'];
include 'menu.php';
include 'conexao.php';
error_reporting(0);
$sql = "SELECT * FROM formulario WHERE idFormulario=$id";
$con = $conn->query($sql) or die($conn->error);
$dado = $con->fetch_assoc();
$sql2 = "SELECT pp.idPerguntas,pp.Titulo,pp.Tipo FROM pergunta AS pp JOIN pergunta_formulario AS pf ON pp.idPerguntas = pf.Pergunta_idPerguntas WHERE pf.Form_id = $id";
$con2 = $conn->query($sql2) or die($conn->error);
$tipresel = "";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Formulário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CS.css">
    <script src="main.js">
    </script>
</head>

<body>

    <div id="qbase" style="display: none">
        <fieldset>
            <legend>Pergunta:</legend><br><br>
            Titulo da pergunta:<br>
            <input type="text" name="ti[]" id="nm" ><br><br>
            Tipo da resposta:<br>
            <select class="tiporesposta" name="tipres[]">
                <option value="txt">Texto</option>
                <option value="txt2">Texto Longo</option>
                <option value="drop">Seleção na caixa</option>
                <option value="2op">Sim e Não</option>
                <option value="4op">4 Opções(Ótimo-Ruim)</option>
                <option value="txt2op">Sim e Não + comentário</option>
                <option value="txt4op">4 Opções(Ótimo-Ruim) + comentário</option>
                <option value="dt">Data</option>
                <option value="num">Número</option>
            </select>
            
            <input class="submit" type="button" value="Remover" onclick="produtoList.remove(this.parentNode)" />
            <br>
            <p class="desc">Na opção de seleção na caixa separe a pergunta e as opções com * 
                Exemplo: Titulo da pergunta: Qual é sua turma?*2º ano*3º ano.
                As opções que tem +comentario adicionam uma caixa de texto para o usuario digitar.</p>
            <br><br>
        </fieldset>
    </div>

    <div class="box2">
    <h2>Edite seu formulário</h2>
    <form id="form" action="Insert.php" method="POST">
        Nome do Formulário:<br>
        <input type="text" name="nomef" value="<?php echo $dado['Nome']; ?>"><br>
        <input type="text" name="CPF" value ="<?php echo ($_SESSION['fun']); ?>" style="display: none"><br><br>
        <input type="number" name="nques" id="nques" value="0" style="display: none">
        Descrição do Formulário: <br>
        <textarea rows="8" cols="80" name="descf"><?php echo $dado['Descricao'];?></textarea><br>
        Data de Fechamento:<br>
        <input type="date" name="dataf" value="<?php echo $dado['Datafechar']; ?>"><br>
        <div id="qlista">
        <?php while($dado2 = $con2->fetch_array()) { ?>
            <div>
            <fieldset>
                <legend>Pergunta:</legend><br><br>
                Titulo da pergunta:<br>
                <input type="text" name="ti[]" id="nm" value="<?php echo $dado2['Titulo']; ?>" ><br><br>
                Tipo da resposta:<br>
                
                <?php
                    switch ($dado2['Tipo']) {
                        case 'txt':
                            $tipresel = "Texto";
                            break;
                        case 'txt2':
                            $tipresel = "Texto Longo";
                            break;
                        case 'drop':
                            $tipresel = "Seleção na caixa";
                            break;    
                        case '2op':
                            $tipresel = "Sim e Não";
                            break;
                        case '4op':
                            $tipresel = "4 Opções(Ótimo-Ruim)";
                            break;
                        case 'txt2op':
                            $tipresel = "Sim e Não + comentário";
                            break;
                        case 'txt4op':
                            $tipresel = "4 Opções + comentário";
                            break;
                        case 'dt':
                            $tipresel = "Data"; 
                            break;
                        default:
                            $tipresel = "Número";
                    }
                ?>
                
                <select class="tiporesposta" name="tipres[]" ><br><br>
                    <option value="<?php echo $dado2['Tipo']; ?>"><?php echo $tipresel; ?></option>
                    <option value="txt">Texto</option>
                    <option value="txt2">Texto Longo</option>
                    <option value="drop">Seleção na caixa</option>
                    <option value="2op">Sim e Não</option>
                    <option value="4op">4 Opções(Ótimo-Ruim)</option>
                    <option value="txt2op">Sim e Não + comentário</option>
                    <option value="txt4op">4 Opções + comentário</option>
                    <option value="dt">Data</option>
                    <option value="num">Número</option>
                </select><br>
                <p class="desc">Na opção de seleção na caixa separe a pergunta e as opções com * 
                Exemplo: Titulo da pergunta: Qual é sua turma?*2º ano*3º ano.
                As opções que tem +comentario adicionam uma caixa de texto para o usuario digitar.</p>
                <br><br>
                <input class="submit" type="button" value="Remover" onclick="produtoList.remove(this.parentNode)" /><br><br><br>
            </fieldset>
            </div>
            <script>
            document.getElementById('nques').value = Number(document.getElementById('nques').value)+1;
            </script>
        <?php } ?>
        </div>
        <input type="number" name="idform" id="idform" style="display: none"><br>
        <script>
            var idform = Math.floor(Math.random() * 100001);
            document.getElementById('idform').value = idform;
        </script>
        <input class="submit" type="button" value="Criar Pergunta" onclick="produtoList.insert()" /><br><br>
        <input class="submit" type="submit" name="submit" value="Enviar Formulário"><br><br>
    </form>
    </div>
    <script>
        var cont= Number(document.getElementById('nques').value);
        var produtoList = {
            'init': function () {
                this.divProdutoList = document.getElementById('qlista');
                this.divProdutoBase = document.getElementById('qbase');
            },

            'insert': function () {
                var newDiv = this.divProdutoBase.cloneNode(true);
                newDiv.style.display = '';
                console.log('newDiv => ', newDiv);
                this.divProdutoList.appendChild(newDiv);
                console.log("numzei");
                cont=cont+1;
                document.getElementById('nques').value = cont;
            },

            'remove': function (el) {
                el.parentNode.removeChild(el);
                cont=cont-1;
                document.getElementById('nques').value = cont;
            }
        };
        produtoList.init();
    </script>
    
</body>

</html>
<?php $conn->close(); ?>