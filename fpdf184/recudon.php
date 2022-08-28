<?php
session_start();
include "../bdd.php";
include "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=rattrapage','root','');

class myPDF extends FPDF{
    function header(){
        $this->Image('vrailogo.png',10,6);
        $this->SetFont('Arial', 'B',14);
        $this->Cell(276,5,'Recu',0,0,'C');
        $this->Ln();
        $this->SetFont('Times', '',12);
        $this->Cell(276,10,'A bientot !',0,0,'C');
        $this->Ln();
        $this->Cell(276,15,'Voici votre recu pour votre don :',0,0,'C');
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
        $this->Cell(40,10,'Prenom',1,0,'C');
        $this->Cell(60,10,'Nom',1,0,'C');
        $this->Cell(60,10,'Email',1,0,'C');
        $this->Cell(80,10,'Montant de votre don en euros',1,0,'C');
        $this->Ln();
    }
    function viewTable($db ){
        $id =  ($_SESSION['id']);
        $this->SetFont('Times','',12);
     
        $stmt = $db->query("SELECT * FROM utilisateurs WHERE id =  $id");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            // $this->Cell(20,10,$data->id,1,0,'C');
            $this->Cell(40,10,$data->prenom,1,0,'L');
            $this->Cell(60,10,$data->nom,1,0,'L');
            $this->Cell(60,10,$data->email,1,0,'L');
            $this->Cell(80,10,$data->montantdon,1,0,'L');
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