<?php
    session_start();
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
<meta name="description" content="Daily Wine - Se ti sei dimenticato la Password per accedere, recuperala qui"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, password dimenticata, password, accedi, email, recupero password, recupero"/>
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
    
    <h2>Password dimenticata?</h2>
    <?php
    	if(!isset($_POST['recupero']))
        {
    ?>
    <form action="" method="post">   
        <div class="container2">
            <label for="email">Indirizzo e-mail</label>
            <input id="email" type="text" placeholder="inserisci e-mail" name="email" tabindex="2"/>
            <span class="errore" id="erEmail"></span><br />
            
            <label for="parolachiave">Parola Chiave</label>
            <input id="parolachiave" type="text" placeholder="inserisci parola chiave" name="parolachiave" tabindex="3"/>
            <span class="errore" id="erChiave"></span><br />
            
            <button class="login" value="invia" name="recupero" tabindex="4" type="submit" onClick="return validazioneFromRecupero()">Invia</button>
        </div>
    </form>
    <?php 
          }
          else
          {
              $email = $_POST['email'];
              $parolachiave = $_POST['parolachiave'];
            if(!$open)
	   			die("Connessione fallita"); 
            else
            {
                $sql = "SELECT * FROM utente WHERE Mail = '". $email."' AND ParolaChiave = '".$parolachiave."'";
                $query = $db->getQuery($sql);
                if ($query && $db->numRows($query)==1) 
                {
                    $_SESSION['email'] = $email;
                    header("Location: recuperopassw.php");
                }else{
                ?>
                    <form action="" method="post">
                    <div class="container2">
                        <span class="errore" id="passwordemail">Email o Parola chiave non valide</span>
                        <label for="email">Indirizzo e-mail</label>
                        <input id="email" type="text" placeholder="inserisci e-mail" name="email" tabindex="2"/>
                        <span class="errore" id="erEmail"></span><br />
            
                        <label for="parolachiave">Parola Chiave</label>
                        <input id="parolachiave" type="text" placeholder="inserisci parola chiave" name="parolachiave" tabindex="3"/>
                        <span class="errore" id="erChiave"></span><br />
            
                        <button class="login" value="invia" name="recupero" tabindex="4" type="submit" onClick="return validazioneFromRecupero()">Invia</button>
                    </div>
                    </form>
                <?php
                    }
            }
            $db->closedDBConnection();
        }
    ?>
</div>
<div id="fine">
	<img id="left" src="IMAGE/valid-xhtml10.png" alt="immagine validità w3c html"/>
	<img id="right" src="IMAGE/vcss-blue.gif" alt="immagine validità w3c css"/>
    <h6>DAILY WINE</h6>
    <p>Per contattarci inviate una mail a:</p>
    <p>info@dailywine.it. </p>
    <p><span xml:lang="en">Daily Wine - All rights reserved</span></p>
</div>
</body>
</html>
