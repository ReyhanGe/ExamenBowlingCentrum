  <?php

    class Reservering extends Controller
    { // Properties, field
        private $reserveringModel;
        // Dit is de constructor
        public function __construct()
        {
            $this->reserveringModel = $this->model('ReserveringModel');
        }

        public function index()
        {

            $records = $this->reserveringModel->getReserveringen();
            if (sizeof($records) == 0) {
                $rows = "<tr style= 'text-align: center; font-size: 35px; color: red;'><td>Niemand </td></tr>";
            } else {
                $rows = '';
                foreach ($records as $value) {
                    $rows .= "<tr>
                      <td>$value->Voornaam</td>
                      <td>$value->Tussenvoegsel</td>
                      <td>$value->Achternaam</td>
                      <td>$value->Datum</td>
                      <td>$value->AantalVolwassen</td>
                      <td>$value->AantalKinderen</td>
                      <td>$value->Naam</td>
                      <td><a href='" . URLROOT . "/reservering/update/$value->Id'><img src='\img\kalem.jpg' alt='klaem'></a></td>
                    </tr>";
                }
            }

            $data = ['title' => 'Overzicht Reserveringen', 'rows' => $rows];
            $this->view('/reservering/index', $data);
        }


        public function update($id = null)
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // var_dump("Ik ben bıj post update");
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // var_dump($_POST);
                // exit();
                // Check if Naam is Vrijgezellenfeest and if AantalKinderen is groot 0
                if ($_POST['Naam'] ==  'Vrijgezellenfeest' && $_POST['AantalKinderen'] > 0) {
                    echo "Het optiepakket vrijgezellenfeest is niet bedoelt voor kinderen";
                    header("Refresh:2; url=" . URLROOT . "/reservering/index");
                    return;
                }

                $this->reserveringModel->ReserveringUpdate($_POST);

                echo "Het optiepakket is gewijzigd";
                header("Refresh:2; url=" . URLROOT . "/reservering/index");
            } else {
                //var_dump("Ik ben bıj get update");
                $row = $this->reserveringModel->getReserveringUpdate($id);
                $data = ['title' => 'Detail Optiepakket', 'row' => $row];
                $this->view('reservering/update', $data);
            }
        }
    }
