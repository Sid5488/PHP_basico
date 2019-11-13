
    
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD-Contatos</title>
    
</head>

<body>

<!-- 
    Construir a modal que irá receber os dados
    de outro arquivo, através do javascript
-->
<div id="container">
    <div id="modal">
        <div id="fechar">Fechar</div>
        <div id="modalDados"></div>
            
    </div>
</div>    
    
<div id="principal">
	<div id="cabecalho">
		<img src="imagens/mvc.jpg" width="980" height="200">
    </div>

    <div id="content">
    	<div id="cadastro">
        	
            <form name="frmcontatos" method="post" action="" >
            
                <table id="tblcadastro">
                  <tr>
                    <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Nome:</td>
                    <td><input placeholder="Digite seu nome"  name="txtnome" type="text" value="" onkeypress="return validarEntrada(event,'numeric');" required   /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Telefone:</td>
                    <td><input id="telefone" placeholder="Ex:999 9999-9999"   name="txttelefone" type="text" value="" onkeypress="return mascaraFone(this, event);" required  /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Celular:</td>
                    <td><input id="celular" name="txtcelular" type="text" value="" required /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Email:</td>
                    <td><input name="txtemail" type="email" value="" required  /></td>
                  </tr>

				  <tr>
                    <td class="tblcadastro_td">Data Nascimento:</td>
                    <td><input name="txtdatanasc" placeholder="99/99/9999" type="text" value="" required /></td>
                  </tr>
                   <tr>
                    <td class="tblcadastro_td">Sexo:</td>
                    <td>
					<input type="radio" name="rdosexo" value="F"  required   />Feminino
					<input type="radio" name="rdosexo" value="M"  required  />Masculino
					</td>
                  </tr>
				  <tr>
				  
                    <td class="tblcadastro_td">Obs:</td>
                    <td><textarea name="txtobs" cols="20" rows="5" required></textarea></td>
                  </tr>
                     
                    
                  <tr>
                    <td><input name="btnsalvar" type="submit" value="" /></td>
                    <td></td>
                  </tr>
                    
                    
                </table>
               
            
            </form>

        </div>
        
        <div id="consulta">
        	<table id="tblconsulta">
              <tr>
                <td class="titulo_tabela" colspan="6">Consulta de Contatos</td>
              </tr>
              <tr class="tblcadastro_td">
                <td>Nome</td>
                <td>Telefone</td>
                <td>Celular</td>
                <td>Email</td>
              
              
                <td>Opções</td>
              </tr>
                
            
           
              <tr class="tblconsulta_dados">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
               
               
                <td>
                   
                        <img src="icones/Modify16.png">

                  | 
                    
                        <img src="icones/Delete16.png">
                   
                  | 
                    
                        <img src="icones/consulta.png" width="24" height="24">
                    
                </td>
              </tr>
                
      
           
            </table>
        </div>    
        
           
    </div>
    
    <div id="rodape">
    
    </div>
    
</div>

</body>
</html>



	

