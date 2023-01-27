<?php

class Instructeurs extends controller{
    
    private $instructeurModel;
    
    public function __construct()
    {
        $this->instructeurModel = $this->model('Voertuig');
    }

    public function index(){
        $records = $this->instructeurModel->getInstructeurs();

        $aantal = sizeof($records);

        $rows = '';
        foreach ($records as $value) {
            $rows .= "<tr>
                         <td>$value->VOORNAAM</td>
                         <td>$value->TUSSENVOEGSEL</td>
                         <td>$value->ACHTERNAAM</td>
                         <td>$value->MOBIEL</td>
                         <td>$value->DATUMINDIENST</td>
                         <td>$value->AANTALSTERREN</td>
                         <td><a href='" . URLROOT . "/instructeurs/voertuig/$value->Id'><img src='" . URLROOT . "/img/car-front-fill.svg' alt='voertuig'></a></td>
                      </tr>";
        }

        // Stuur de gegevens uit de model naar de view via het $data array
        $data = [
            'title' => "Instructeur in dienst",
            'rows' => $rows,
            'aantal' => $aantal
        ];
        $this->view('instructeurs/index', $data);
    }

    function voertuig($id)
    {
        $records = $this->instructeurModel->getVoertuig($id);
        $instructeur = $this->instructeurModel->getInstructeursbyId($id);

        $rows = '';
        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->TYPEVOERTUIG</td>
                        <td>$value->TYPE</td>
                        <td>$value->KENTEKEN</td>
                        <td>$value->BOUWJAAR</td>
                        <td>$value->BRANDSTOF</td>
                        <td>$value->RIJBEWIJS</td>
                      </tr>";
        }

        // Stuur de gegevens uit de model naar de view via het $data array
        $data = [
            'title' => "Door instructeur gebruikte voertuigen",
            'rows' => $rows,
            'voornaam' => $instructeur->VOORNAAM,
            'tussenvoegsel' => $instructeur->TUSSENVOEGSEL,
            'achternaam' => $instructeur->ACHTERNAAM,
            'datumindienst' => $instructeur->DATUMINDIENST,
            'sterren' => $instructeur->AANTALSTERREN
        ];
        $this->view('instructeurs/voertuig', $data);
    }
}
?>