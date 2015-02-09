
<?php
/*
 * https://developers.google.com/analytics/devguides/reporting/core/v3/reference
 * https://developers.google.com/analytics/devguides/reporting/core/dimsmets
 * https://github.com/google/google-api-php-client
 * https://console.developers.google.com
 * http://devstan.com/2014/01/30/google_analytics_php/
 * https://developers.google.com/analytics/solutions/articles/hello-analytics-api
 * http://www.google.com/analytics/
 * 
 * http://localhost/monitoreo/index.php?r=site/page&view=analytics
 * 
*/

if(Yii::app()->user->isGuest){
    Yii::app()->user->loginRequired();
}

/////
require_once(Yii::app()->baseUrl . '/themes/blackboot/vendor/tcpdf/tcpdf_include.php');
/////

ini_set('max_execution_time', 1200); // 1200 seconds = 20 minutes

////****PDF****////

function print_report_pdf_snap($op) {

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Secretaría Nacional de la Administración Pública');
    $pdf->SetTitle('TCPDF Example 006');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetPrintHeader(false);
    //$pdf->SetPrintFooter(false);
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
    }
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->AddPage();

    $html = '<h1>Reporte de Monitoreo Web</h1>';
    $pdf->writeHTML($html, true, false, true, false, '');
    //$pdf->lastPage();
    //$pdf->SetFillColor(255,255,0);
    //$html = <<<EOF
    //EOF;
    //$pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Reporte_de_monitoreo', 'I');

}