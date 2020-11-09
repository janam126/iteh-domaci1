<?php

require "dbBroker.php";
require "model/teniser.php";

session_start();

//nesto oko logouta

$result = Teniser::getAll($conn);

if(!$result) {
    echo "Doslo je do greske<br>";
    die();
}
if($result->num_rows == 0) {
    echo "Nema tenisera";
    die();
}
else {

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="image/loptica.jpg"/>
        <title>Teniseri</title>
    </head>
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
        <div>
            <h1>Dobrodosli na sajt</h1>
        </div>
        <div class = "row">
            <div class="nesto" style="width: 35%; float: left; background-color:blue; padding-right:20px;">
                <h2>Pregled liste svih tenisera</h2>
                <button id = "btn" onclick = "prikazi()">Pregledaj</button>
            </div>
            <div class="nesto" style="width: 30%; float: left; background-color:blue; padding-right:20px;">
                <h2>Dodaj tenisera</h2>
                <button id = "btn-dodaj">Dodaj</button>
            </div>
            <div class="nesto" style="width: 30%; float: left; background-color:blue; padding-right:20px;">
                <h2>Pretrazi tenisere</h2>
                <button id = "btn-pretraga">Pretraga</button>
            </div>
        </div>
        <div id = "pregled">
        <table>
            <thead>
                <tr>
                    <th scope = "col">#</th>
                    <th scope = "col">Ime i prezime</th>
                    <th scope = "col">Datum rodjenja</th>
                    <th scope = "col">Drzava porekla</th>
                    <th scope = "col">Broj titula</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($red = $result->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $red["teniserID"] ?></td>
                        <td><?php echo $red["imePrezime"] ?></td>
                        <td><?php echo $red["datumRodjenja"] ?></td>
                        <td><?php echo $red["drzavaPorekla"] ?></td>
                        <td><?php echo $red["brojTitula"] ?></td>
                        <td>
                            <label class = "radio-btn">
                            <input type="radio" name = "checked" value = <?php echo $red["teniserID"] ?>>
                            <span class = "checkmark"></span>
                            </label>
                        </td>
                    </tr>
                <?php
                    }
}
                ?>
            </tbody>
        </table>
            <div class = "row">
                <div class = "nesto">
                    <button id = "btn-izmena">Izmena</button>
                   
                    <button id = "btn-izbrisi" >Izbrisi</button>
                </div>
            </div>
        </div>
        
       
        <script src = "js/main.js"></script>
      
    </body>
    </html>


