<?php
    error_reporting(E_ERROR | E_PARSE);
    $api = "https://finalspaceapi.com/api/v0/quote/";
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
        <title>Final Space Quotes</title>
        <link rel="icon" href="./IMG/logo.png" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/character.css">
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
            .card-body{
                background-color: #2b2b2b;
            }
            .card img{
                height: 300px;
                object-fit: cover;
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
                        <a class="nav-item nav-link" href="./location.php">Localizações</a>
                        <a class="nav-item nav-link" href="./quotes.php">Citações</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row">
                <?php
                    foreach($current_items as $quote){
                        echo '<div class="col-md-4 d-flex align-items-stretch">';
                        echo '<div class="card mb-4 shadow-sm">';
                        echo '<img src="' . $quote['image'] . '" class="card-img-top" alt="Character Image">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text">"' . $quote['quote'] . '" - <b>' . $quote['by'] . '</b></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
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