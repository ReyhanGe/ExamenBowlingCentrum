<?php

class Klanten extends Controller
{ // Properties, field
    private $klantenModel;
    // Dit is de constructor
    public function __construct()
    {
        $this->klantenModel = $this->model('KlantenModel');
    }

    public function index()
    {
        $klanten = $this->klantenModel->getKlanten();


        $rows = '';
        foreach ($klanten as $value) {

            $rows .= "<tr>
           
                      <td>$value->Voornaam</td>
                      <td>$value->Tussenvoegsel</td>
                      <td>$value->Achternaam</td>
                      <td>$value->Mobile</td>
                      <td>$value->Email</td>
                      <td>$value->IsVolwassen</td>
                    </tr>";
        }

        if ($klanten) {
            $d = new DateTimeImmutable($klanten[0]->DatumAangemaakt, new DateTimeZone('Europe/Amsterdam'));
            $date = $d->format('d-m-Y');
            $time = $d->format('H:i');
        } else {
            $date = '';
            $time = '';
        }

        $data = [
            'title' => 'Overzicht klanten',
            'rows' => $rows,
            'date' => $date,
            'time' => $time

        ];

        $this->view('/klanten/index', $data);
    }
}
