<?php
$file1 = "VRPS_Application_Format.docx";
$filename1 = "VRPS_Application_Format.docx";
header('Content-type: Application/msword');
header('Content-Disposition: inline;filename="'.$filename1.'"');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file1);
?>
