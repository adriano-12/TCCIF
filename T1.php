<?php
    error_reporting(0);
    session_start();
    include 'menu.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar Formulários</title>
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
            <input type="text" name="ti[]" id="nm"><br><br>
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
            </select><br>
            <p class="desc">Na opção de seleção na caixa separe a pergunta e as opções com * 
                Exemplo: Titulo da pergunta: Qual é sua turma?*2º ano*3º ano.
                As opções que tem +comentario adicionam uma caixa de texto para o usuario digitar.</p>
            <br><br>
            
            <input class ="submit" type="button" value="Remover" onclick="produtoList.remove(this.parentNode)" />
            <br><br><br>
        </fieldset>
    </div>

    <div class="box2">
    <h2>Crie seu formulário</h2>
    <form id="form" action="Insert.php" method="POST">
        Nome do Formulário:<br>
        <input type="text" name="nomef"><br>
        <input type="text" name="CPF" value ="<?php echo $_SESSION["fun"]; ?>" style="display: none"> <br><br>
        Descrição do Formulário: <br>
        <textarea rows="8" cols="80" name="descf" ></textarea><br>
        Data de Fechamento:<br>
        <input type="date" name="dataf"><br><br>
        <div id="qlista">
        </div>
        <input type="number" name="nques" id="nques" value="0" style="display: none">
        <input type="number" name="idform" id="idform" style="display: none">
        <script>
            var idform = Math.floor(Math.random() * 100001);
            document.getElementById('idform').value = idform;
        </script>
        <br>
        <input class ="submit" type="button" value="Criar Pergunta" onclick="produtoList.insert()"  /><br><br>
        <input class ="submit" type="submit" name="submit" value="Enviar Formulário">
        
    </form>
    <br>
    </div>
    <script>
        var cont=0;
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