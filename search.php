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
        <title>MusicHub - Search</title>
    </head>
    <body class="standard-body">
        <header id="main-header">
            <h1 id="main-header-title" class="hover-pointer-opacity" onclick="location.href='index.php'">MusicHub</h1>
            <menu id="header-menu">
                <b onclick="location.href='index.php'" class="hover-pointer-opacity" >Home</b>
                <b class="hover-pointer-opacity" onclick="location.href='search.php'">Cerca</b>
                <b class="hover-pointer-opacity" onclick="location.href='contacts.html'">Contatti</b>
            </menu>
        </header>
        <main id="main-main">
            <section id="main-wrapper">
                <h1>Search</h1>
                <form action="" method="get">
                    <input type="text" name="s" id="search-input" placeholder="Arctic Monkeys, AM, ...">
                </form>
            </section>
            <?php
                if(isset($_GET["s"])){
                    $albums = json_decode(file_get_contents("albums.json"), true);
                    $itemToSearch = $_GET["s"];

                    foreach($albums as $id=>$value){
                        foreach($value as $data=>$thing){
                            if($itemToSearch == $thing){
                                echo $id . "<br>"; 
                            }
                        }
                    };
                }
            
            ?>
        </main>
        <script src="script.js"></script>
    </body>
</html>