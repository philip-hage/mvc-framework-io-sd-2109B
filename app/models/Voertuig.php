<?php

Class Voertuig{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getInstructeurs(){
        // echo "binnen";exit();
        $this->db->query("SELECT 
                                 Voornaam as VOORNAAM,
                                 Achternaam as ACHTERNAAM,
                                 Tussenvoegsel as TUSSENVOEGSEL,
                                 Mobiel as MOBIEL,
                                 DatumInDienst as DATUMINDIENST,
                                 AantalSterren as AANTALSTERREN,
                                 Id
                         FROM 
                                 instructeur");

        $result = $this->db->resultSet();
        return $result;
    }

    public function getInstructeursbyId($id){
        $this->db->query("SELECT 
                                 Voornaam as VOORNAAM,
                                 Tussenvoegsel as TUSSENVOEGSEL,
                                 Achternaam as ACHTERNAAM,
                                 Mobiel as MOBIEL,
                                 DatumInDienst as DATUMINDIENST,
                                 AantalSterren as AANTALSTERREN,
                                 Id
                         FROM 
                                 instructeur
                                 where   Instructeur.Id = :id; ");
                                 $this->db->bind(':id', $id);

        $result = $this->db->single();
        return $result;
    }

    public function getVoertuig($id){
        $this->db->query("SELECT TypeVoertuig.TypeVoertuig as TYPEVOERTUIG
                                ,Voertuig.Type as `TYPE`
                                ,Voertuig.Kenteken as KENTEKEN
                                ,Voertuig.Bouwjaar as BOUWJAAR
                                ,Voertuig.Brandstof as BRANDSTOF
                                ,TypeVoertuig.Rijbewijscategorie as RIJBEWIJS
                        FROM    VoertuigInstructeur
                        INNER JOIN Voertuig
                        on      Voertuig.id = VoertuigInstructeur.VoertuigId
                        INNER JOIN TypeVoertuig
                        on      TypeVoertuig.id = Voertuig.TypeVoertuigId
                        INNER JOIN Instructeur
                        on      Instructeur.Id = VoertuigInstructeur.InstructeurId
                        where   Instructeur.Id = :id; ");
        $this->db->bind(':id', $id);

        $result = $this->db->resultSet();
        return $result;
    }

}