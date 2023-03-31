<?php
//om databasebewerkingen uit te voeren
class ReserveringModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }
    // genereert een SQL-query om reserveringen op te halen
    public function getReserveringen()
    {
        $sql = "SELECT  Reservering.Id
                       ,Persoon.Voornaam
                       ,Persoon.Tussenvoegsel
                       ,Persoon.Achternaam
                       ,Reservering.Datum
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
    // Maakt een SQL-query om het optiepakket uit de database te halen.
    public function getReserveringUpdate($id)
    {
        $this->db->query("  SELECT       Reservering.Id     
                                        ,PakketOptie.Naam
                                        ,Reservering.AantalKinderen
                                        
                            FROM        Persoon  
                            INNER JOIN  Reservering
                            ON          Persoon.Id = Reservering.PersoonId
                            INNER JOIN  PakketOptie
                            ON          PakketOptie.Id = Reservering.PakketOptieId
                            where       Reservering.Id = :Id;");
        $this->db->bind(':Id', $id, PDO::PARAM_INT);
        return $this->db->single();

        $result = $this->db->resultSet();

        return $result;
    }

    private function GetPakketOptieId($pakketOptieNaam)
    {
        // var_dump($pakketOptieNaam);
        //exit();
        $sql = ("SELECT Id FROM PakketOptie WHERE Naam = :naam");
        $this->db->query($sql);
        $this->db->bind(':naam', $pakketOptieNaam,  PDO::PARAM_STR);
        return $this->db->single();
    }



    public function ReserveringUpdate($post)
    {
        $pakketOptieNaam = $post['Naam'];
        $ReserveringId   = $post['Id'];

        $pakketOptieId = $this->GetPakketOptieId($pakketOptieNaam);

        // var_dump($pakketOptieId);
        // exit();

        // var_dump($pakketOptieId);
        // var_dump($ReserveringId);
        // exit();
        $sql = ("UPDATE 	Reservering
                  SET 		PakketOptieId = :rra
                  WHERE	    Id = :id");

        //$sql = ("UPDATE 	Reservering
        //SET 		PakketOptieId = 3
        //WHERE	    Id = 18");

        $this->db->query($sql);
        // $this->db->bind(':test', $pakketOptieId,  PDO::PARAM_INT);
        $this->db->bind(':id', $ReserveringId, PDO::PARAM_INT);
        $this->db->bind(':rra', $pakketOptieId->Id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}


    // public function ReserveringUpdate($_post)
    // {
    //     $sql = " UPDATE PakketOptie (Id,
    //                                 Naam
    //                                 )
    //             VALUES              (:Id
    //                                  :naam
    //                                 )";

    //     $this->db->query($sql);
    //     $this->db->bind(':Id', $_post['Id'], PDO::PARAM_INT);
    //     $this->db->bind(':naam', $_post['naam'], PDO::PARAM_STR);
    //     return $this->db->execute();
    // }