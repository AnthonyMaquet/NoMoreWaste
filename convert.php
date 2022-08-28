<?php

require('dompdf2/autoload.inc.php');

$dompdf = new Dompdf(); //instancier la classe

$filename = 'test.php'; //on stock le fichier qu'on veut convertir dans une variable

$dompdf->load_html_file($filename);

$dompdf->render(); //on le converti en pdf

$dompdf->stream('document.pdf', array('Attachement'=>true)); //pour pouvoir le télécharger avec le navigateur

?>