<?php
require_once 'lib/PHPExcel.php';
include 'lib/PHPExcel/IOFactory.php';
require_once 'config.php';
require_once 'query.php';

try  {

    $h = $_GET['h'];
    $h2 = $h == 2 ? '1H2016' : '2H2016 (FC)';
    $disciplineName = $_GET['d']; //'Creative';
    $fileName = ROOT_DIR.'/templates/'.strtolower($disciplineName).'.xlsx'; 
    $reader = PHPExcel_IOFactory::createReader('Excel2007');
    $excel = $reader->load($fileName);
    $sheet = $excel->setActiveSheetIndexByName('Total');

    foreach ($db->query(Query::agency()) as $r) {
        $sheet->setCellValueByColumnAndRow($r['seq'], 1, $r['id']);
        $sheet->setCellValueByColumnAndRow($r['seq'], 2, $r['name']);
        $sheet->setCellValueByColumnAndRow($r['seq'], 61, $r['id']);
        $sheet->setCellValueByColumnAndRow($r['seq'], 62, $r['name']);
    }

    foreach ($db->query(Query::subDisciplineByDisciplineName(2, $disciplineName)) as $r) {
        $sheet = $excel->setActiveSheetIndexByName($r['name']);

        foreach ($db->query(Query::agency()) as $r1) {
            $sheet->setCellValueByColumnAndRow($r1['seq'], 1, $r1['id']);
            $sheet->setCellValueByColumnAndRow($r1['seq'], 2, $r1['name']);
            $sheet->setCellValueByColumnAndRow($r1['seq'], 61, $r1['id']);
            $sheet->setCellValueByColumnAndRow($r1['seq'], 62, $r1['name']);
        }

        foreach ($db->query(Query::subDisciplineData($h, $disciplineName, $r['name'])) as $r1) {
            $sheet->setCellValueByColumnAndRow($r1['col'], $r1['row'], $r1['percent']);
            $sheet->setCellValueByColumnAndRow($r1['col'], $r1['row2'], ($r1['value'] * $r1['percent']));
        }

        // foreach ($db->query(Query::disciplineData2($h, $disciplineName)) as $r1) {
        //     $sheet->setCellValueByColumnAndRow($r1['col'], $r1['row'], $r1['value']);
        // }
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
    header('Content-Disposition: attachment;filename="RAW '.$disciplineName.' '.$h2.'.xlsx"'); 
    header('Cache-Control: max-age=0'); 
    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007'); 
    $writer->save('php://output');
	exit();

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>



