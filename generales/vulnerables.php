<?php
 include("../libs/db_connected.php");

include("../header.php");

function fill_tableEnfant($con){
	$output='';
	$queryEnf="SELECT Sum(Enf0a5ansM) as  Enf0a5ansM, Sum(Enf0a5ansF) as Enf0a5ansF, Sum(Enf6a14ansM) as Enf6a14ansM , Sum(Enf6a14ansF) as Enf6a14ansF,  Sum(Enf15a17ansM) as Enf15a17ansM, Sum( Enf15a17ansF) as  Enf15a17ansF From recensementvulnerable";
	$resultEnf = mysqli_query($con, $queryEnf);

	$total=0;

	while($row= mysqli_fetch_array($resultEnf)){
		$total=  $total+ ($row['Enf0a5ansM'] +  $row['Enf0a5ansF'] +$row['Enf6a14ansM'] +  $row['Enf6a14ansF'] + $row['Enf15a17ansM'] + $row['Enf15a17ansF']);

		$output .=' <tr  class="table-primary"> ';
		$output .= '<td style="text-align:center;">'. $row['Enf0a5ansM']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Enf0a5ansF']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Enf6a14ansM']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Enf6a14ansF']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Enf15a17ansM']. '</td>';
		$output .= '<td style="text-align:center;">'. $row['Enf15a17ansF']. '</td>';
		$output .= '<td style="text-align:center; color:red;">'.  $total. '</td>';
		$output .='</tr>';

		if( $total>0){
		$output .=' <tr  class="table-primary"> ';
		$output .= '<td style="text-align:center;">'. number_format(( $row['Enf0a5ansM']*100)/$total,2,',', ' ').' % ' . '</td>';
		$output .= '<td style="text-align:center;">'.  number_format(( $row['Enf0a5ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'. number_format(( $row['Enf6a14ansM']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'.   number_format(($row['Enf6a14ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'.  number_format(($row['Enf15a17ansM']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center;">'.  number_format(($row['Enf15a17ansF']*100)/$total,2,',', ' ').' % '. ' </td>';
		$output .= '<td style="text-align:center; color:red;">'.  number_format(( $total*100)/$total,2,',', ' '). ' % </td>'; '</td>';
		$output .='</tr>';
		}
	}
	$output .=' </tbody>';
	$output .='  </table>';
	mysqli_free_result($resultEnf);
	return $output;
 }


 function fill_tableAdulte($con){
	$output='';

	$queryAdult="SELECT Sum(Adulte18a64M) as  Adulte18a64M, Sum(Adulte18a64F) as Adulte18a64F, Sum(Adultes65a75ansM) as Adultes65a75ansM , Sum(Adultes65a75ansF) as Adultes65a75ansF,  Sum(Viellards75etplusM) as Viellards75etplusM,  Sum(Viellards75etplusF) as Viellards75etplusF  From recensementvulnerable";

	$resultAdult = mysqli_query($con, $queryAdult);


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
	return $output;
 }


 function fill_tableMobiliteReduite($con){
	$output='';
	$queryMR="SELECT Sum(NbrEnfMobRed) as  NbrEnfMobRed, Sum(NbrAdulteMobRed) as NbrAdulteMobRed, Sum(NbrTroisAgeMob) as NbrTroisAgeMob , Sum(NbdVieuxMobRed) as NbdVieuxMobRed, Sum(Viellesse) as Viellesse , Sum(TotalMaladeAlit) as TotalMaladeAlit, Sum(FemEnc6moisetplus) as FemEnc6moisetplus From recensementvulnerable";
	$resultMR = mysqli_query($con, $queryMR);

	$total=0;

	while($row= mysqli_fetch_array($resultMR)){
		$total=  $total+ ($row['NbrEnfMobRed'] +  $row['NbrAdulteMobRed'] +$row['NbrTroisAgeMob'] +  $row['NbdVieuxMobRed']);

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
	mysqli_free_result($resultMR);
	return $output;
 }




 function fill_tableMaladieChronique($con){
	$output='';
	$queryMC="SELECT Sum(MalChronEnf) as  MalChronEnf, Sum(MalChronAdultes) as MalChronAdultes, Sum(MalchronTroisAge) as MalchronTroisAge , Sum(MalchronViellard) as MalchronViellard, Sum(NbrePersAccompagner) as NbrePersAccompagner From recensementvulnerable";
	$resultMC = mysqli_query($con, $queryMC);

	$total=0;

	while($row= mysqli_fetch_array($resultMC)){
		$total=  $total+ ($row['MalChronEnf'] +  $row['MalChronAdultes'] +$row['MalchronTroisAge'] +  $row['MalchronViellard']+  $row['NbrePersAccompagner']);

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
	mysqli_free_result($resultMC);
	return $output;
 }



?>
<div class="container">

<ol class="breadcrumb">
<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>
<li class="active">Enquêtes</li>
</ol>

<div class="row">

<!-- Article main content -->
<article class="col-sm-8 maincontent">
	<header class="page-header" style="width:100%">
	<h3>Enquêtes sur les personnes vulnérables</h3>
	</header>
	<h6 > Résutat de recensement des personnes vulnérables à évacuées lors des passages à la phase orange du volcan Nyiragongo.</h6>
	<h5 style="color:red">Ces données concernent le quartier Majengo, Murara et Virunga.</h5>
	<h5 style="color:red">Pour filtrer sélectionner d'abord le quartier, la cellule, puis une avenue concernée.</h5>

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
								<select  id="cellule" class="form-control linked-select" data-target="#avenue" data-source="http://localhost/ins-nordkivu/list.php?type=avenue&filter=$id" style="display:none;">
									<option value="0">selectionnez votre cellule</option>

								</select>
						</div>
					</div>

					<div class="col-sm-4" >
						<div class="form-group">
							<label for="avenue">Avenue</label>
								<select  id="avenue" class="form-control"  style="display:none;">
									<option value="0">selectionnez votre avenue</option>

								</select>
						</div>
					</div>
         </div>
        </form>


                        <table class="table lesvilnerable"  id="tblvulnerableEnfant">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
                                    <th style="text-align:center;">Enfants 0 à 5 ans M</th>
                                    <th style="text-align:center;">Enfants 0 à 5 ans F</th>
                                    <th style="text-align:center;">Enfants 6 à 14 ans M</th>
                                    <th style="text-align:center;">Enfants 6 à 14 ans F</th>
                                    <th style="text-align:center;">Enfants 15 à 17 ans M</th>
                                    <th style="text-align:center;">Enfants 15 à 17 ans F</th>
                                    <th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

							echo fill_tableEnfant($con);

                             ?>

                            </tbody>
                            </table>

							<table class="table lesvilnerable"  id="tblvulnerableAdulte">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
                                    <th style="text-align:center;">Adultes 18 à 64 ans M</th>
									<th style="text-align:center;">Adultes 18 à 64 ans F</th>
									<th style="text-align:center;">Total 18 à 64 ans </th>

                                    <th style="text-align:center;">Adultes 65 à 75 ans M</th>
									<th style="text-align:center;">Adultes 65 à 75 ans F</th>
									<th style="text-align:center;">Total 65 à 75 ans </th>

                                    <th style="text-align:center;">Viellards de plus de 75 ans M</th>
                                    <th style="text-align:center;">Viellards de plus de 75 an F</th>
									<th style="text-align:center;">Total plus de 75</th>
									<th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							echo fill_tableAdulte($con);

                             ?>

                            </tbody>
                            </table>


							<table class="table lesvilnerable"  id="tblvulnerableMolitereduite">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
                                    <th style="text-align:center;">Enfants à mobilité reduite</th>
									<th style="text-align:center;">Adultes à mobilité reduite</th>
									<th style="text-align:center;">Troisième âge à mobilité reduite</th>
									<th style="text-align:center;">Viellards mobilité reduite</th>
									<th style="text-align:center;">Viellesse</th>
									<th style="text-align:center;">Malades alités</th>
                                    <th style="text-align:center;">Femmes enceintes grossesse de 6 mois ou plus</th>
									<th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							echo fill_tableMobiliteReduite($con);
                             ?>

                            </tbody>
							</table>


							<table class="table lesvilnerable"  id="tblvulnerableMaladieChronique">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
                                    <th style="text-align:center;">Enfants souffrant des maladies Chroniques</th>
									<th style="text-align:center;">Adultes souffrant des maladies Chroniques</th>
									<th style="text-align:center;">Troisième âge souffrant des maladies Chroniques</th>
                                    <th style="text-align:center;">Viellards souffrant des maladies Chroniques</th>
									<th style="text-align:center;">Personnes qui devrons accompagner les vulnérables</th>

									<th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							echo fill_tableMaladieChronique($con);

                            mysqli_close($con);
                             ?>

                            </tbody>
                            </table>






						</article>


</div>
</div>


<?php
		   include("../footer.php");
 ?>
