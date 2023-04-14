<?php
require_once 'src/class/App.php';

$App = new App();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYTATY Z BOMBY</title>
    <link rel="icon" href="https://kurvix.banankox.pl/images/kurvinox1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        h1{
            color: darkred;
            font-weight: 700;
        }
        h2{
            font-style: italic;
            font-weight: 400;
        }
        .menu{
            display: flex;
        }
        .menu p{
            margin: 5px;
        }
        .cytat_bomba{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <a href="?home">
        <img src="https://www.kapitanbomba.pl/wp-content/uploads/2022/04/logo-kapitan-bomba-lite.svg" alt="Bomba" width="200px">
    </a>

    <hr>
    <div class="menu">
        <a href="?action=home"><p>Twój cytat dnia </p></a> <p>★</p>
        <a href="?action=list"><p>Lista</p></a> <p>★</p>
        <!-- <a href="?action=add__form"><p>Dodaj</p></a> <p>★</p> -->
        <a href="database/base.db"><p>Pobierz bazę</p></a>

    </div>
    <hr>
    <?php
        $App->Controller();
    ?>
    <footer>
        <center>
            <p>Liczba cytatów w bazie: <?php echo $App->count_cytaty(); ?></p>
        </center>
    </footer>

</body>
</html>