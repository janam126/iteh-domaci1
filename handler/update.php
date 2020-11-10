<?php

require "../dbBroker.php";
require "../model/teniser.php";

if (isset($_POST['teniserID']) && isset($_POST['imePrezime']) && isset($_POST['datumRodjenja'])
    && isset($_POST['drzavaPorekla']) && isset($_POST['brojTitula'])) {

    $status = Teniser::update($_POST['teniserID'], $_POST['imePrezime'], $_POST['datumRodjenja'], 
    $_POST['drzavaPorekla'], $_POST['brojTitula'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo 'Failed';
    }
}

?>