<?php

class Klanten extends Controller
{
    private $klantenModel;
    public function __construct()
    {
        $this->klantenModel = $this->model('KlantenModel');
    }

    public function index()
    {
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            $records = $this->klantenModel->getKlanten($date);
        } else {
            $records = $this->klantenModel->getKlanten(date('2023-03-29'));
        }

        if (sizeof($records) == 0) {
            $rows = "<tr style= 'text-align: center; font-size: 35px; color: red;'><td>Er is geen uitslag beschikbaar voor deze geselecteerde datum</td></tr>";
        } else {
            $rows = '';
            foreach ($records as $value) {
                $rows .= "<tr>
                   <td>$value->Voornaam</td>
                   <td>$value->Tussenvoegsel</td>
                   <td>$value->Achternaam</td>           
                   <td>$value->Mobile</td>
                      <td>$value->Email</td>
                      <td>$value->IsVolwassen</td>
                   <td>$value->DatumAangemaakt</td>
                </tr>";
            }
        }

        $data = [
            'title' => "Overzicht Klanten",
            'rows' => $rows
        ];
        $this->view('klanten/index', $data);
    }
}
