<?php
include("../libs/db_connected.php");

if(isset($_POST['avenue_id'])){
    if($_POST['avenue_id'] !=''){

        $output='';
        $queryMC="SELECT Sum(MalChronEnf) as  MalChronEnf, Sum(MalChronAdultes) as MalChronAdultes, Sum(MalchronTroisAge) as MalchronTroisAge , Sum(MalchronViellard) as MalchronViellard, Sum(NbrePersAccompagner) as NbrePersAccompagner  From recensementvulnerable   WHERE avenue=". $_POST['avenue_id'];
        $resultMC = mysqli_query($con, $queryMC);
        


        $output .='<table>';
        $output .='<thead>';
                $output .='       <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
                $output .='       <th style="text-align:center;">Enfants souffrant des maladies Chroniques</th>';
                $output .='      <th style="text-align:center;">Adultes souffrant des maladies Chroniques</th>';
                $output .='      <th style="text-align:center;">Troisième âge souffrant des maladies Chroniques</th>';
                $output .='      <th style="text-align:center;">Viellards souffrant des maladies Chroniques</th>';
                $output .='      <th style="text-align:center;">Personnes qui devrons accompagner les vulnérables</th>';
                $output .='      <th style="text-align:center;">Total</th>';
                $output .='          </tr>';
                $output .='          </thead>';
                $output .=' <tbody>';
                $total=0;
        $total=0;
        
        while($row= mysqli_fetch_array($resultMC)){
            $total=  $total+ ($row['MalChronEnf'] +  $row['MalChronAdultes'] +$row['MalchronTroisAge'] +  $row['MalchronViellard'] +  $row['NbrePersAccompagner'] );
    
            $output .=' <tr  class="table-primary"> ';
            $output .= '<td style="text-align:center;">'. $row['MalChronEnf']. '</td>';
            $output .= '<td style="text-align:center;">'. $row['MalChronAdultes']. '</td>';
            $output .= '<td style="text-align:center;">'. $row['MalchronTroisAge']. '</td>';
            $output .= '<td style="text-align:center;">'. $row['MalchronViellard']. '</td>';
            $output .= '<td style="text-align:center;">'. $row['NbrePersAccompagner']. '</td>';
            $output .= '<td style="text-align:center; color:red;">'.  $total. '</td>';
            $output .='</tr>';
           
            if( $total>0){
            $output .=' <tr  class="table-primary"> ';
            $output .= '<td style="text-align:center;">'. number_format(( $row['MalChronEnf']*100)/$total,2,',', ' ').' % ' . '</td>';
            $output .= '<td style="text-align:center;">'.  number_format(( $row['MalChronAdultes']*100)/$total,2,',', ' ').' % '. ' </td>';
            $output .= '<td style="text-align:center;">'. number_format(( $row['MalchronTroisAge']*100)/$total,2,',', ' ').' % '. ' </td>';
            $output .= '<td style="text-align:center;">'.   number_format(($row['MalchronViellard']*100)/$total,2,',', ' ').' % '. ' </td>';
            $output .= '<td style="text-align:center;">'.   number_format(($row['NbrePersAccompagner']*100)/$total,2,',', ' ').' % '. ' </td>';
            $output .= '<td style="text-align:center; color:red;">'.  number_format(( $total*100)/$total,2,',', ' '). ' % </td>'; '</td>';
            $output .='</tr>';
            }
        }
        $output .=' </tbody>';
        $output .='  </table>';
        echo $output;
          
      
    }
}

?>