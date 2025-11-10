<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">

         <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Allura&family=Oswald:wght@200..700&family=Questrial&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="imgs/favicon.png"> <!--FAVICON SETUP-->
        <title>MusicHub - Homepage</title>
    </head>
    <body>
        <header id="main-header">
            <h1 id="main-header-title" class="hover-pointer-opacity" onclick="location.href='index.php'">MusicHub</h1>
            <menu id="header-menu">
                <b onclick="location.href='index.php'" class="hover-pointer-opacity" >Home</b>
                <b class="hover-pointer-opacity">Articoli</b>
                <b class="hover-pointer-opacity">Contatti</b>
            </menu>
        </header>
        <main id="main-main">
            <p id="main-title">Music is what feelings <ins>sound like.</ins></p>
            <p id="main-subtitle">Discover them now.</p>
            <?php

                $file = json_decode(file_get_contents("albums.json"), true);
                
                echo("<div id='album-wrapper'>");
                foreach($file as $name=>$content){

                    if(strlen($name) > 30){
                        $name = substr($name, 0, 30);
                    }
                    $link = $content["Link"];
                    $artist = $content["Artist"];
                    $descr = $content["Descr"];

                    echo("  <div class='album-items hover-pointer-scale' onclick='location.href='albums/AM.html''>
                        <div class='album-imgs'>
                            <img src='$link' alt='$name' class='album-img-backgrounds'>
                        </div>
                        <p class='album-title'>$name</p>
                        <p class='album-artist'>$artist</p>
                        <p class='album-descr'>$descr</p>");
                        foreach($content["Rating"] as $thing=>$value){
                            echo("<p class='album-rating'>$thing: ");
                            for($i = 0; $i < 5; $i++){
                                if($i < $value){
                                    echo("<snap class='rating-icon'>⏺︎</snap>");
                                } else {
                                    echo("<snap class='rating-icon gray'>⏺︎</snap>");
                                }
                            }
                            echo("</p>");
                        }
                    echo "</div>";
                }

                echo("</div>");

            ?>
        </main>
        <footer id="main-footer">
            <p id="main-copyright"><a href='https://www.carafagiustiniani.edu.it/' target="_blank">IIS Carafa Giustiniani</a> 2025-2026, &copy All rights reserved.</p>
            <p id="signature" class="hover-pointer" onclick="window.open('https://www.github.com/SebsIII', '_blank')">By Sebs_</p>
        </footer>
    </body>
</html>