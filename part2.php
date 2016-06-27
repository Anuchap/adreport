<?php
require_once 'lib/PHPExcel.php';
include 'lib/PHPExcel/IOFactory.php';
require_once 'config.php';
require_once 'query.php';

try  {

    $fileName = ROOT_DIR.'/templates/part2.xlsx'; 
    $reader = PHPExcel_IOFactory::createReader('Excel2007');
    $excel = $reader->load($fileName);

    for ($i=0; $i < 5; $i++) { 
        $sheet = $excel->setActiveSheetIndex($i);

        foreach ($db->query(Query::agency()) as $r) {
            $sheet->setCellValueByColumnAndRow(0, $r['seq'] + 1, $r['id']);
            $sheet->setCellValueByColumnAndRow(1, $r['seq'] + 1, $r['name']);
        }

        foreach ($db->query(Query::part2($i + 1)) as $r) {
            $sheet->setCellValueByColumnAndRow(2, $r['row'], $r['answer']);
            $sheet->setCellValueByColumnAndRow(3, $r['row'], $r['optional']);
        }
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
    header('Content-Disposition: attachment;filename="Part2.xlsx"'); 
    header('Cache-Control: max-age=0'); 
    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007'); 
    $writer->save('php://output');
	exit();

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>