<?php
session_start();
include "../bdd.php";
include "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=rattrapage','root','');

class myPDF extends FPDF{
    function header(){
        $this->Image('vrailogo.png',10,6);
        $this->SetFont('Arial', 'B',14);
        $this->Cell(276,5,'Recapitulatif des commandes',0,0,'C');
        $this->Ln();
        $this->SetFont('Times', '',12);
        $this->Cell(276,10,'A bientot !',0,0,'C');
        $this->Ln();
        $this->Cell(276,15,'Voici le recapitulatif des commandes qui ont ete passe par l\'association',0,0,'C');
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B',12);
        // $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(50,10,'Produit',1,0,'C');
        $this->Cell(150,10,'Description',1,0,'C');
        $this->Cell(20,10,'Quantite',1,0,'C');
        $this->Cell(50,10,'Date commande',1,0,'C');
        $this->Ln();
    }
    function viewTable($db ){
        $id =  ($_SESSION['id']);
        $this->SetFont('Times','',12);
     
        $stmt = $db->query("SELECT * FROM commande");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            // $this->Cell(20,10,$data->id,1,0,'C');
            $this->Cell(50,10,$data->nom_produit,1,0,'L');
            $this->Cell(150,10,$data->description,1,0,'L');
            $this->Cell(20,10,$data->quantite,1,0,'L');
            $this->Cell(50,10,$data->date_ajout,1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>