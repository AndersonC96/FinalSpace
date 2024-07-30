<?php
    error_reporting(E_ERROR | E_PARSE);
    $api = "https://finalspaceapi.com/api/v0/character/";
    $readApi = file_get_contents($api);
    $jsonDecode = json_decode($readApi, true);
    $items_per_page = 12;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $total_items = count($jsonDecode);
    $total_pages = ceil($total_items / $items_per_page);
    $offset = ($current_page - 1) * $items_per_page;
    $current_items = array_slice($jsonDecode, $offset, $items_per_page);
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Final Space Characters</title>
        <link rel="icon" href="./IMG/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            body{
                font-family: 'Roboto', sans-serif;
                background-color: #1a1a1a;
                color: #ffffff;
            }
            .navbar{
                background-color: #333;
            }
            .card{
                background-color: #2b2b2b;
                border: none;
            }
            .card-title, .card-text{
                color: #ffffff;
            }
            .footer{
                background-color: #333;
                padding: 20px;
                text-align: center;
            }
            .logo-nav{
                width: 50px;
                height: auto;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./IMG/logo.png" alt="Logo" class="logo-nav">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="./index.php">Home</a>
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
                    if(is_array($jsonDecode)){
                        foreach ($current_items as $main){
                            $getImg = $main['img_url'];
                            $getalias = $main['alias'];
                            $getabilities = $main['abilities'];
                ?>
                <div class="col-md-4 d-flex">
                    <div class="card flex-fill mb-4">
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
                    }else{
                        echo '<p class="text-center">Não foi possível carregar os dados dos personagens.</p>';
                    }
                ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Anterior</a></li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <?php if ($current_page < $total_pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Próxima</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <div class="footer">
            <p>&copy; 2024 Final Space Repository. All Rights Reserved.</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>