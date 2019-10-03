<?php
    if(isset($_POST['btncalc']))
    {
        $cont = 0;
        $numeroFinal = $_POST['txtvalor'];
        
        echo("----- USANDO O WHILE -----<br>");
        while($cont <= $numeroFinal)
        {
            echo($cont."<br>");
            // $cont = $cont + 1;
            // $cont += 1;
             $cont ++;
            
        }
        
        echo("----- USANDO O FOR -----<br>");
        for($cont=0; $cont <= $numeroFinal; $cont++)
        {
           echo($cont."<br>"); 
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Aula de Formulários
        </title>
    </head>
    <body>
        <form name="frmrepetir" action="index.php" method="post">
            Digite um número: <input type="text" name="txtvalor" value="" maxlength="30" size="30"> <br><br>
            <input type="submit" name="btncalc" value="Calcular">
        </form>
    </body>
</html>