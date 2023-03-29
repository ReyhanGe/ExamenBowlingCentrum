<?php
class ReserveringModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getReserveringen()
    {
        $sql = "SELECT  Persoon.Id
                       ,Persoon.Voornaam
                       ,Persoon.Tussenvoegsel
                       ,Persoon.Achternaam
                       ,Reservering.Datum
                       ,Reservering.AantalVolwassen
                       ,Reservering.AantalVolwassen
                       ,Reservering.AantalKinderen
                       ,PakketOptie.Naam
                FROM       Persoon
                INNER JOIN Reservering
                ON         Persoon.Id = Reservering.PersoonId
                INNER JOIN PakketOptie
                ON         PakketOptie.Id = Reservering.PakketOptieId
                ORDER BY Reservering.Datum DESC";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getTopicsLesson($Id)
    {
        $this->db->query("SELECT  Persoon.Id        
                                 ,PakketOptie.Naam
                        FROM Persoon  
                        INNER JOIN Reservering
                ON         Persoon.Id = Reservering.PersoonId
                INNER JOIN PakketOptie
                ON         PakketOptie.Id = Reservering.PakketOptieId

                        ");


        $result = $this->db->resultSet();

        return $result;
    }

    public function addTopic($_post)
    {
        $sql = " INSERT INTO PakketOptie (Id,
                                        Naam
                                       )
                VALUES                 (:Id
                :naam
                                       )";

        $this->db->query($sql);
        $this->db->bind(':Id', $_post['Id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $_post['naam'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
