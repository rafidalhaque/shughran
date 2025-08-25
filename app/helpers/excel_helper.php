<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('create_excel')) {
    function create_excel($excel, $filename) {
        header("Content-Type: ".get_mime_by_extension('xlsx')." charset=utf-8");
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

         
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}




// if(! function_exists('create_excel')) {

// function create_excel($excel, $filename)
//     {

//         ob_start(); // Ensure output buffering

//         header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
//         header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
//         header('Cache-Control: max-age=0');

//         // Ensure no output has been sent
//         ob_end_clean();

//         try {
//             $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
//             $objWriter->save('php://output');
//         } catch (Exception $e) {
//             // Log or display errors for debugging
//             echo 'Error creating Excel file: ' . $e->getMessage();
//         }
//         exit;
//     }
// }