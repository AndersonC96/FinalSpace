<?php
    error_reporting(E_ERROR | E_PARSE);
    $api = "https://finalspaceapi.com/api/v0/quote/";
    $readApi = file_get_contents($api);
    $jsonDecode = json_decode($readApi , true);
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Final Space Quotes</title>
        <link rel="icon" href="./IMG/logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/character.css">
        <script src="main.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(35, 28, 116);">
            <div class="container">
                <img src="./IMG/logo.png" alt="Logo" class="logo-nav">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="./index.php">Home</a>
                        <a class="nav-item nav-link" href="./characters.php">Personagens</a>
                        <a class="nav-item nav-link" href="./episodes.php">Episódios</a>
                        <a class="nav-item nav-link" href="./location.php">Localizações</a>
                        <a class="nav-item nav-link" href="./quotes.php">Citações</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row">
                <?php
                    foreach($jsonDecode as $quote){
                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                        echo '<div class="card h-100">';
                        echo '<img src="' . $quote['image'] . '" class="card-img-top" alt="Character" style="height: 200px; object-fit: cover;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text">' . '"' . $quote['quote'] . '"' . ' - ' . '<b>' . $quote['by'] . '</b>' . '</p>';
                        echo '</div>'; // Close card-body
                        echo '</div>'; // Close card
                        echo '</div>'; // Close col-lg-4 col-md-6
                    }
                ?>
            </div> <!-- Close row -->
        </div> <!-- Close container -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>