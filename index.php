<html>
    <head>
        <title>Final Space</title>
        <link rel="shortcut icon" href="./favicon.png"/>
        <link rel="stylesheet" href="style.css">
        <script src="main.js"></script>
        <link rel="shortcut icon" href="./finalspace.ico"/>
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
                        <li><a href="./characters.php">Personagens</a></li>
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
        <!--<div style="height: 100%"></div>-->
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
        <!--<div class="container-fluid">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="./characters.php">Personagens</a></li>
                        <li><a href="./episodes.php">Episódios</a></li>
                        <li><a href="./location.php">Localizações</a></li>
                        <li><a href="./quotes.php">Citações</a></li>
                    </ul>
                </div>
            </nav>
        </div>-->
    </body>
</html>