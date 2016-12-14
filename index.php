<?php include_once "Database.php";
?>
<html>
<head>
    <title>Pannier POO/BDD</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<nav>
    <div class="nav-wrapper">
        <p class="center">PannierPOO/BDD</p>
    </div>
</nav>
<form action="Database.php" method="post">
    <div class="file-field input-field">
        <div class="btn">
            <span>Fichier json</span>
            <input type="file" multiple>
        </div>
        <div class="file-path-wrapper">
            <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
            <input class="file-path validate" type="text" name="fichierTelecharger" placeholder="Upload one or more files">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>

<div class="container">
    <div class="s6 offset-s3 center"><h1>Liste des produit</h1>
<?php
    $insertion = new Database('localhost','panierpoosql','root', 'M+D=cdna4');
    $value = $insertion->PDO()->query('SELECT * FROM produits');
    while($data = $value->fetch()){
?>

        <div class="col s12 m3">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?=$data['nom'];?></span>
                    <p><?="Couleur: ".$data['couleur']?></p>
                    <p><?="Taille: ".$data['taille']?></p>
                    <p><?=$data['prix'].'€'?></p>
                </div>
            </div>



    <?php } ?>
    </div>
</div>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript">
        $(".button-collapse").sideNav();
        $(".carousel.carousel-slider").carousel({full_width: true});
    </script>

</body>
</html>