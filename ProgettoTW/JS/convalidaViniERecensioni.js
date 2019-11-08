function validazioneFormVini(){
    var nome = document.getElementById("nomevino").value;
	var tipo = document.getElementById("tipovino").value;
    
    var corretto = checkNome(nome);
    var risTipo = checkTipo(tipo);
    
    corretto = corretto && risTipo;
	return corretto;    
}

function validazioneFormRecensioni(){
    var nome = document.getElementById("valutazione").value;
	var recensione = document.getElementById("recensionecantina").value;
    
    var corretto = checkValutazione(nome);
    var risRec = checkRecensione(recensione);
    
    corretto = corretto && risRec;
	return corretto;    
}


function checkNome(nome)
{
    var errore;
    var nome_regExp = new RegExp('^[a-zA-Z \'.\-]{3,}$');
    if((nome == ""))
    {
        errore = "Nome campo obbligatorio";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    if (!nome_regExp.test(nome)) 
    {
        errore = "Campo non valido/corto/presenza di caratteri non idonei";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    else 
    {
        document.getElementById("erNome").innerHTML = "";
        return true;
    }
}

function checkTipo(nome)
{
    var errore;
	var nome_regExp = new RegExp('^[a-zA-Z \'.\-]{3,}$');
    if((nome == ""))
    {
        errore = "Tipo campo obbligatorio";
        document.getElementById("erTipo").innerHTML = errore;
        return false;
    }
	if (!nome_regExp.test(nome)) 
    {
        errore = "Campo non valido/corto/presenza di caratteri non idonei";
        document.getElementById("erTipo").innerHTML = errore;
        return false;
    }
    else 
    {
        document.getElementById("erTipo").innerHTML = "";
        return true;
    }
}

function checkValutazione(nome)
{
    var errore;
    var nome_regExp = new RegExp('^[a-zA-Z \'.\-]{3,}$');
    if((nome == ""))
    {
        errore = "Valutazione generale campo obbligatorio";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    if (!nome_regExp.test(nome)) 
    {
        errore = "Campo non valido/corto/presenza di caratteri non idonei";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    else 
    {
        document.getElementById("erNome").innerHTML = "";
        return true;
    }
}

function checkRecensione(descrizione)
{
	var errore;
	if(descrizione == "")
	{
		errore = "Messaggio obbligatorio";
        document.getElementById("erRec").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erRec").innerHTML = "";
           return true;
	}
}