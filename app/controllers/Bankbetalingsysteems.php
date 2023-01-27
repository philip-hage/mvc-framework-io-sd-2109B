<?php

    class Bankbetalingsysteems extends controller{

        private $bankbetalingsysteemModel;

        public function __construct()
        {
            $this->bankbetalingsysteemModel = $this->model('Bankbetalingsysteem');
        }

        public function index(){
            
            $records = $this->bankbetalingsysteemModel->getBankbetalingsysteems();

            $rows = ''; 
            foreach ($records as $value) {                
                $rows .= "<tr>
                            <td>$value->voornaam $value->achternaam</td>
                            <td>$value->straatnaam $value->huisnummer</td>
                            <td>$value->email</td>
                            <td>$value->rekeningnummer</td>
                            <td>$value->rekeningtype</td>
                            <td>$value->transactiecode</td>
                            <td>$value->transactietype</td>
                            <td>$value->transactiedatum</td>
                            <td>$value->bedrag</td>
                            <td>$value->saldorekening</td>
                            <td><a href=''>Wijzigen</a></td>
                            <td><a href=''>Verwijderen</a></td>
                         </tr>";
            } 
            $data = [
                'title' => "Overzicht Bank-Betaling-Systeem",
                'rows' => $rows
            ];
            $this->view('bankbetalingsysteems/index', $data);
        }
    }

?>