<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14/12/2016
 * Time: 10:55
 */
include_once "Produit.php";
class ChargeurJson
{
    public $file;
    public function jsonDecode($fichierJson): array{
        $json = file_get_contents($fichierJson);
        $jsonDecoder = json_decode($json);
        $produits = array_map(function($p){
            $produit = new Produit($p);
            $produit->id= $p->id;
            $produit->nom= $p->nom;
            $produit->couleur= $p->couleur;
            $produit->taille= $p->taille;
            $produit->prix= $p->prixHc;
            return $produit;
        },$jsonDecoder->Produits);
        return $produits;
    }

}