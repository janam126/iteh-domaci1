<?php

require "../dbBroker.php";
require "../model/teniser.php";

if(isset($_POST['teniserID'])) {
    $status = Teniser::deleteById($_POST['teniserID'], $conn);
    if($status) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}

?>