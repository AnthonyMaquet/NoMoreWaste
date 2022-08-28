<?php
class panier{

    public function __construct(){
        if(!isset($_SESSION)){
            session_start();    
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        //Supprimer élément panier
        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }
    }

    public function count(){ //savoir nombre d'élément dans le panier
        return array_sum($_SESSION['panier']); //potentiellement serialize $_session['panier'] dans la bdd ou jsonencode
    }

    public function add($produit_id){
        if(isset($_SESSION['panier'][$produit_id])){ //si ce produit est déjà dans le panier
            $_SESSION['panier'][$produit_id]++;
        }else{
            $_SESSION['panier'][$produit_id] = 1;

        }
    }

    public function del($produit_id){
        unset($_SESSION['panier'][$produit_id]);
    }

}