<?php
$file1 = "VSRPS_Scheme_2016.doc";
$filename1 = "VSRPS_Scheme_2016.doc";
header('Content-type: Application/msword');
header('Content-Disposition: inline;filename="'.$filename1.'"');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file1);
?>
