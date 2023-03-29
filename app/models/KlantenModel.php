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

    public function getKlanten()
    {
        $sql = "SELECT Persoon.Voornaam, 
                       Persoon.Id, 
                       Persoon.DatumAangemaakt, 
                       Persoon.Tussenvoegsel, 
                       Persoon.Achternaam, 
                       Contact.Mobile, 
                       Contact.Email, 
                       Persoon.IsVolwassen
                FROM Persoon 
                INNER JOIN Contact ON Persoon.Id = Contact.PersoonId
                ORDER BY Persoon.Achternaam ASC;";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
}
