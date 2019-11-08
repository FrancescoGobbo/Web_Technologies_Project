function validazioneFormEvento()
{
	var nome = document.getElementById("nomeevento").value;
	var linke = document.getElementById("linkevento").value;
	var data = document.getElementById("dataevento").value;
	var desc = document.getElementById("descrizioneevento").value;
	
	var corretto = checkNome(nome);
    var risData = checkData(data);
	var risLink = checkLink(linke);
	var risDesc = checkDesc(desc);
	
	corretto = corretto && risLink && risData && risDesc;
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

function checkLink(link)
{
	var pattern = new RegExp(/^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/); 
	if(link == "")	{
		document.getElementById("erLink").innerHTML = "";
         return true;
	}
	else
	{
		if(!pattern.test(link)) {
			    		errore = "Link errato";
			        document.getElementById("erLink").innerHTML = errore;
			        return false;
		} 
		else {
			    document.getElementById("erLink").innerHTML = "";
			         return true;
			}
	}	
}

function checkData(data)
{
	var pattern =new RegExp( /^(\d{4})-(\d{2})-(\d{2})$/);
	var Annomin = 2018;
	if(data == "")
	{
		errore = "Data obbligatoria";
        document.getElementById("erData").innerHTML = errore;
        return false;
	}
	if(!pattern.test(data)) 
		{
			errore = "Data nel formato aaaa-mm-gg";
	        document.getElementById("erData").innerHTML = errore;
	        return false;
		}
	else{
		if(regs = data.match(pattern)) {
	        if(regs[3] < 1 || regs[3] > 31) {
	          		errore = "Giorno non valido";
		       	 	document.getElementById("erData").innerHTML = errore;
		        		return false;
	        } else if(regs[2] < 1 || regs[2] > 12) {
					errore = "Mese non valido";
		       	 	document.getElementById("erData").innerHTML = errore;
		        		return false;
	        } else if(regs[1] < Annomin) {
					errore = "Anno non valido:" + regs[1] + " -  deve essere maggiore di  " + Annomin;
		       	 	document.getElementById("erData").innerHTML = errore;
		        		return false;
	        }else{
				document.getElementById("erData").innerHTML = "";
	           return true;
			}
		}
	}
}