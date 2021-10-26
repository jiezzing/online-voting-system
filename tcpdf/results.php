<?php
ob_start();
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
include '../database/connection.php';
include '../model/select_queries.php';

$con = new connection();
$db = $con->connect();

$select = new Select($db);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Online Voting Result');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
// $pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// draw jpeg image
$pdf->SetAlpha(0.3);
$pdf->SetAlpha(1);
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$query = $select->getPositionsInPoll($_GET['poll_no']);
$ctr = 0;
while($result = $query->fetch(PDO::FETCH_ASSOC)){
    $content .= '
    <tr class="text-align">
        <th colspan="3" class="position-title">'.$result['pos_name'].'</th>
    </tr>
    <tr>
        <th style="width: 40%">Name</th>
        <th style="width: 40%">Department</th>
        <th style="width: 20%">Total Votes</th>
    </tr>';
    $representatives = $select->getRepresentativesInPoll($_GET['poll_no'], $result['pos_id']);
    while($poll = $representatives->fetch(PDO::FETCH_ASSOC)){
        if ($poll['user_department'] == null) {
            $content .= '
            <tr>
                <td>'.$poll['user_fullname'].'</td>
                <td>---</td>
                <td>'.$poll['total_votes'].'</td>
            </tr>';
        } else {
            $content .= '
            <tr>
                <td>'.$poll['user_fullname'].'</td>
                <td>'.$poll['user_department'].'</td>
                <td>'.$poll['total_votes'].'</td>
            </tr>';
        }
        $ctr = 0;
    }

    $content .= '<br/>';
}

$tbl = '
<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        text-decoration: underline;
    }
    h5 {
        padding-top: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        padding: 5px 5px 5px 5px;
    }

    th {
        font-size: 10pt;
        font-style: italic;
    }
      
    td {
        text-align: left;
        border: 1px solid black;
        font-size: 10pt;
    }

    .text-align {
        text-align: center;
    }

    .position-title {
        font-size: 10pt;
        font-style: normal !important;
        text-decoration: underline;
        font-weight: bold;
    }
</style>
<h1 class="text-align">Online Voting Results</h1>
<h3 class="text-align">POLL # '.$_GET['poll_no'].'</h3>
<table>'.$content.'</table>
';


$pdf->writeHTML($tbl, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('POLL-' . $_GET['poll_no']. '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+