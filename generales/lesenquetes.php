<?php
 include("../libs/db_connected.php");
	include("../header.php");

	function fill_tableAvenueMap($con){
		$output='';
		$queryAvenue="SELECT nom,recensementvulnerable.CoordGeoLatitude as lat, recensementvulnerable.CoordGeoLongitude as lng,statavanue.homme, statavanue.femme, statavanue.garcon ,statavanue.fille, (statavanue.homme + statavanue.femme + statavanue.garcon +statavanue.fille) as tot FROM avenue, recensementvulnerable, statavanue WHERE statavanue.avenue= avenue.id and recensementvulnerable.avenue = avenue.id GROUP BY avenue.id ORDER BY tot asc LIMIT 50 ";
		$resultAvenue = mysqli_query($con, $queryAvenue);

		$total=0;
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
			$output .= '<td style="text-align:center;">'. $row['tot'].'</td>';
			$output .='</tr>';


			}
		}
		$output .=' </tbody>';
		$output .='  </table>';
		mysqli_free_result($resultAvenue);
		return $output;
	 }


?>
<div class="container">

<ol class="breadcrumb">
	<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>
	<li class="active">Goma et ses avenues</li>
</ol>

<div class="row">

	<!-- Article main content -->
	<article class="col-sm-8 maincontent">
		<header class="page-header">
		<h3>Goma et ses avenues</h3>
		</header>

		<form action="" method="post">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="quartier">Quartier</label>
								<select  id="quartier" class="form-control linked-select" data-target="#cellule" data-source="http://localhost/ins-nordkivu/list.php?type=cellule&filter=$id">
									<option value="0">selectionnez votre quartier</option>
									<?php
									$sqlQuartier="SELECT id, nom From quartier";

									$resultQuartier = mysqli_query($con, $sqlQuartier);

									while($quartier = mysqli_fetch_array($resultQuartier)){
									?>
									<option value="<?php echo $quartier['id'];?>"><?php echo $quartier['nom'];?> </option>
									<?php }
									mysqli_free_result($resultQuartier);


									?>
								</select>
						</div>
					</div>
					<div class="col-sm-4" >
						<div class="form-group">
							<label for="cellule">Cellule</label>
								<select  id="cellule" class="form-control linked-select" data-target="#Avenue" data-source="http://localhost/ins-nordkivu/list.php?type=avenue&filter=$id" style="display:none;">
									<option value="0">selectionnez votre cellule</option>

								</select>
						</div>
					</div>

					<div class="col-sm-4" style="display:none;">
						<div class="form-group">
						<label for="Avenue">Avenue</label>
						<select  id="Avenue"  class="form-control">
									<option value="0">selectionnez votre cellule</option>
						</select>
						</div>
					</div>


         </div>
        </form>

	 </article>
	 <article class="col-sm-8 maincontent">
<table class="table lesvilnerable"  id="avenuemap">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
									<th></th>
									<th colspan="3" style="text-align:center;">Population</th>
                                    <th></th>
									<th></th>
									<th></th>

								</tr>
								<tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
								<th>N°</th>
								<th>Avenue</th>
                                    <th style="text-align:center;">Homme</th>
                                    <th style="text-align:center;">Femme</th>
                                    <th style="text-align:center;">Garçon</th>
                                    <th style="text-align:center;">Fille</th>
                                    <th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
		echo fill_tableAvenueMap($con);

		?>

	   </tbody>
	   </table>

	 </article>


<div class="avenueMap" id="avenueMaps"></div>

</div>


</div>


 <?php
            include("../footer.php");
  ?>
