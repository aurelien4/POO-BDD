<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14/12/2016
 * Time: 10:39
 */
include_once "ChargeurJson.php";

class Database
{
    private $host, $db , $user, $password;
    public function __construct(String $host, String $db, String $user, String $pass)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $pass;
    }

    public function PDO():PDO{
        $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8', $this->user, $this->password);
        return $pdo;
    }
    public function importJson($file)
    {
        for ($i = 0; $i < count($file); $i++) {
            if(isset($file[$i]->nom) && isset($file[$i]->couleur) && isset($file[$i]->taille) && isset($file[$i]->prix)){
                $nom = $file[$i]->nom;
                $couleur= $file[$i]->couleur;
                $taille= $file[$i]->taille;
                $prix= $file[$i]->prix;

                echo $nom." ".$couleur." ".$taille." ".$prix;

                $insertion = $this->PDO()->prepare('INSERT INTO produits(nom, couleur, taille, prix) VALUES (:nom, :couleur, :taille, :prix)');
                $insertion->execute(array(
                    'nom'=>$nom,
                    'couleur'=>$couleur,
                    'taille'=>$taille,
                    'prix'=>$prix
                ));
            }
        }
    }
}
if(isset($_POST['fichierTelecharger'])){

    $chargementJson = new ChargeurJson();
    $objetProduit = $chargementJson->jsonDecode($_POST['fichierTelecharger']);
    var_dump($objetProduit);

    $database = new Database('localhost','panierpoosql','root', 'M+D=cdna4');
    $database->importJson($objetProduit);

}