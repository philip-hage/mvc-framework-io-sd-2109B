<?php

    Class Bankbetalingsysteem{

        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getBankbetalingsysteems(){
            $this->db->query("SELECT 
                                Voornaam as voornaam,
                                Achternaam as achternaam,
                                Email as email,
                                Straatnaam as straatnaam,
                                Huisnummer as huisnummer,
                                Rekeningnummer as rekeningnummer,
                                RekeningType as rekeningtype,
                                TransactieCode as transactiecode, 
                                TransactieType as transactietype,
                                TransactieDatum as transactiedatum,
                                Bedrag as bedrag,
                                Saldorekening as saldorekening
                              FROM 
                                  persoon
                              INNER JOIN 
                                  contact
                              ON 
                                  persoon.id = contact.PersoonId
                            
                              INNER JOIN 
                                  rekening
                              ON 
                                  persoon.id = rekening.PersoonId
                                
                              INNER JOIN
                                  transactie
                              ON 
                                  rekening.id = transactie.RekeningId
                            
                              INNER JOIN 
                                  betaling
                              ON 
                                  transactie.BetalingId = betaling.id
                              INNER JOIN
                                  adress
                              ON 
                                  persoon.id = adress.persoonid         
                            ");

        $result = $this->db->resultSet();
        return $result;
        }
    }

?>