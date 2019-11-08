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
    <meta name="description" content="Daily Wine - Sei un utente e vuoi avere ottimi vantaggi? Cosa aspetti, registrati al nostro sito"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, iscrizione, sito, registrati, utente, vantaggi, accedi, account, diventa partner, partner, richiedi informazioni, informazioni"/>
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
                <h2>Sei un utente non ancora registrato?</h2>
                <form action="regute.php" method="post">   
                <div class="utente">
                    <label for="nome">Nome</label><br />
                    <input id="nome" type="text" name="ute_name" placeholder="inserisci nome"  tabindex="2"/><br />
                    <span class="errore" id="erNome"></span><br />
                    
                    <label for="cognome">Cognome</label><br />
                    <input id="cognome" type="text" name="ute_cog" placeholder="inserisci cognome"  tabindex="3"/><br />
                    <span class="errore" id="erCognome"></span><br />
                    
                    <label for="email">Indirizzo e-mail</label><br />
                    <input id="email" type="text" name="ute_mail" placeholder="inserisci e-mail"  tabindex="4"/><br />
                    <span class="errore" id="erEmail"></span><br />
                    
                    <label for="parolachiave">Parola Chiave (*) </label><br />
                    <p id="chiave">(*): parola chiave, alfanumerica da 4 a 12 caratteri, che va inserita per far fronte ad un eventuale recupero della password.</p>
                    <input id="parolachiave" type="text" name="chiave" placeholder="inserisci parola chiave"  tabindex="5"/><br />
                    <span class="errore" id="erChiave"></span><br />
                    
                    <label for="password">Password</label><br />
                    <input id="password" type="password" name="ute_pass" placeholder="inserisci password"  tabindex="6"/><br />
                    <span class="errore" id="erConfPas"></span><br />
                    
                    <label for="confermapassword">Conferma Password</label><br />
                    <input id="confermapassword" type="password" name="ute_conf" placeholder="reinserisci password" tabindex="7"/><br />
                    
                    <button class="login" name="reg" value="registrati" type="submit" onClick="return validazioneFormUtente()" tabindex="8">Registrati</button><br /><br />

                    <h5 class="nacc">Disponi già di un account <a href=" accedi.php" tabindex="9">Accedi &rsaquo;</a></h5><br /><br /><br />
                </div>
                </form>
                 <form action=" regcant.php">
                    <div class="accedi">
                        <h6>Diventa partner di Daily Wine?</h6>
                        <button class="acc" name="informazioni" value="richiedi informazioni" type="submit" tabindex="10">Richiedi Informazioni</button>
                    </div>
                </form>
        <?php
            }else
            {
                if(!$open)
    	           die("Connessione fallita");
                else
                {   
                    $nome = ucfirst($_POST['ute_name']);
                    $cognome = addslashes(ucfirst($_POST['ute_cog']));
                    $email = $_POST['ute_mail'];
                    $pass = $_POST['ute_pass'];
                    $passConf = $_POST['ute_conf'];
                    $parolachiave = $_POST['chiave'];

                   
                    $sql = "INSERT INTO utente (`Mail`,`Nome`,`Cognome`,`Password`,`Tipo`,`ParolaChiave`) VALUES ('".$email."','".$nome."','".$cognome."','".$pass."','Utente','".$parolachiave."')";
                        
                        $query = $db->getQuery($sql);

                        if($query)
                        {
                            echo "<h2>Registrato con successo</h2>";
                            echo "<form action=' accedi.php' method='post'>";
                            echo "<div>";
                            echo "<button class='login' name='accedi' value='accedi' type='submit' tabindex='2'>ACCEDI</button>";
                            echo "</div>";
                            echo"</form>";
                        }
                        else
                        {
                            echo "<h2>Sei già registrato</h2>";
                            echo "<form action=' accedi.php' method='post'>";
                            echo "<div>";
                            echo "<button class='login' name='accedi' value='accedi' type='submit' tabindex='2'>ACCEDI</button>";
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