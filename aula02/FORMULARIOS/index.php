<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Aula de Formulários
        </title>
        <style>
            /* Impede a alteração do tamanho da caixa */
            textarea{
                resize: none;
            }
        </style>
    </head>
    <body>
        <form name="frmformulario" method="get" action="index.php">
            Nome: <input type="text" name="txtnome" value="" size="50" maxlength="40">
            <br>
            <br>
            Estados: 
            <select name="sltestados">
                <!-- Selected: Define qual opção será exibida na tela a princípio-->
                <option value="" selected> Selecione </option>
                <option value="SP"> São Paulo </option>
                <option value="RJ"> Rio de Janeiro </option>
                <option value="MG"> Minas Gerais </option>
            </select>
            <br>
            Selecione um sexo:
            <!-- No elemento radio é obrigatório que todos os elementos tenham o msm nome, 
                 senão ele permite a seleção múltipla  -->
            <!-- checked - deixa um item pré selecionado  -->
            <input type="radio" name="rdosexo" value="F" checked> Feminino
            <input type="radio" name="rdosexo" value="M"> Masculino
            <br>
            <!-- No elemento checkbox é permitido a múltipla escolha -->
            Selecione os idiomas:
            <input type="checkbox" name="chking" value="EN"> Inglês
            <input type="checkbox" name="chkport" value="PT" checked> Português
            <input type="checkbox" name="chkesp" value="ES"> Espanhol
            <br>
            <!-- Cols - quantidade de caracteres inseridos até pular uma linha
                rows - quantidade de linhas -->
            Obs:<textarea name="txtobs" cols="30" rows="5" ></textarea>  <!-- Não identar essa tag-->
            <br>
            <!-- Esse botão aciona e resgata os dados -->
            <input type="submit" name="btnsalvar" value="salvar">
            <br>
            <!-- Perde a funcionalidade ao utilizar o php -->
            <input type="reset" name="btnlimpar" value="limpar">
        </form>
    </body>
</html>