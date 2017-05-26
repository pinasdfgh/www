<?php
// We'll be outputting a PDF
$pdf=fdf_create ();
header('Content-Type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

// The PDF source is in original.pdf
readfile($pdf);
?>