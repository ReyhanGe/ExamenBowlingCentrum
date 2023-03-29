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

            $reserveringen = $this->reserveringModel->getReserveringen();

            $rows = '';
            foreach ($reserveringen as $value) {
                $rows .= "<tr>
                      <td>$value->Voornaam</td>
                      <td>$value->Tussenvoegsel</td>
                      <td>$value->Achternaam</td>
                      <td>$value->Datum</td>
                      <td>$value->AantalVolwassen</td>
                      <td>$value->AantalKinderen</td>
                      <td>$value->Naam</td>
                      <td><a href='" . URLROOT . "/reservering/topicslesson/$value->Id'><img src='\img\kalem.jpg' alt='klaem'></a></td>
                    </tr>";
            }

            $data = [
                'title' => 'Overzicht Reserveringen',
                'rows' => $rows
            ];
            $this->view('/reservering/index', $data);
        }


        function topicsLesson($Id)
        {
            $result = $this->reserveringModel->getTopicsLesson($Id);

            // var_dump($result);


            $rows = "";
            foreach ($result as $topic) {
                $rows .= "<tr>      
                            <td>$topic->Naam</td>
                          </tr>";
            }



            $data = [
                'title' => 'PakketOptieen Les',
                'rows'  => $rows,
                'Id' => $Id,

            ];
            $this->view('reservering/topicslesson', $data);

            $data = [
                'title' => 'PakketOptie Toevoegen',
                'Id' => $Id,
                'topicError' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // var_dump($_POST);
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $data = [
                    'title' => 'PakketOptie Toevoegen',
                    'Id' => $_POST['Id'],
                    'topic' => $_POST['topic'],
                    'topicError' => ''
                ];



                if (empty($data['topicError'])) {
                    $result = $this->reserveringModel->addTopic($_POST);

                    if ($result) {
                        $data['title'] = "<p>Het nieuwe PakketOptie is succesvol toegevoegd</p>";
                    } else {
                        echo "<p>Het nieuwe PakketOptie is niet toegevoegd</p>";
                    }
                    header('Refresh:3; url=' . URLROOT . '/reservering/index');
                } else {
                    header('Refresh:3; url=' . URLROOT . '/reservering/addTopic/' . $data['Id']);
                }
            }
            $this->view('reservering/addTopic', $data);

            $data = [
                'title' => 'PakketOptie Toevoegen',
                'Id' => $Id,
                'topicError' => ''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // var_dump($_POST);
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $data = [
                    'title' => 'PakketOptie Toevoegen',
                    'Id' => $_POST['Id'],
                    'topic' => $_POST['topic'],
                    'topicError' => ''
                ];



                if (empty($data['topicError'])) {

                    if (strpos(strtolower($_POST['topic']), 'vrijgezellenfeest') !== false) {

                        echo "Het optie vrijgezellenfeest is niet bedoelt voor kinderen.";
                    }

                    $result = $this->reserveringModel->addTopic($_POST);

                    if ($result) {
                        $data['title'] = "Het nieuwe PakketOptie is succesvol toegevoegd";
                    } else {
                        echo "Het nieuwe PakketOptie is niet toegevoegd";
                    }
                    header('Refresh:3; url=' . URLROOT . '/reservering/index');
                } else {

                    header('Refresh:3; url=' . URLROOT . '/reservering/addTopic/' . $data['Id']);
                }
            }
        }
    }
