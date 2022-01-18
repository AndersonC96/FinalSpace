<?php
    error_reporting(E_ERROR | E_PARSE);
    $api = "https://finalspaceapi.com/api/v0/character/";// api url
    $readApi = file_get_contents($api);// ler api
    $jsonDecode = json_decode($readApi , true);// decodificar json
    //var_dump ($readApi);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Final Space</title>
        <link rel="shortcut icon" href="./finalspace.ico"/>
        <link rel="stylesheet" href="style.css">
        <script src="main.js"></script>
    </head>
    <body>
        <nav class="nav">
            <div class="container">
                <div class="logo">
                    <a href="https://www.netflix.com/pt/title/80174479">Final Space</a>
                </div>
                <div id="mainListDiv" class="main_list">
                    <ul class="navlinks">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./mains.php">Personagens</a></li>
                        <li><a href="./episodes.php">Episódios</a></li>
                        <li><a href="./location.php">Localizações</a></li>
                        <li><a href="./quotes.php">Citações</a></li>
                    </ul>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
        </nav>
        <section class="home"></section>
        <table class="table table-striped table-dark">
            <tr style="color: #026635;">
                <th></th>
                <th>Nome</th>
                <th>Status</th>
                <th>Espécie</th>
                <th>Gênero</th>
                <th>Cabelo</th>
                <th>Apelido</th>
                <th>Origem</th>
                <th>Habilidades</th>
            </tr>
            <?php
                $getCount = count($jsonDecode);// contar quantos elementos tem no array
                $id = 0;
                for($i=0;$i<$getCount;$i++){
                    // loop para percorrer o array
                    $main = $jsonDecode[$i];// pegar o array
                    $getImg = $main['img_url'];// pegar a imagem
                    $getalias = count($main['alias']);// contar quantos elementos tem no array
                    $getabilities = count($main['abilities']);
                    $id++;// incrementar o id
            ?>
            <tr>
                <td><img src="<?php echo $getImg; ?>" style="width:120px;height:120px;border-radius:100%;"/></td>
                <td><?php echo $main['name']; ?></td>
                <td><?php echo $main['status']; ?></td>
                <td><?php
                        if($main['species'] == NULL){// Verifica se o atributo existe
                            echo "Espécie desconhecida";// Caso não exista, mostra a mensagem
                        }else{// Caso exista, mostra o atributo
                            echo $main['species'];
                        }
                    ?>
                </td>
                <td><?php echo $main['gender']; ?></td>
                <td><?php echo $main['hair']; ?></td>
                <td><?php
                        if($main['alias'] == NULL){// Verifica se o atributo existe
                            echo "Apelido desconhecido";// Caso não exista, mostra a mensagem
                        }else{// Caso exista, mostra o atributo
                            //echo $main['alias'][0];
                            for($a=0; $a<$getalias; $a++){
                                echo $main['alias'][$a].","."<br/>";
                            }
                        }
                    ?>
                </td>
                <td><?php echo $main['origin']; ?></td>
                <td><?php
                        if($main['abilities'] == NULL){// Verifica se o atributo existe
                            echo "Habilidades desconhecidas";// Caso não exista, mostra a mensagem
                        }else{// Caso exista, mostra o atributo
                            //echo $main['abilities'][0];
                            for($a=0; $a<$getabilities; $a++){
                                echo $main['abilities'][$a].","."<br/>";
                            }
                        }
                    ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            $(window).scroll(function(){
                if($(document).scrollTop() > 50){
                    $('.nav').addClass('affix');
                    console.log("OK");
                }else{
                    $('.nav').removeClass('affix');
                }
            });
        </script>
    </body>
</html>