<?php
include("../libs/db_connected.php");

if(isset($_POST['avenue_id'])){
    if($_POST['avenue_id'] !=''){
        $query="SELECT Sum(Enf0a5ansM) as  Enf0a5ansM, Sum(Enf0a5ansF) as Enf0a5ansF, Sum(Enf6a14ansM) as Enf6a14ansM , Sum(Enf6a14ansF) as Enf6a14ansF,  Sum(Enf15a17ansM) as Enf15a17ansM, Sum( Enf15a17ansF) as  Enf15a17ansF From recensementvulnerable WHERE avenue=". $_POST['avenue_id'];
        $result = mysqli_query($con, $query);
        $output='';
        $output .='<table>';
        $output .='<thead>';
                $output .='       <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
                $output .='       <th style="text-align:center;">Enfants 0 à 5 ans Masculin</th>';
                $output .='      <th style="text-align:center;">Enfants 0 à 5 ans Féminin</th>';
                $output .='      <th style="text-align:center;">Enfants 6 à 14 ans Masculin</th>';
                $output .='      <th style="text-align:center;">Enfants 6 à 14 ans Féminin</th>';
                $output .='      <th style="text-align:center;">Enfants 15 à 17 ans Masculin</th>';
                $output .='      <th style="text-align:center;">Enfants 15 à 17 ans Féminin</th>';
                $output .='      <th style="text-align:center;">Total</th>';
                $output .='          </tr>';
                $output .='          </thead>';
                $output .=' <tbody>';
                $total=0;
        while($row= mysqli_fetch_array($result)){
            $total= $row['Enf0a5ansM'] +  $row['Enf0a5ansF'] +$row['Enf6a14ansM'] +  $row['Enf6a14ansF'] + $row['Enf15a17ansM'] + $row['Enf15a17ansF'];
            $output .=' <tr > ';
            $output .= '<td>'. $row['Enf0a5ansM']. '</td>';
            $output .= '<td>'. $row['Enf0a5ansF']. '</td>';
            $output .= '<td>'. $row['Enf6a14ansM']. '</td>';
            $output .= '<td>'. $row['Enf6a14ansF']. '</td>';
            $output .= '<td>'. $row['Enf15a17ansM']. '</td>';
            $output .= '<td>'. $row['Enf15a17ansF']. '</td>';
            $output .= '<td>'.  $total. '</td>';
            $output .='</tr>';
            if( $total>0){
                        $output .=' <tr> ';
                        $output .= '<td>'. number_format(( $row['Enf0a5ansM']*100)/$total,2,',', ' ').' % ' . '</td>';
                        $output .= '<td>'.  number_format(( $row['Enf0a5ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
                        $output .= '<td>'. number_format(( $row['Enf6a14ansM']*100)/$total,2,',', ' ').' % '. ' </td>';
                        $output .= '<td>'.   number_format(($row['Enf6a14ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
                        $output .= '<td>'.  number_format(($row['Enf15a17ansM']*100)/$total,2,',', ' ').' % '. ' </td>';
                        $output .= '<td>'.  number_format(($row['Enf15a17ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
                        $output .= '<td>'.  ( $total*100)/$total. ' % </td>'; '</td>';
                        $output .='</tr>';
            }  
        }
        $output .=' </tbody>';
        $output .='  </table>';
        echo $output;
    }
}

?>