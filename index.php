<?php
require "dbBroker.php";
require "model/user.php";

session_start();

if(isset($_POST['username'])&& isset($_POST['password'])){
    $name = $_POST['username'];
    $password = $_POST['password'];

    $rs = User::logIn($name, $password, $conn);
    
    if($rs->num_rows==1){
        echo "Uspesno ste se prijavili";
        $_SESSION['id'] = $rs->fetch_assoc()['id'];//....
        header('Location: home.php');
        exit();
    } else{
        //promeni 
        echo '<script type="text/javascript">alert("Pogresni podaci za login");
                window.location.href = "http://localhost/PhpAjaxMySQL/";</script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet--->
    <link rel="icon" href="image/loptica.jpg"/>
    <title>Teniseri</title>
</head>
<body>
    <div class="login">
        <div class="main-div">
        <form method="POST" action="#">
            <h1>TENISERI</h1>
            <div class="imgcontainer">
                <img src="image/loptica.jpg" alt="" class="slikaForme">
            </div>
            <div class = "container">
                <input type="username" placeholder="Username" name="username" class="form-control" required>
                <input type="password" placeholder="Password" name="password" class="form-control" required>
                <button type="sumbit" class="btn" name="Prijavi se!"></button>
            </div>
        </form>
    </div>
</body>
</html>