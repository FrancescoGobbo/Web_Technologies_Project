<?php
    session_start();
    require_once 'PHP/DB_conessione.php';
    use DBAccess;
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Cantina")
    {
              
        $db = new DBAccess();
        $open = $db->opendDBConnection();
?>
    <!DOCTYPE html PUBLIC "- // W3C //DTD XHTML 1.0 Strict // IT" "Http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
        <title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Daily Wine - Crea ora un nuovo Evento presso la tua Cantina vinicola e fallo conoscere a tutti"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, evento, new evento, cantina, eventi, inserisci, crea, descrizione, pannello cantina, scheda "/>
    <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel
    base: posizione di base per i collegamenti -->

    <!-- foglio di stile css -->
    <link href="CSS/stilenewevento.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
    <link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
    <link href="CSS/mobile_acc_reg.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
    <link href="CSS/tablet_acc_reg.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
    <link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>
            
            <script type="text/javascript" src="../JS/convalidaNewEvento.js"></script>
    </head>

    <body>
    <div id="header">
    <a href="eliminaeventocant.php" tabindex="1"><img id="logo" src="IMAGE/tornaindietro.png" alt="torna indietro"/></a>
        </div>
    <div id="text">
        <?php
        	if(!isset($_POST['conferma']))
            {
        ?>
        <h2>Inserisci un nuovo Evento</h2>
        <form action="newevento.php" method="post">
            <div class="Dati">
                <div class="dati1">
                    <label for="nomeevento">Nome</label>
                    <input type="text" id="nomeevento" name="nome" placeholder="inserisci nome evento" tabindex="2"/><br />
                    <span class="errore" id="erNome"></span><br />
                
                    <label for="linkevento">Link</label>
                    <input type="link" id="linkevento" name="link" placeholder="inserisci link evento" tabindex="4"/><br />
                    <span class="errore" id="erLink"></span><br />
                </div>
                
                <div class="dati2">
                    <label for="dataevento">Data</label>
                    <input type="text" id="dataevento" name="edata" placeholder="aaaa-mm-gg" tabindex="3"/><br />
                    <span class="errore" id="erData"></span><br />
                </div>
                
            </div>
            <div class="Desc">
                <label for="descrizioneevento">Descrizione Evento:</label><br />
                <textarea name="descrizione" id="descrizioneevento" placeholder="inserisci descrizione:" rows="8" cols="400" tabindex="5"></textarea><br />
                <span class="errore" id="erDesc"></span><br />
            </div>
            <div class="Conferma">
                <button name="conferma" class="conferma" type="submit" tabindex="5" value="conferma" onClick="return validazioneFormEvento()">Conferma</button><br /><br />
            </div>
        </form>
        <?php
            }
            else
            {
                $nome = ucfirst($_POST['nome']);
                $link = $_POST['link'];
                $data = $_POST['edata'];
                $desc = $db->escape($_POST['descrizione']);
                
                $nomeCant = $db->getNomeCantina($_SESSION['email']);
                
                $sql = "INSERT INTO eventi(ID,Nome_evento,Data,Link,DescrizioneEvento,Cantina) VALUES (NULL,'".$nome."','".$data."','".$link."','".$desc."','".$nomeCant."')";
                
                $query = $db->getQuery($sql);
                if($query)
                    echo "<h2>Evento inserito con successo</h2>";
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
    <?php
        }
    else
    {
        echo "<span class ='errore'><p>Accesso vietato , non sei una Cantina</p></span>";
        header("refresh:3;url=index.php");
    }
    ?>
</body>
</html>
