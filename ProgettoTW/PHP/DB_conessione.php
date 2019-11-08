<?php
	class DBAccess{
		
        var $host_db = '127.0.0.1';
        var $username = 'pgtecweb';
		var $password = '';
		var $database_name = 'my_pgtecweb';
        public $connessione;
        var $result;
        var $sql;
		
		public function opendDBConnection()
		{
			$this->connessione = mysqli_connect($this->host_db,$this->username,$this->password,$this->database_name);
			
		      if($this->connessione == false){
                  return false;
              }
			 else 
             {
                 return true;
             }
		}
        
        public function closedDBConnection()
        {
        	return ($this->connessione->close);
        }
        

        public function getQuery($sql) {
            $this->result= $this->connessione->query($sql);
            return $this->result;
	   }
        
        public function numRows($query) {
		  return(mysqli_num_rows($query)); //Numero delle righe che ha la tabella.
	   }

        public function getTipo($mail)
        {
            $sql = "SELECT Tipo FROM utente WHERE Mail='".$mail."'";
            $risultato = mysqli_query($this->connessione,$sql);
            
            $row = mysqli_fetch_assoc($risultato);
            
            return $row["Tipo"]; //ritorna il tipo di che utente è;
        }
        
        public function getArray($query)
        {
            return mysqli_fetch_assoc($query);
        }
        
        public function getNomeCantina($email)
        {
            $sql = "SELECT Nome FROM cantina WHERE Proprietario='".$email."'";
            $query = $this->connessione->query($sql);
            
            if($query)
            {
                $cant = mysqli_fetch_assoc($query); 
                return $cant['Nome'];
            }

        }

        public function getRecensioni($nomeCantina)
        {
            $sql = "SELECT IDR, Voto, r.Descrizione as descr, Val_generale, u.Nome as Utente
                        FROM utente u,cantina c,recensione r 
                        WHERE c.Nome = r.Nome_cant AND u.Mail = r.Nome_ute AND r.Nome_cant = '".$nomeCantina."'";
                
                $query = $this->connessione->query($sql);

                return $query;
        }
        public function getDatiCantina($nome)
        {
            $sql = "SELECT *
                    FROM cantina 
                    WHERE Nome = '".$nome."'";

            $query = $this->connessione->query($sql);

            return mysqli_fetch_assoc($query); 
        }

        public function getRicerca($regione,$provincia)
        {
            
            if($provincia == "")
                    $sql =" SELECT c.Nome as Nome, c.Provincia as Provincia, c.Citta as Citta, c.Voto_medio as Voto 
                            FROM cantina c 
                            WHERE c.Regione = '".$regione."'";
            else
                $sql =" SELECT c.Nome as Nome, c.Provincia as Provincia, c.Citta as Citta, c.Voto_medio as Voto 
                        FROM cantina c 
                        WHERE c.Regione = '".$regione."' AND c.Provincia= '".$provincia."'";

            $query = $this->connessione->query($sql);
            return $query; 
        }

        
        public function getRicercaEvento($nomeRegione,$nomeProvincia)
        {
            if($nomeProvincia == "")
                $sql = " SELECT Nome_evento AS Nome , Data , Cantina, Link, DescrizioneEvento
                        FROM eventi e , cantina c
                        WHERE e.Cantina = c.Nome AND c.Regione = '".$nomeRegione."' ";
            else
                 $sql = " SELECT Nome_evento AS Nome , Data , Cantina, Link, DescrizioneEvento
                        FROM eventi e , cantina c
                        WHERE e.Cantina = c.Nome AND c.Regione = '".$nomeRegione."' AND c.Provincia= '".$nomeProvincia."'";

            $query = $this->connessione->query($sql);
            
            return $query; 
        }

        /*public function getDatiEvento($nome)
        {
            $sql = "SELECT ID , Nome_evento, Data, Link, Cantina, Provincia, DescrizioneEvento
                    FROM eventi e , cantina c
                    WHERE e.Cantina = c.Nome AND c.Nome = '".$nome."'";

            $query = $this->connessione->query($sql);

            return mysqli_fetch_assoc($query);

        }*/

        public function escape($string)
        {
            return $this->connessione->real_escape_string($string);
        }
        public function getErrore()
        {
            return  mysqli_error($this->connessione);
        }
        
        
    }

?>


    
    