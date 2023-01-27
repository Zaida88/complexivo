<?php


class ProyectModel
{

    private $db;
    private $proyect;

    public function __construct()
    {
        $this->db = Connect::connection();
        $this->proyect = array();

    }

    public function getProyect()
    {
        $sql = "SELECT * FROM proyect";
        $result = $this->db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $this->proyect[] = $row;
        }
        return $this->proyect;
    }
}

?>