<?php
include("../libs/db_connected.php");

if(isset($_POST['avenue_id'])){
    if($_POST['avenue_id'] !=''){

  
          
        $output=''; 		

        $queryMR="SELECT Sum(NbrEnfMobRed) as  NbrEnfMobRed, Sum(NbrAdulteMobRed) as NbrAdulteMobRed, Sum(NbrTroisAgeMob) as NbrTroisAgeMob , Sum(NbdVieuxMobRed) as NbdVieuxMobRed, Sum(Viellesse) as Viellesse , Sum(TotalMaladeAlit) as TotalMaladeAlit, Sum(FemEnc6moisetplus) as FemEnc6moisetplus From recensementvulnerable  WHERE avenue=". $_POST['avenue_id'];
        $resultMR = mysqli_query($con, $queryMR);
 
        $output .='<table>';
        $output .='<thead>';
                $output .='       <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
                $output .='       <th style="text-align:center;">Enfants à mobilité reduite</th>';
                $output .='      <th style="text-align:center;">Adultes à mobilité reduite</th>';
                $output .='      <th style="text-align:center;">Troisième âge à mobilité reduite</th>';
                $output .='      <th style="text-align:center;">Viellards mobilité reduite</th>';
                $output .='      <th style="text-align:center;">Viellesse</th>';
                $output .='      <th style="text-align:center;">Malades alités</th>';
                $output .='      <th style="text-align:center;">Femmes enceintes grossesse de 6 mois ou plus</th>';
                $output .='      <th style="text-align:center;">Total</th>';
                $output .='          </tr>';
                $output .='          </thead>';
                $output .=' <tbody>';
                $total=0;
        
                while($row= mysqli_fetch_array($resultMR)){
                    $total=  $total+ ($row['NbrEnfMobRed'] +  $row['NbrAdulteMobRed'] +$row['NbrTroisAgeMob'] +  $row['NbdVieuxMobRed']+  $row['Viellesse'] +$row['TotalMaladeAlit'] +  $row['FemEnc6moisetplus']);
            
                    $output .=' <tr  class="table-primary"> ';
                    $output .= '<td style="text-align:center;">'. $row['NbrEnfMobRed']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['NbrAdulteMobRed']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['NbrTroisAgeMob']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['NbdVieuxMobRed']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['Viellesse']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['TotalMaladeAlit']. '</td>';
                    $output .= '<td style="text-align:center;">'. $row['FemEnc6moisetplus']. '</td>';
                    $output .= '<td style="text-align:center; color:red;">'.  $total. '</td>';
                    $output .='</tr>';
                   
                    if( $total>0){
                    $output .=' <tr  class="table-primary"> ';
                    $output .= '<td style="text-align:center;">'. number_format(( $row['NbrEnfMobRed']*100)/$total,2,',', ' ').' % ' . '</td>';
                    $output .= '<td style="text-align:center;">'.  number_format(( $row['NbrAdulteMobRed']*100)/$total,2,',', ' ').' % '. ' </td>';
                    $output .= '<td style="text-align:center;">'. number_format(( $row['NbrTroisAgeMob']*100)/$total,2,',', ' ').' % '. ' </td>';
                    $output .= '<td style="text-align:center;">'.   number_format(($row['NbdVieuxMobRed']*100)/$total,2,',', ' ').' % '. ' </td>';
                    $output .= '<td style="text-align:center;">'.  number_format(( $row['Viellesse']*100)/$total,2,',', ' ').' % '. ' </td>';
                    $output .= '<td style="text-align:center;">'. number_format(( $row['TotalMaladeAlit']*100)/$total,2,',', ' ').' % '. ' </td>';
                    $output .= '<td style="text-align:center;">'.   number_format(($row['FemEnc6moisetplus']*100)/$total,2,',', ' ').' % '. ' </td>';
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