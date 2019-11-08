<?php
    require_once 'PHP/DB_conessione.php';
    use DBAccess;      
    $db = new DBAccess();
    $open = $db->opendDBConnection();
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
        <title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Daily Wine - Accedi anche tu al nostro sito"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, accedi, registrati, cantine, amministratore, login, password dimenticata, e-mail"/>
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
    
    <h2>Accedi</h2>
    <?php
    	if(!isset($_POST['login']))
        {
    ?>
            <form action="accedi.php" method="post">   
                <div class="container">
                    <label for="email">Indirizzo e-mail</label>
                    <input id="email" type="text" placeholder="inserisci e-mail" name="email"  tabindex="2"/>
                    <span class="errore" id="erEmail"></span><br />
                    
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="inserisci password" name="password" tabindex="3"/>
                    <span class="errore" id="erPassw"></span><br />

                    <span class="psw"><a href=" passw.php" tabindex="4">Password dimenticata?</a></span>

                    <button class="login" name="login" value="login" type="submit" tabindex="5" onClick="return validazioneFromAccedi()">Login</button><br/><br/>
                </div>
            </form>
    <?php 
        }
        else
        {
            if(!$open)
	           die("Connessione fallita"); //popup di avviso
            else
            {
                $mail = $_POST['email'];
                $pass = $_POST['password'];
        
                $sql = "SELECT * FROM utente WHERE  Mail='".$mail."' AND Password = BINARY '".$pass."'";
        
                $query = $db->getQuery($sql);
                $row = $db->getArray($query);
                
                if($db->numRows($query)== 1)
                {
                    $tipo = $db->getTipo($mail);
                    $_SESSION['email'] = $mail;
                    $_SESSION['nome'] = $row["Nome"];
                    if($tipo == 'Amministratore')//AMMINISTRATORE
                    {
                        $_SESSION['tipo'] =  'Amministratore';
                        header('Location:  panAdmin.php');
                    }
                    
                    if($tipo == 'Cantina')//CANTINA
                    {
                        $_SESSION['tipo'] =  'Cantina';
                        header('Location:  panCantina.php');
                        
                    }
                    
                    if($tipo == 'Utente') //UTENTE
                    {
                        $_SESSION['tipo'] =  'Utente';
                        header('Location:  index.php');
                    }
                }
                else
                {
                    $sql = "SELECT * FROM utente WHERE Mail='".$mail."'";
                    $query = $db->getQuery($sql);
                    if($db->numRows($query)==1 || $db->numRows($query)==0)
                    {
        ?>
                        <form action="accedi.php" method="post">   
                            <div class="container">
                                
                                <p class="errore">Password o E-mail sbagliata</p>
                                <label for="email">Indirizzo e-mail</label>
                                <input id="email" type="email" placeholder="inserisci e-mail" name="email" tabindex="2"/>
                                <span class="errore" id="erEmail"></span><br />

                                <label for="password">Password</label>
                                <input id="password" type="password" placeholder="inserisci password" name="password" tabindex="3"/>
                                <span class="errore" id="erPassw"></span><br />

                                <span class="psw"><a href=" passw.php" tabindex="4">Password dimenticata?</a></span>

                                <button class="login" name="login" value="login" tabindex="5" type="submit" onClick="return validazioneFromAccedi()">Login</button><br/><br/><br/>
                            </div>
                        </form>
        <?php
                    }
                }
            
        }
    }
?>
        <form action=" regute.php">
            <div class="regista">
               <h4>Non sei ancora registrato?</h4>
               <button class="reg" name="registrati" value="registrati" type="submit" tabindex="6">Registrati</button>
            </div>
        </form>
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
