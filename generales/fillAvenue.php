<?php
include("../libs/db_connected.php");

if(isset($_POST['avenue_id'])){
    if($_POST['avenue_id'] !=''){
	
		$output='';
		$queryAvenue="SELECT nom,recensementvulnerable.CoordGeoLatitude as lat, recensementvulnerable.CoordGeoLongitude as lng,statavanue.homme, statavanue.femme, statavanue.garcon ,statavanue.fille, (statavanue.homme + statavanue.femme + statavanue.garcon +statavanue.fille) as tot FROM avenue, recensementvulnerable, statavanue WHERE  cellule=". $_POST['avenue_id'] ." AND statavanue.avenue= avenue.id  GROUP BY avenue.id ORDER BY tot asc";
		$resultAvenue = mysqli_query($con, $queryAvenue);
		
		$output .='<table>';
        $output .='                    <thead>';
        $output .='                        <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
		$output .='							<th></th>';
		$output .='							<th colspan="3" style="text-align:center;">Population</th>';
        $output .='                            <th></th>';
		$output .='							<th></th>';
		$output .='							<th></th>';
									
		$output .='						</tr>';
		$output .='						<tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';
		$output .='						<th>N°</th>	';
		$output .='						<th>Avenue</th>';
        $output .='                            <th style="text-align:center;">Homme</th>';
        $output .='                            <th style="text-align:center;">Femme</th>';
        $output .='                            <th style="text-align:center;">Garçon</th>';
        $output .='                            <th style="text-align:center;">Fille</th>';
        $output .='                            <th style="text-align:center;">Total</th>';
        $output .='                        </tr>';
        $output .='                    </thead>';
        $output .='                    <tbody>';


		$num=0;
		while($row= mysqli_fetch_array($resultAvenue)){
			$num = $num + 1;
			if( $row['tot']>0){
			$output .=' <tr  class="table-primary item js-marker" data-lat="' .  $row['lat'] .'" data-lng="' .  $row['lng'] .'" data-population="' .  $row['tot'] .'"  data-avenue="' .  $row['nom'] .'">';
			$output .= '<td>'.$num. '</td>';
			$output .= '<td>'. $row['nom']. '</td>';
			$output .= '<td style="text-align:center;">'. $row['homme'].' ('. number_format(( $row['homme']*100)/$row['tot'],2,',', ' ').'%)' . '</td>';
			$output .= '<td style="text-align:center;">'. $row['femme']. ' ('.  number_format(( $row['femme']*100)/$row['tot'],2,',', ' ').'%)'.'</td>';
			$output .= '<td style="text-align:center;">'. $row['garcon'].' ('. number_format(( $row['garcon']*100)/$row['tot'],2,',', ' ').'%)'. '</td>';
			$output .= '<td style="text-align:center;">'. $row['fille'].' ('.   number_format(($row['fille']*100)/$row['tot'],2,',', ' ').'%)'. '</td>';
			$output .= '<td style="text-align:center;">'. $row['tot'] .'</td>';
			$output .='</tr>';
		   

			}
		}
		$output .=' </tbody>';
		$output .='  </table>';
		mysqli_free_result($resultAvenue);
	  echo $output;
    }
}

?>