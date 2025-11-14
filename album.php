<?php 

if(!isset($_GET["ID"])){
    echo "no,album name provided.";
    exit;
}

$album_id = $_GET["ID"];
$albums = json_decode(file_get_contents("albums.json"), true);

if(!key_exists($album_id, $albums)){
    echo "The selected album does not exist!";
    exit;
}

$sel_album = $albums[$album_id];
?>

<DOCTYPE html>
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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="imgs/favicon.png"> <!--FAVICON SETUP-->
        <?php
        $album_name = $sel_album["Name"];
        echo("<title>MusicHub - $album_name</title>");
        ?>
    </head>
    <body id="ap-body">
        <header id="ap-header">
            <h1 id="main-header-title" class="hover-pointer-opacity" onclick="location.href='index.php'">MusicHub</h1>
            <menu id="header-menu">
                <b onclick="location.href='index.php'" class="hover-pointer-opacity" >Home</b>
                <b class="hover-pointer-opacity">Articoli</b>
                <b class="hover-pointer-opacity">Contatti</b>
            </menu>
        </header>
        <?php
            $bg_img_link = $sel_album["BgImgLink"];
            echo"<section id='ap-img-bg' style=\"background:url($bg_img_link);background-repeat: no-repeat;background-size: cover;background-position:center;\">"
        ?>
        </section>
        <?php
        $album_img = $sel_album["Link"];
        $album_name = $sel_album["Name"];
        $album_artist = $sel_album["Artist"];
        $album_long_descr = $sel_album["LongDescr"];
        $album_date = $sel_album["Date"];
        $spotify_hl = $sel_album["SpotifyHyperLink"];

        echo    "<main id='ap-main'>
                    <img class='hover-pointer-scale' src='$album_img' id='ap-album-img-preview'>
                    <section id='ap-album-test-wrapper'>
                        <p id='ap-main-date'>$album_date</p>
                        <h1 id='ap-main-title'>$album_name</h1>
                        <P id='ap-main-artist'>$album_artist</P>
                        <p id='ap-main-descr'>$album_long_descr</p>
                        <p id='ap-main-ratings'>Ratings</p>";
                        foreach($sel_album["Rating"] as $thing=>$value){
                            echo("<p class='album-rating'>$thing: ");
                            for($i = 0; $i < 5; $i++){
                                if($i < $value){
                                    echo("<snap class='rating-icon'>⏺︎</snap>");
                                } else {
                                    echo("<snap class='rating-icon gray'>⏺︎</snap>");
                                }
                            }
                            echo("</p>");
                        };
        echo"           <button class='ap-main-listen-btn hover-pointer-scale' onclick=\"window.open('$spotify_hl', '_Blank')\">
                            <p>Listen on  </p>
                            <img class='ap-main-listen-img' src='https://storage.googleapis.com/pr-newsroom-wp/1/2023/05/Spotify_Full_Logo_RGB_White.png'>    
                        </button>
                    </section>    
                </main>";
        ?>
    </body>
</html>

