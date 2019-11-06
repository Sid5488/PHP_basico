function validarEntrada (caracter, tipoAceito){
    
    //charCode ou which - converte o caracter digitado em ascii
    
    //Serve p/ padronizar a conersão em ascii em todas as versões de navegadores
    //baseados em janelas ou não.
    if (window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which; 
    
    var tipo = tipoAceito;
    console.log(tipoAceito);
    
    if(tipo == "string"){
       //valida apenas a digitação de letras
        if(asc >= 48 && asc <= 57)
            return false; //cancela o evento da tecla digitada
    }
    else if (tipo == "numeric"){
        if(asc < 48 || asc > 57)
            return false; //cancela o evento da tecla digitada
    }
    
}
//Professor fez com o tipo de bloqueio

function mascaraFone(obj, caracter){
    
    if(validarEntrada(caracter, "numeric")==false)
        return false
    else{
       //console.log(input);
        var input = obj.value;
        var id = obj.id;
        var resultado = input;

        if(input.length == 0)
            resultado = "(";
        else if(input.length == 4)
            resultado +=") ";
        else if(input.length == 10)
            resultado += "-";
        else if(input.length == 15)
            return false;

        document.getElementById(id).value = resultado; 
    }
}