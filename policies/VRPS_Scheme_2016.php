<?php
$file = "VRPS_Scheme_2016.rtf";
$filename = "VRPS_Scheme_2016.rtf";
header('Content-type: Application/msword');
header('Content-Disposition: inline;filename="'.$filename.'"');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file);
?>
