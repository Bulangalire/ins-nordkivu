<?php
include("../libs/db_connected.php");

if(isset($_POST['avenue_id'])){
    if($_POST['avenue_id'] !=''){

    $queryAdult="SELECT Sum(Adulte18a64M) as  Adulte18a64M, Sum(Adulte18a64F) as Adulte18a64F, Sum(Adultes65a75ansM) as Adultes65a75ansM , Sum(Adultes65a75ansF) as Adultes65a75ansF,  Sum(Viellards75etplusM) as Viellards75etplusM,  Sum(Viellards75etplusF) as Viellards75etplusF  From recensementvulnerable WHERE avenue=". $_POST['avenue_id'];
	$resultAdult = mysqli_query($con, $queryAdult);
    $output ="";
    $output .='<table>';
    $output .='<thead>';
    $output .='    <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
    $output .='        <th style="text-align:center;">Adultes 18 à 64 ans M</th>';
    $output .='        <th style="text-align:center;">Adultes 18 à 64 ans F</th>';
    $output .='        <th style="text-align:center;">Total 18 à 64 ans </th>';

    $output .='        <th style="text-align:center;">Adultes 65 à 75 ans M</th>';
    $output .='        <th style="text-align:center;">Adultes 65 à 75 ans F</th>';
    $output .='        <th style="text-align:center;">Total 65 à 75 ans </th>';

    $output .='        <th style="text-align:center;">Viellards de plus de 75 ans M</th>';
    $output .='        <th style="text-align:center;">Viellards de plus de 75 an F</th>';
    $output .='        <th style="text-align:center;">Total plus de 75</th>';
    $output .='        <th style="text-align:center;">Total</th>';
    $output .='    </tr>';
    $output .='</thead>';
    $output .='<tbody>';

    $total=0;
	while($row= mysqli_fetch_array($resultAdult)){
		$total=  $total+ ($row['Adulte18a64M'] +  $row['Adulte18a64F'] +$row['Adultes65a75ansM'] +  $row['Adultes65a75ansF'] + $row['Viellards75etplusM']  + $row['Viellards75etplusF']);

		$output .=' <tr  class="table-primary"> ';
		$output .= '<td style="text-align:center;">'. $row['Adulte18a64M']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Adulte18a64F']. '</td>';

		$output .= '<td style="text-align:center;  color:green;">'.( $row['Adulte18a64M'] + $row['Adulte18a64F']). '</td>';

		$output .= '<td style="text-align:center;">'. $row['Adultes65a75ansM']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Adultes65a75ansF']. '</td>';

		$output .= '<td style="text-align:center;  color:green;">'. ($row['Adultes65a75ansM'] + $row['Adultes65a75ansF']). '</td>';


		$output .= '<td style="text-align:center;">'. $row['Viellards75etplusM']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Viellards75etplusF']. '</td>';

		$output .= '<td style="text-align:center;  color:green;">'. ($row['Viellards75etplusM'] + $row['Viellards75etplusF']). '</td>';
		

		$output .= '<td style="text-align:center; color:red;">'.  $total. '</td>';
		$output .='</tr>';
	   
		if( $total>0){
		$output .=' <tr  class="table-primary"> ';
		$output .= '<td style="text-align:center;">'. number_format(( $row['Adulte18a64M']*100)/$total,2,',', ' ').' % ' . '</td>';
		$output .= '<td style="text-align:center;">'.  number_format(( $row['Adulte18a64F']*100)/$total,2,',', ' ').' % '. ' </td>';

		$output .= '<td style="text-align:center; color:green;">'. number_format(( ($row['Adulte18a64M'] + $row['Adulte18a64F'])*100)/$total,2,',', ' ').' % ' . '</td>';
		
		$output .= '<td style="text-align:center;">'. number_format(( $row['Adultes65a75ansM']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'.   number_format(($row['Adultes65a75ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
		
		$output .= '<td style="text-align:center; color:green;">'. number_format(( ($row['Adultes65a75ansM'] + $row['Adultes65a75ansF'])*100)/$total,2,',', ' ').' % ' . '</td>';
		
		$output .= '<td style="text-align:center;">'.  number_format(($row['Viellards75etplusM']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'.  number_format(($row['Viellards75etplusF']*100)/$total,2,',', ' ').' % '. ' </td>';
		
		$output .= '<td style="text-align:center; color:green;">'. number_format(( ($row['Viellards75etplusM'] + $row['Viellards75etplusF'])*100)/$total,2,',', ' ').' % ' . '</td>';
		
		$output .= '<td style="text-align:center; color:red;">'.  number_format(( $total*100)/$total,2,',', ' '). ' % </td>'; '</td>';
		$output .='</tr>';
		}
	}
	$output .=' </tbody>';
	$output .='  </table>';
	mysqli_free_result($resultAdult);
	echo $output;
    }
}

?>