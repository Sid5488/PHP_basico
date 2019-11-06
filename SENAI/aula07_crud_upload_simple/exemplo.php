<?php
    // 02/10 Ativa o recurso de variaveis de sessão do servidor
    // 02/10 valida se a variavel de sessao ja foi iniciada
    if(!isset($_SESSION))
    {
        session_start();    
    }

    
    
    $slqEdit = "";
    $checkM = "";
    $checkF = "";
    $botao = "inserir";
    $codEstado = (int) 0;
    $siglaEstado = (string) "";
    $nomeFoto = (string) "";

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

    //valida se existe a variável modo
    if(isset($_GET['modo']))
    {
        // valida se a ação de modo é editar
        if($_GET['modo'] == 'editar')
        {
            // resgata o id do registro
           $codigo = $_GET['codigo'];
            // 02/10  variavel de sessao para enviar o codigo do registro para outra página    
            $_SESSION['codigo'] = $codigo;
            
           $slqEdit = "select tblcontatos.*, tblestado.sigla
                       from tblcontatos inner join tblestado
                       on tblestado.codigo = tblcontatos.codestado
                       where tblcontatos.codigo =".$codigo;
            
           $select = mysqli_query($conexao, $slqEdit);
            
           if($select == true){
               $rs = mysqli_fetch_array($select);
               
               $nome = $rs['nome'];
               $tel = $rs['telefone'];
               $cel = $rs['celular'];
               $email = $rs['email'];
               $data_nascimento = explode("-", $rs['dt_nasc']);
               $data_nascimento = $data_nascimento[2]."/".$data_nascimento[1]."/".$data_nascimento[0];
               $obs = $rs['obs'];
               $sexo = $rs['sexo'];
               $nomeFoto = $rs['foto'];
               
               $codEstado = $rs['codestado'];
               $siglaEstado = $rs['sigla'];
               
               
               //teste qual é o sexo
               if($sexo == "M")
                   $checkM = "checked";
               else
                   $checkF = "checked";
               
               $_SESSION['nomeFoto'] = $nomeFoto;
               $botao = "editar";
           }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CRUD - Contatos
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css" >
        <!--  02/10 1 Sempre primero -->
        <script src="js/jquery.js"></script>
        <script src="js/modulo.js"></script>
        
        <!-- 02/10 2 entre parenteses o q ele vai manipular (pagina) ready (quando for lida) é o evento executa uma função (chamada no proprio jquery)-->
        <script>
            $(document).ready(function(){
                // 3 função para abrir a modal
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);   
                });  
                
                $('#fechar').click(function(){
                    $('#container').fadeOut(1000);
                })
            });
            
            // 4  recuperar o id no js através de parametro 
            function visualizarDados(idItem)
            {
                // permite manipulação de frm no html
                $.ajax({
                    type:"POST",
                    url: "modalContatos.php",
                    data: {modo:'visualizar', codigo: idItem},
                    success: function(dados){
                    $('#modalDados').html(dados);
                    } 
                });      
            }
        </script>
    </head>
    <body>
        <!-- 02/10 0 modal descarregar outra pagina  
            Construir a modal q irá receber de outro arquivo, através do javaScript 
        -->
        <div id="container">
            <div id="modal">
                <div id="fechar">Fechar</div>
                <div id="modalDados"></div>
            </div>
        </div>
       <div id="main">
           <h1> Cadastro de Contatos </h1>
           
           <!--
                type="text", "email", "tel", "number" (tem minimo e maximo), "range", "url", 
                "password", "date", "month" (mês), "week"(semana), "color"
                
                required - faz com que a caixa seja obrigatória
                pattern  - permite criar uma mascara para a entrada de dados no formulário

                pattern="[a-zA-Z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]*"
                pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" placeholder="Ex: 999 9999-9999"

                onkeypress - faz o tratamento antes de processar
                onkeyup - processa o dado, exibe na caixa e dps faz o tratamento
            -->
           <!-- Sem o enctype="multipart/form-data" o formulário não resgata as fotos e é obrigatório que o método seja POST         -->
           <form method="post" action="bd/salvar.php" name="frmcontato" enctype="multipart/form-data">
               <div class="item">
                   <p>Nome: </p>
                   <input placeholder="Digite seu nome" class="input" value="<?=@$nome;?>" type="text" name="txtnome" maxlength="20" size="18" required onkeypress="return validarEntrada(event, 'string');" />
               </div>
               
               <div class="item">
                   <p>Telefone: </p>
                   <input class="input" value="<?=@$tel;?>" id="telefone" type="text" name="txttelefone" maxlength="20" size="18" required onkeypress="return mascaraFone(this, event);" />
               </div>
               
               <div class="item">
                   <p>Celular: </p>
                   <input class="input" value="<?=@$cel;?>" type="text" name="txtcelular" id="celular" maxlength="20" size="18" required onkeypress="return mascaraFone(this, event);"/>
               </div>
               
               <div class="item">
                   <p>Email: </p>
                   <input class="input" value="<?=@$email;?>" type="email" name="txtemail" maxlength="20" size="18" required />
               </div>
               
               <div class="item">
                   <p>Foto: </p>
                   <input class="input" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg"
                   />
               </div>
               
               <div class="item">
                   <h2>Data de Nascimento: </h2>
                   <input class="input" value="<?=@$data_nascimento;?>" type="text" name="txtdata" maxlength="20" size="18" required onkeypress="return validarEntrada(event, 'numeric');" />
               </div>
               
               <div class="item">
                   <p>Estado: </p>
                   <select name="sltestados" class="input">
                       
                        <?php if($_GET['modo'] == 'editar'){ ?>
                       
                            <option value="<?=$codEstado?>"> <?=$siglaEstado?></option>
                       
                        <?php } else {?>
                        <option value=""> Selecione um estado </option>
                       
                       <!-- Listagem dos estados da tabela de estados -->
                        <?php
                            }
                            $sql = "select * from tblestado
                                    where codigo <> ".$codEstado;
                            $select = mysqli_query($conexao, $sql);
                            while($rsEstados = mysqli_fetch_array($select)){
                         ?>
                            <option value="<?=$rsEstados['codigo']?>">
                                <?=$rsEstados['sigla']?>
                            </option>
                        <?php }?>
                   </select>
               </div>
               
               <div class="item">
                   <p>Sexo: </p>
                   <input class="input" type="radio" <?=$checkF?> name="rdosexo" value="F" required />
                   <span> Feminino</span>
                   <input class="input" type="radio" <?=$checkM?> name="rdosexo" value="M" required />Masculino 
               </div>
               
               <div id="caixa_txt">
                   <h3>Obs: </h3>
                   <textarea name="txtobs" cols="20" rows="5"><?=@$obs;?></textarea>
               </div>
               <div class="item_foto">
                   <img src="bd/arquivos/<?=$nomeFoto?>">
               </div>
               <input type="submit" name="btnsalvar" value="<?=$botao?>" id="btnsalvar" />
               <input type="submit" name="btnlimpar" value="limpar" id="btnlimpar" />
           </form>
       </div>
         
        <div id="caixa_consulta">
            <h1> Consulta de Contatos </h1>
            <div class="consulta_itens"> Nome </div>
            <div class="consulta_itens"> Telefone </div>
            <div class="consulta_itens"> Celular </div>
            <div class="consulta_itens"> Email </div>
            <div class="consulta_itens"> Estado </div>
            <div class="consulta_itens"> Foto </div>
            <div class="consulta_itens"> Opções </div>
            <!--            -->
            <?php 
                $sql = "select tblcontatos.*, tblestado.sigla
                        from tblcontatos Inner Join tblestado
                        on tblestado.codigo=tblcontatos.codestado";   
                      
                $select = mysqli_query($conexao, $sql);
                      
    
                /* 
                    Exemplos de funções que convertem a resposta do banco em formato de dados
                    para a manipulação:
                        mysqli_fetch_array() 
                        mysql_fetch_assoc()
                        mysqli_fetch_object()
                */
                      
                
                while ($rsContatos = mysqli_fetch_array($select))
                {
                    
            ?>
                <div class="consulta_itens backcolor"> <?=$rsContatos['nome']; ?> </div>
                <div class="consulta_itens backcolor"> <?=$rsContatos['telefone']; ?></div>
                <div class="consulta_itens backcolor">  <?=$rsContatos['celular']; ?></div>
                <div class="consulta_itens backcolor"> <?=$rsContatos['email']; ?> </div>
                <div class="consulta_itens backcolor"> <?=$rsContatos['sigla']; ?> </div>
                <div class="consulta_itens backcolor"> 
                    <img class="img_foto" src="bd/arquivos/<?=$rsContatos['foto']; ?>"/>
                </div>
                <div class="consulta_itens backcolor">
                    
                    <a href="exemplo.php?modo=editar&codigo=<?=$rsContatos['codigo']?>" class="icon"> <img src="img/pencil.png"></a> 
                    
                    <a onclick="return confirm('Deseja escluir esse registro ?');" href="bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['codigo']?>&nomeFoto=<?=$rsContatos['foto']?>" class="icon"> <img src="img/x.png"> </a> 
                    
                    <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsContatos['codigo']?>);"> <img src="img/lupa.png"></a>
                </div>
            <?php } ?>
        </div>
    </body>
</html>
<!--
    Formas de relacionar tabelas:

    select tblcontatos.*, tblestado.sigla
    from tblcontatos, tblestado
    where tblestado.codigo = tblcontatos.codeestado

    And...

    OU

    //select tblcontatos.*, tblestado.sigla, tblestado.descricao
    //select tblcontatos.*, tblestado.sigla, 
      tblestado.nome as estadoNome, tblcontatos.nome as contatoNome

      ("Apelida" os campos, visto que possuem o mesmo nome)
    //

    select tblcontatos.*, tblestado.sigla
    from tblcontatos inner join tblestado 
    on tblestado.codigo = tblcontatos.codestado

    inner join...
-->