/*JAVASCRIPT PER ATTIVARE E DISATTIVARE LE MODIFICHE*/
function attivaDisDati(){
    document.getElementById('regione').removeAttribute("disabled");//input regione
    document.getElementById('provincia').removeAttribute("disabled");// input provincia
    document.getElementById('citta').removeAttribute("disabled");//input citta
    document.getElementById('telefono').removeAttribute("disabled");//input telefono
    document.getElementById('indirizzo').removeAttribute("disabled");//input indirizzo
    document.getElementById('descrizione').removeAttribute("disabled");
    document.getElementById('dat').setAttribute("disabled","true");//disattiva il bottone modifica
	
	document.getElementById('f_dat').disabled=false;//attiva il bottone col nome: fatto

}
