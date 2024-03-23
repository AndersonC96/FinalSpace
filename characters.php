<?php
    error_reporting(E_ERROR | E_PARSE);
    $api = "https://finalspaceapi.com/api/v0/character/";
    $readApi = file_get_contents($api);
    $jsonDecode = json_decode($readApi , true);
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Final Space Characters</title>
        <link rel="icon" href="./IMG/logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./CSS/character.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <img src="./IMG/logo.png" alt="Logo" class="logo-nav">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="./characters.php">Personagens</a>
                        <a class="nav-item nav-link" href="./episodes.php">Episódios</a>
                        <a class="nav-item nav-link" href="./locations.php">Localizações</a>
                        <a class="nav-item nav-link" href="./quotes.php">Citações</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row">
                <?php
                    $getCount = count($jsonDecode);
                    for($i = 0; $i < $getCount; $i++){
                        $main = $jsonDecode[$i];
                        $getImg = $main['img_url'];
                        $getalias = $main['alias'];
                        $getabilities = $main['abilities'];
                ?>
                <div class="col-md-6 d-flex">
                    <div class="card flex-fill">
                        <img src="<?php echo $getImg; ?>" class="card-img-top" alt="<?php echo $main['name']; ?>" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $main['name']; ?></h4>
                            <p class="card-text"><strong>Status:</strong> <?php echo $main['status']; ?> | <strong>Espécie:</strong> <?php echo $main['species'] ?: 'Desconhecida'; ?> | <strong>Origem:</strong> <?php echo $main['origin']; ?> | <strong>Gênero:</strong> <?php echo $main['gender']; ?> | <strong>Cabelo:</strong> <?php echo $main['hair']; ?></p>
                            <p class="card-text"><strong>Apelido(s):</strong> <?php echo $getalias ? implode(", ", $getalias) : 'Desconhecido'; ?></p>
                            <p class="card-text"><strong>Habilidades:</strong> <?php echo $getabilities ? implode(", ", $getabilities) : 'Desconhecidas'; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>