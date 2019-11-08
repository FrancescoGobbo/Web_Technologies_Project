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
    
    <h2>Cambia la tua vecchia Password</h2>
    <?php
    	if(!isset($_POST['modpassw']))
        {
    ?>
    <form action="" method="post">   
        <div class="container2">
            <label for="newpassword">Nuova Password</label>
            <input id="newpassword" type="text" placeholder="inserisci nuova password" name="newpassw" tabindex="2"/>
            <span class="errore" id="erConfPas"></span><br />
            
            <label for="confermanewpasswrod">Conferma nuova password</label>
            <input id="confermanewpassword" type="text" placeholder="conferma nuova password" name="confnew" tabindex="3"/>
            
            <button class="login" value="modifica" name="modpassw" tabindex="4" type="submit" onClick="return validazioneFromCambioPassword()">Modifica</button>
        </div>
    </form>
    <?php
        }
        else
        {
            $passNuova = $_POST['newpassw'];
            $confPass = $_POST['confnew'];
            if($passNuova == $confPass)
            {
                $sql = "UPDATE `utente` SET Password='".$passNuova."' WHERE Mail = '".$_SESSION['email']."'";
                $query = $db->getQuery($sql);
                if($query)
                {
                    echo "<h6> Password modificata con successo </h6>";
                ?>
                    <form action="accedi.php">
                        <div class="regista2">
                            <h4>Ora ti sei ricordato la password?</h4>
                            <button class="reg" name="accedi" value="accedi" tabindex="7" type="submit">Accedi</button>
                        </div>
                    </form>
                <?php
                }
            }
            else
            {
            ?>
                <form action="" method="post">   
                    <div class="container2">
                        <span class="errore" id="recupero">Password non coincidenti</span>
                        <label for="newpassword">Nuova Password</label>
                        <input id="newpassword" type="text" placeholder="inserisci nuova password" name="newpassw" tabindex="2"/>
                        <span class="errore" id="erConfPas"></span><br />
                        
                        <label for="confermanewpasswrod">Conferma nuova password</label>
                        <input id="confermanewpassword" type="text" placeholder="conferma nuova password" name="confnew" tabindex="3"/>
                        
                        <button class="login" value="modifica" name="modpassw" tabindex="4" type="submit" onClick="return validazioneFromCambioPassword()">Modifica</button>
                    </div>
                </form>
            <?php
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
