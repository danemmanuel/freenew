<?php
 define('MPDF_PATH', 'pdf/');
 include(MPDF_PATH.'fpdf.php');
 $mpdf=new fPDF();
 $mpdf->WriteHTML('Hello World');
 $mpdf->Output();
 exit();