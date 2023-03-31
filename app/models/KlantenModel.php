<?php
class KlantenModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }
    // query's door kolommen te combineren
    public function getKlanten($date)
    {
        $sql = "SELECT Persoon.Voornaam, 
                       Persoon.Tussenvoegsel, 
                       Persoon.Achternaam, 
                       Contact.Mobile, 
                       Contact.Email, 
                       Persoon.IsVolwassen,
                       Persoon.DatumAangemaakt
                FROM Persoon 
                INNER JOIN Contact ON Persoon.Id = Contact.PersoonId ";

        if ($date) {
            $sql .= " AND DATE(Persoon.DatumAangemaakt) = '$date'";
        }

        $sql .= " ORDER BY Persoon.Achternaam ASC ";

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
}
