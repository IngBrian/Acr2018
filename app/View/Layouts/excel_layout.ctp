<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Pagos.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php echo $content_for_layout ?> 
