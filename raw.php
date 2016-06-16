<?php
require_once 'lib/PHPExcel.php';
include 'lib/PHPExcel/IOFactory.php';
require_once 'db.php';
require_once 'query.php';

$h = 2;
$fileName = 'templates/raw.xlsx'; 
$reader = PHPExcel_IOFactory::createReader('Excel2007');
$excel = $reader->load($fileName); 
$sheet = $excel->setActiveSheetIndex(0);

foreach ($db->query(Query::agency()) as $r) {
    $sheet->setCellValueByColumnAndRow($r['seq'], 1, $r['id']);
    $sheet->setCellValueByColumnAndRow($r['seq'], 2, $r['name']);
}

foreach ($db->query(Query::disciplineConfig()) as $r) {
    $sheet = $excel->setActiveSheetIndexByName($r['name']);

    foreach ($db->query(Query::agency()) as $r1) {
        $sheet->setCellValueByColumnAndRow($r1['seq'], 1, $r1['id']);
        $sheet->setCellValueByColumnAndRow($r1['seq'], 2, $r1['name']);
    }

    foreach ($db->query(Query::disciplineData($h, $r['name'])) as $r1) {
        $sheet->setCellValueByColumnAndRow($r1['col'], $r1['row'], $r1['value']);
    }
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header('Content-Disposition: attachment;filename="RAW Disciplines Data by 56 Cat 1H2016.xlsx"'); 
header('Cache-Control: max-age=0'); 
$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007'); 
$writer->save('php://output');
?>