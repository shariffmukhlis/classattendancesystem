<?php
require_once("dbconn.php");
include('teacher.php');
session_start();
$date = $_SESSION['DATE'];
include('dbconn.php');
$teacher = $_SESSION['TEACHER'];
$display_heading = array('STUDENT NAME', 'DATE', 'STATUS', 'REASON');
$sql= "SELECT STUDENT_NAME, DATE_FORMAT(DATE(DATE),'%d %M %Y') as DATE, IF(STATUS = 1, 'PRESENT', 'ABSENT') AS STATUS , REASON  FROM attendance a natural join student natural join class natural join teacher where date(date) = '".$date."' and  teacher_id = ".$teacher->id. "";
$result=$conn->query($sql);

$sql1= "SELECT  DATE_FORMAT(DATE(DATE),'%d %M %Y') as DATE, DATE_FORMAT(DATE(DATE),'%a') as DAY FROM attendance a natural join student natural join class natural join teacher where date(date) = '".$date."' and  teacher_id = ".$teacher->id. "";
$result1 =$conn->query($sql1);

if ($result1->num_rows > 0) {
    $rows = $result1->fetch_assoc();
    $date = $rows['DATE'];
    $day = $rows['DAY'];
}

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
//Image(string file [, float x [, float y [, 
//float w [, float h [, string type [, mixed link]]]]]])
$pdf->Image('images/logoMozac.png', 90,20,20,20,'PNG','http://www.mozac.edu.my');
$pdf->Ln(31);
$pdf->SetFont('Arial','B',16);		
//align cell to center of page and output text in bold in 16pt Arial font 
$pdf->Cell(56);
$pdf->Cell(30, 10, 'SMK MUDZAFFAR SHAH', 0, 2, 'c', false, 'http://www.mozac.edu.my');
//Cell(float w [, float h [, string txt [, mixed border 
//[, int ln [, string align [, boolean fill [, mixed link]]]]]]])

//$pdf->Cell(30, 30, 'SMK MUDZAFFAR SHAH', -30 ,-30, 'c', false, 'http://www.mozac.edu.my');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);		
$pdf->Cell(40, 10, 'Attendance List', 0, 2, 'c');
$info = "Date: ".$date. ", (".$day.")";
$pdf->Cell(40, 10, $info, 0, 2, 'c');
$header= array('STUDENT NAME', 'DATE', 'STATUS', 'REASON');
//Cell(float w [, float h [, string txt [, mixed border 
//[, int ln [, string align [, boolean fill [, mixed link]]]]]]])
foreach($header as $display_heading){
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(47, 6, $display_heading, 1, 0, 'C', true );
}
$count = 0;
$pdf->Ln();
$pdf->Cell(20);
$pdf->SetTextColor(0,0,0);
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
    $count++;
	foreach($row as $column)
        $pdf->Cell(47, 6, $column, 1, 0, 'C' );
}
$detail = "Total Student: ".$count;
$pdf->Ln();
$pdf->Cell(40, 10, $detail, 0, 2, 'c');
$pdf->Output();

?>