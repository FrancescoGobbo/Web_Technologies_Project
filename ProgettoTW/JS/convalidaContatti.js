function validazioneFormContatti(){
    var nome = document.getElementById("nomeM").value;
	var mail = document.getElementById("emailM").value;
	var tel= document.getElementById("telM").value;
    var ogg = document.getElementById("oggM").value;
	var messaggio = document.getElementById("mexM").value;
    
    var corretto = checkNome(nome);
    var risMail = checkMail(mail);
	var risTel = checkTelefono(tel);
	var risOgg = checkOggetto(ogg);
	var risMess = checkMessaggio(messaggio)
    
    corretto = corretto && risMail && risTel && risOgg && risMess;
	return corretto;    
}

function checkNome(nome)
{
    var errore;
    var nome_regExp = new RegExp('^[a-zA-Z \']{3,}$');
    if((nome == ""))
    {
        errore = "Nome campo obbligatorio";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    if (!nome_regExp.test(nome)) 
    {
        errore = "Nome non valido, troppo corto";
        document.getElementById("erNome").innerHTML = errore;
        return false;
    }
    else 
    {
        document.getElementById("erNome").innerHTML = "";
        return true;
    }
}

function checkMail(mail)
{
    var errore;
    //var email_regExp = new RegExp('^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$');
    
    var email_regExp =/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/;
    if (!email_regExp.test(mail) || (mail == "")) 
    {
        errore = "E-mail non valida";
        document.getElementById("erEmail").innerHTML = errore;
        return false;
    } else 
    {
        document.getElementById("erEmail").innerHTML = "";
        return true;
    }
        
}

function checkTelefono(tel)
{
	var errore;
	var tel_regExp = new RegExp(/^((\+)39)+\d{9,10}$/);
	if(tel == "")
	{
		errore= "Cellulare obbligatorio";
		document.getElementById("erTel").innerHTML = errore;
        return false;
	}
	else{
		if(!tel_regExp.test(tel))
		{
			errore= "Il numero deve iniziare +39 e al più 10 cifre";
			document.getElementById("erTel").innerHTML = errore;
        	return false;
		}
		else
		{
			document.getElementById("erTel").innerHTML = "";
            return true;
		}
	}
}

function checkOggetto(oggetto)
{
	var errore;
	if(oggetto == "")
	{
		errore = "Oggetto obbligatorio";
        document.getElementById("erOgg").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erOgg").innerHTML = "";
           return true;
	}
}

function checkMessaggio(messaggio)
{
	var errore;
	if(messaggio == "")
	{
		errore = "Messaggio obbligatorio";
        document.getElementById("erMess").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erMess").innerHTML = "";
           return true;
	}
}