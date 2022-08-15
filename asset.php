<?php

$oExcel = new PHPExcel();

// first row
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'id');
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'name');
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'email');

// second row 
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 2, 230);
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 2, 'John');
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 2, 'john@yahoo.com');

// third row 
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 3, 350);
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 3, 'Mark');
$oExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 3, 'mark@yahoo.com');

$objWriter = PHPExcel_IOFactory::createWriter($oExcel, 'Excel5');

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="export_'. date('Y-m-d').'.csv"');
header("Pragma: no-cache");
header("Expires: 0");

$objWriter->save('php://output');