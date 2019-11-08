<?php
    //connessione database
    require_once 'PHP/DB_conessione.php';
    use DBAccess;      
    $db = new DBAccess();
    $open = $db->opendDBConnection();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
        <title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Daily Wine - Sei una Cantina vinicola? Cosa aspetti, registrati e avrai molti vantaggi"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, registrati, cantina, cantine, vantaggi, iscrizione, sito "/>
    <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel
    base: posizione di base per i collegamenti -->

    <!-- foglio di stile css -->
    <link href="CSS/stileaccreg.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
    <link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
    <link href="CSS/mobile_acc_reg.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
    <link href="CSS/tablet_acc_reg.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
    <link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>  
    
        <script type="text/javascript" src="../JS/convalidaForm.js"></script>
</head>

<body>
<div id="header">
        <a href=" index.php" tabindex="1"><img id="logo" src="IMAGE/logo.png" alt="calice di vino rosso"/></a>
</div>
<div id="text">
    <?php
        if(!isset($_POST['reg']))
        {
    ?>
    
    <h2>Sei una cantina vinicola non ancora registrata?</h2>
    <form action="regcant.php" method="post">   
        <div class="regcantina">
            
            <label for="nome">Il tuo Nome</label><br />
            <input id="nome" type="text" placeholder="inserisci nome" name="cant_nome" tabindex="2"/><br />
            <span class="errore" id="erNome"></span><br />

            <label for="cognome">Cognome</label><br />
            <input id="cognome" type="text" placeholder="inserisci cognome" name="cant_cnome" tabindex="3"/><br />
            <span class="errore" id="erCognome"></span><br />
            
            <label for="nomedellacantina">Nome della Cantina</label><br />
            <input id="nomedellacantina" type="text" placeholder="inserisci nome cantina" name="cant_cantina" tabindex="4"/><br />
            <span class="errore" id="erNomeCantina"></span><br />
            
            
       		<label for="email">Indirizzo e-mail</label><br />
            <input id="email" type="text" placeholder="inserisci e-mail" name="cant_email" tabindex="5"/><br />
            <span class="errore" id="erEmail"></span><br />

            
            
            <label for="telefono">Telefono</label><br />
            <input id="telefono" type="text" placeholder="inserisci numero telefono" name="cant_tel" tabindex="6"/><br />
            <span class="errore" id="erTel"></span><br />
                    
            
            <label for="indirizzo">Indirizzo</label><br />
            <input id="indirizzo" type="text" placeholder="inserisci indirizzo" name="cant_indirizzo" tabindex="7"/><br />
            <span class="errore" id="erInd"></span><br />
                    
            
            <label for="regione">Regione</label><br />
            <input id="regione" type="text" placeholder="inserisci regione" name="cant_regione"  tabindex="8"/><br />
            <span class="errore" id="erReg"></span><br />
                    
            
            <label for="provincia">Provincia</label><br />
            <input id="provincia" type="text" placeholder="inserisci provincia" name="cant_provincia" tabindex="9"/><br />
            <span class="errore" id="erProv"></span><br />
                    
            
            <label for="citta">Città</label><br />
            <input id="citta" type="text" placeholder="inserisci città" name="cant_citta" tabindex="10"/><br />
            <span class="errore" id="erCitta"></span><br />
            
            
            <label for="descrizione">Descrizione</label><br />
            <textarea id="descrizione" name="cant_descrizione" placeholder="inserisci descrizione" tabindex="11"  rows="17" cols="400"></textarea>
            <span class="errore" id="erDesc"></span><br />
            
            <label for="parolachiave">Parola Chiave</label><br />
            <p id="chiave">(*): parola chiave, alfanumerica da 4 a 12 caratteri, che va inserita per far fronte ad un eventuale recupero della password.</p>
            <input id="parolachiave" type="text" name="cant_chiave" placeholder="inserisci parola chiave" tabindex="12"/><br />
            <span class="errore" id="erChiave"></span><br />
            
            <label for="password">Password</label><br />
            <input id="password" type="password" placeholder="inserisci password" name="cant_passw" tabindex="13"/><br />
            <span class="errore" id="erConfPas"></span><br />
            
            <label for="confermapassword">Conferma Password</label><br />
            <input id="confermapassword" type="password" placeholder="conferma password" name="cant_cpassw" tabindex="14"/><br />
            
            <button class="login" name="reg" value="registrati" type="submit" onClick="return validazioneFormCantina()" tabindex="15">Registrati</button><br /><br /><br />
        </div>
    </form>
    <?php
        }
        else
        {
            if(!$open)
	           die("Connessione fallita");
            else
            {   
                $nome = ucfirst($_POST['cant_nome']);
                $cognome = addslashes(ucfirst($_POST['cant_cnome']));
                $nomeCant = addslashes(ucfirst($_POST['cant_cantina']));
                $email = $_POST['cant_email'];
                $telefono = $_POST['cant_tel'];
                $indirizzo = addslashes($_POST['cant_indirizzo']);
                $regione= addslashes(ucfirst($_POST['cant_regione']));
                $provincia= addslashes(ucfirst($_POST['cant_provincia']));
                $citta = addslashes(ucfirst($_POST['cant_citta']));
                $desc = addslashes($_POST['cant_descrizione']);
                $pass = $_POST['cant_passw'];
                $passConf = $_POST['cant_cpassw'];
                $parolachiave = $_POST['cant_chiave'];


                
                   $sql = "INSERT INTO utente (`Mail`,`Nome`,`Cognome`,`Password`,`Tipo`,`ParolaChiave`) VALUES ('".$email."','".$nome."','".$cognome."','".$pass."','Cantina','".$parolachiave."')";
                    
                    $query = $db->getQuery($sql);

                    if($query)
                    {
                        $sql = "INSERT INTO cantina (`Nome`,`Telefono`,`Indirizzo`,`Descrizione`,`Proprietario`,`Citta`,`Regione`,`Provincia`,`Voto_medio`) VALUES ('".$nomeCant."','".$telefono."','".$indirizzo."','".$desc."','".$email."','".$citta."','".$regione."','".$provincia."','0')";
                            
                        $query = $db->getQuery($sql);
                        if($query)
                        {
                            echo "<h2>E' andata a buon fine</h2>";
                            //indirazzare da qualche parte ( accedi.html )
                            echo "<form action=' accedi.php' method='post'>";
                            echo "<div>";
                            echo "<button class='login' name='accedi' value='accedi' type='submit' tabindex='16'>ACCEDI</button>";
                            echo "</div>";
                            echo"</form>";
                        }
                    }
                    else
                    {
                        //pagina che dice che ti sei già registrato e ti manda all'accedi dopo quache secondo
                        echo "<h2>Sei già registrato</h2>";
                        echo "<form action=' accedi.php' method='post'>";
                        echo "<div>";
                        echo "<button class='login' value='accedi' type='submit' tabindex='16'>ACCEDI</button>";
                        echo "</div>";
                        echo"</form>";
                    }
            }
        }
        $db->closedDBConnection();
    ?>
</div> 
<div id="fine">
	<img id="left" src="IMAGE/valid-xhtml10.png" alt="immagine validità w3c html"/>
	<img id="right" src="IMAGE/vcss-blue.gif" alt="immagine validità w3c css"/>
    <h6>DAILY WINE</h6>
    <p>Per contattarci inviate una mail a: </p>
    <p>info@dailywine.it. </p>
    <p><span xml:lang="en">Daily Wine - All rights reserved</span></p>
</div>
</body>
</html>