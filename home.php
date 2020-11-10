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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                <button id = "btn-dodaj" data-toggle = "modal" data-target = "#myModal">Dodaj</button>
            </div>
            <div class="nesto" style="width: 30%; float: left; background-color:blue; padding-right:20px;">
                <h2>Pretrazi tenisere</h2>
                <input type = "text" id = "myInput" placeholder = "Pretrazi tenisere" onkeyup = "pretrazi()">
            </div>
        </div>
        <div id = "pregled">
        <table id = "tabela">
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
                    <button id = "btnIzmeni" data-toggle = "modal" data-target = "#izmeniModal">Izmena</button>
                    <button id = "btn-izbrisi">Izbrisi</button>
                </div>
            </div>
        </div>

    <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">

        <!--Sadrzaj modala-->
        <div class="modal-content" style="border: 5px solid blue;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container teniser-form">
                    <form action="#" method="post" id="dodajForm">
                        <h3 style="color: black">Dodavanje tenisera</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" style="border: 1px solid black" name="imePrezime" class="form-control"
                                           placeholder="Ime i prezime *" value="<?php echo $red["teniserID"] ?>"/>
                                </div>
                                <div class="form-group">
                                    <input type = "date" style="border: 1px solid black" name="datumRodjenja" class="form-control" placeholder="Datum rodjenja *"
                                           value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" style="border: 1px solid black" name="drzavaPorekla" class="form-control"
                                           placeholder="Drzava porekla *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="number" style="border: 1px solid black" name="brojTitula" class="form-control"
                                           placeholder="Broj titula *" value=""/>
                                </div>
                                <div class="form-group">
                                    <button id="btnDodaj" type="submit" class="btn btn-success btn-block"
                                            style="background-color: blue; border: 1px solid black;"><i
                                                class="glyphicon glyphicon-plus"></i> Dodaj tenisera
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="color: white; background-color: blue; border: 1px solid white" data-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="izmeniModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal sadrzaj-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container teniser-form">
                    <form action="#" method="post" id="izmeniForm">
                        <h3 style="color: black">Izmena tenisera</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="teniserid" type="text" name="teniserID" class="form-control"
                                           placeholder="ID tenisera *" value="" readonly/>
                                </div>
                                <div class="form-group">
                                    <input id="imePr" type="text" name="imePrezime" class="form-control"
                                           placeholder="Ime i prezime *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input id="datRodj" type="date" name="datumRodjenja" class="form-control"
                                           placeholder="Datum rodjenja *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input id="drzava" type="text" name="drzavaPorekla" class="form-control"
                                           placeholder="Drzava porekla *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input id="brTitula" type="number" name="brojTitula" class="form-control"
                                           placeholder="Broj titula *" value=""/>
                                </div>
                                <div class="form-group">
                                    <button id="btnIzmeni" type="submit" class="btn btn-success btn-block"
                                            style="color: white; background-color: blue; border: 1px solid white"><i
                                                class="glyphicon glyphicon-pencil"></i> Izmeni tenisera
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>
        
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src = "js/main.js"></script>

    <script>
        function pretrazi() {
            var input, filter, table, tr, i, td1, td2, td3, td4, txtValue1, txtValue2, txtValue3, txtValue4;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabela");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                td4 = tr[i].getElementsByTagName("td")[4];

                if (td1 || td2 || td3 || td4) {
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;

                    if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1
                        || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
      
    </body>
    </html>


