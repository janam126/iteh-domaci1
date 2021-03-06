<?php

class Teniser {

    public $teniserID;
    public $imePrezime;
    public $datumRodjenja;
    public $drzavaPorekla;
    public $brojTitula;

    public function __construct($teniserID = null, $imePrezime = null, $datumRodjenja = null, $drzavaPorekla = null, $brojTitula = null) {
        $this->teniserID = $teniserID;
        $this->imePrezime = $imePrezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->drzavaPorekla = $drzavaPorekla;
        $this->brojTitula = $brojTitula;
    }

    public static function getAll(mysqli $conn) {
        $q = "SELECT * FROM teniser";
        return $conn->query($q);
    }

    public static function deleteById($teniserID, mysqli $conn) {
        $q = "DELETE FROM teniser WHERE teniserID = $teniserID";
        return $conn->query($q);
    }

    public static function add($imePrezime, $datumRodjenja, $drzavaPorekla, $brojTitula, mysqli $conn) { 
        $q = "INSERT INTO teniser(imePrezime, datumRodjenja, drzavaPorekla, brojTitula) values('$imePrezime','$datumRodjenja',
                '$drzavaPorekla', '$brojTitula')";
        return $conn->query($q);
    }

    public static function getById($teniserID, mysqli $conn)
    {
        $q = "SELECT * FROM teniser WHERE teniserID=$teniserID";
        $myArray = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public static function update($teniserID, $imePrezime, $datumRodjenja, $drzavaPorekla, $brojTitula, mysqli $conn)
    {
        $q = "UPDATE teniser set imePrezime='$imePrezime', datumRodjenja='$datumRodjenja', 
            drzavaPorekla='$drzavaPorekla', brojTitula='$brojTitula' where teniserID=$teniserID";
        return $conn->query($q);
    }


}

?>