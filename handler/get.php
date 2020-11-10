<?php

require "../dbBroker.php";
require "../model/teniser.php";

if(isset($_POST['teniserID'])) {
    $myArray = Teniser::getById($_POST['teniserID'], $conn);
    echo json_encode($myArray);
}

?>