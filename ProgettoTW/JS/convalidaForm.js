function validazioneFormUtente(){
	var nomeU = document.getElementById("nome").value;
	var cognomeU = document.getElementById("cognome").value;
	var mailU = document.getElementById("email").value;
    var chiaveU = document.getElementById("parolachiave").value;
	var passw = document.getElementById("password").value;
    var confPassw = document.getElementById("confermapassword").value;
	
	var corretto = checkNome(nomeU);
    var risCogn = checkCognome(cognomeU);
    var risMail = checkMail(mailU);
    var risChiave = checkChiave(chiaveU);
    var coinPass = confrontoPass(passw,confPassw);
    
	corretto = corretto && risCogn && risMail && risChiave && coinPass;
	return corretto;
}

function validazioneFormCantina() {
	var nome = document.getElementById("nome").value;
	var cognome = document.getElementById("cognome").value;
    var nomeCantina = document.getElementById("nomedellacantina").value;						//nome
    
	var mail = document.getElementById("email").value;
	var tel= document.getElementById("telefono").value;
	var indirizzo= document.getElementById("indirizzo").value;
	
	var reg= document.getElementById("regione").value;
	var prov= document.getElementById("provincia").value;
	var citta= document.getElementById("citta").value;
		
	var desc= document.getElementById("descrizione").value;
	
    var chiave = document.getElementById("parolachiave").value;
	var passw = document.getElementById("password").value;
    var confPassw = document.getElementById("confermapassword").value; 		//conferma password
	
	var corretto = checkNome(nome);
    var risCogn = checkCognome(cognome);
	var risCant = checkNomeCantina(nomeCantina);
    var risMail = checkMail(mail);
	var risTel= checkTelefono(tel);
	var risInd= checkIndirizzo(indirizzo);
	var risReg= checkRegione(reg);
	var risProv= checkProvincia(prov);
	var risCitta= checkCitta(citta);
	var risDesc= checkDesc(desc);
    var risChiave = checkChiave(chiave);
    var coinPass = confrontoPass(passw,confPassw);
    
	corretto = corretto && risCogn && risCant && risMail && risTel && risInd && risReg && risProv && risCitta && risDesc && risChiave && coinPass;
	return corretto;
}

function validazioneFromAccedi(){
    var mail = document.getElementById("email").value;
    var passw = document.getElementById("password").value;
    
    var corretto = checkMail(mail);
    var risPass = checkPass(passw);
    
    corretto = corretto && risPass;
    return corretto;
}

function validazioneFromRecupero(){
    var mail = document.getElementById("email").value;
    var pk = document.getElementById("parolachiave").value;
    
    var corretto = checkMail(mail);
    var risPChiave = checkChiave(pk);
    
    corretto = corretto && risPChiave;
    return corretto;
}

function validazioneFromCambioPassword(){
	var passw = document.getElementById("newpassword").value;
    var confPassw = document.getElementById("confermanewpassword").value; 		//conferma password
	
	var corretto = confrontoPass(passw,confPassw);
	return corretto;
}

function checkNome(nome)
{
    var errore;
    var nome_regExp = new RegExp('^[a-zA-Z ]{3,}$');
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

function checkCognome(cognome)
{
    var errore;
    var cogno_regExp = new RegExp('^[a-zA-Z \']{3,}$');
    if((cognome == ""))
    {
            errore = "Cognome campo obbligatorio";
            document.getElementById("erCognome").innerHTML = errore;
            return false;
    }
    if (!cogno_regExp.test(cognome)) 
    {
        errore = "Cognome non valido, troppo corto";
        document.getElementById("erCognome").innerHTML = errore;
        return false;
    }
    else 
    {
        document.getElementById("erCognome").innerHTML = "";
        return true;
    }
}

function checkNomeCantina(nomeCantina)		
{
    var nomeCant = nomeCantina.value;
    var errore;
    var nomeCantina_regExp = new RegExp('^[a-zA-Z \'.\-]{3,}$');	
    
    if(nomeCant == "")
    {
        errore = "Campo obbligatorio";
        document.getElementById("erNomeCantina").innerHTML = errore;
        return false;
    }
    if(!nomeCantina_regExp.test(nomeCantina))
    {
        errore = "Campo non valido/corto/presenza di caratteri non idonei";
        document.getElementById("erNomeCantina").innerHTML = errore;
        return false;
    }else 
    {
        document.getElementById("erNomeCantina").innerHTML = "";
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
function checkIndirizzo(indirizzo){
	var errore;
	if(indirizzo == "")
	{
		errore = "Indirizzo obbligatorio";
        document.getElementById("erInd").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erInd").innerHTML = "";
           return true;
	}
}
function checkRegione(reg)
{
	var errore;
	if(reg == "")
	{
		errore = "Regione obbligatoria";
        document.getElementById("erReg").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erReg").innerHTML = "";
           return true;
	}
}
function checkProvincia(prov)
{
	var errore;
	if(prov == "")
	{
		errore = "Provincia obbligatoria";
        document.getElementById("erProv").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erProv").innerHTML = "";
           return true;
	}
}
function checkCitta(citta)
{
	var errore;
	if(citta == "")
	{
		errore = "Citta' obbligatoria";
        document.getElementById("erCitta").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erCitta").innerHTML = "";
           return true;
	}
}
function checkDesc(desc)
{
	var errore;
	if(desc == "")
	{
		errore = "Descrizione obbligatoria";
        document.getElementById("erDesc").innerHTML = errore;
        return false;
	}
	else{
		document.getElementById("erDesc").innerHTML = "";
           return true;
	}
}

function checkChiave(chiave)
{
    var errore;
    var chiave_regExp = new RegExp('^[a-zA-Z0-9]{4,12}$');
    if(chiave == "")
    {
        errore = "Parola chiave obbligatoria";
        document.getElementById("erChiave").innerHTML = errore;
        return false;
            
    }
    else
    {
        if (!chiave_regExp.test(chiave)) 
        {
            errore = "Alfanumerica, tra 4 - 12";
            document.getElementById("erChiave").innerHTML = errore;
            return false;
        }
        else 
        {
            document.getElementById("erChiave").innerHTML = "";
            return true;
        }
    }
}
function confrontoPass(passw,confPassw)
{
    var errore;
    if(passw == "")
    {
        errore = "Password campo obbligatorio";
        document.getElementById("erConfPas").innerHTML = errore;
        return false;
    }else{
        if(passw != confPassw)
        {
            errore = "Password non coincidenti";
            document.getElementById("password").value="";
            document.getElementById("conferma password").value="";


            document.getElementById("erConfPas").innerHTML = errore;
            return false;
        }
        else
        {
            document.getElementById("erConfPas").innerHTML = "";      
            return true;
        }
    }
}

function checkPass(password)
{
    var errore;
    if(password == "")
    {
        errore = "Password campo obbligatorio";
        document.getElementById("erPassw").innerHTML = errore;
        return false;
    }
    else
    {
        document.getElementById("erPassw").innerHTML = "";
        return true;
    }
}