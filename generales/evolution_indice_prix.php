<?php

include("../libs/db_connected.php");


$tableau = array();
if(isset($_POST['mois'])){

    if($_POST['mois'] !=''){



        $output='';
        
        
        $queryEvolutionPrixMois="SELECT DISTINCT( e.mois)  FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE  e.mois='".date('Y-d-m',strtotime($_POST['mois']))."' ORDER BY p.id asc";
        $queryEvolutionPrix="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE  e.mois='".date('Y-d-m',strtotime($_POST['mois']))."' ORDER BY p.id asc";
        $resultEvolutionPrix = mysqli_query($con, $queryEvolutionPrix);
        $queryEvolutionPrixHausse="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE  e.variation_mensuelle > 0 AND e.mois='".date('Y-m-d',strtotime($_POST['mois']))."' ORDER BY e.variation_mensuelle asc";
        $queryEvolutionPrixBaisse="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE e.variation_mensuelle < 0 AND e.mois='".$_POST['mois']."' ORDER BY e.variation_mensuelle desc";
        $resultEvolutionPrixBaisse = mysqli_query($con, $queryEvolutionPrixBaisse);
        $resultEvolutionPrixHausse = mysqli_query($con, $queryEvolutionPrixHausse);
        $resultMois = mysqli_query($con, $queryEvolutionPrixMois);
        
		$output .='<table class="table">';

        $output .='                    <thead>';

        $output .='                        <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';

		$output .='							<th colspan="6" style="text-align:center;">Evolution des prix moyens de quelques produits de première nécessité</th>';

		$output .='						</tr>';

		$output .='						<tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">';

		$output .='						<th>N°</th>	';

		$output .='						<th>Produit</th>';

        $output .='                    <th style="text-align:left;">Unité</th>';

        while($row= mysqli_fetch_array($resultMois)){
          print_r(mysqli_fetch_array($resultMois));
        $output .='        <th style="text-align:left;">'. date('F Y', strtotime( $row["mois"])) .'</th>';
        }
         

        $output .='                             <th style="text-align:left;">Variation en <br /> % sur 1 mois</th>';

        $output .='                            <th style="text-align:left;">Variation en <br />  % sur 1 an</th>';

        $output .='                        </tr>';

        $output .='                    </thead>';

        $output .='                    <tbody>';





        $num=0;
        

        while($row= mysqli_fetch_array($resultEvolutionPrix)){
			$num = $num + 1;
		
			$output .=' <tr  class="table-primary">';
			$output .= '<td>'.$num. '</td>';
			$output .= '<td style="text-align:left;">'. $row['designation'].'</td>';
			$output .= '<td style="text-align:left;">'. $row['unite']. '</td>';
			$output .= '<td style="text-align:left;">'. $row['montant_indice']. '</td>';
      $output .=  $row['variation_mensuelle']< 0 ? '<td style="text-align:left; color:red;">'. $row['variation_mensuelle']. '</td>' : '<td style="text-align:left;">'.$row['variation_mensuelle']. '</td>';
      $output .=  $row['variation_annuelle']< 0 ? '<td style="text-align:left; color:red;">'. $row['variation_annuelle']. '</td>' : '<td style="text-align:left;">'.$row['variation_annuelle']. '</td>';
     
			$output .='</tr>';

 			$tableau[$num] =array($row['designation'], $row['variation_mensuelle']);
    }
		
		$output .=' </tbody>';
		$output .='  </table>';

	

		

	  echo $output;

    // foreach ($tableau as  $avenue) {


//}

mysqli_free_result($resultEvolutionPrix);



    }

}

  //$tbl = json_encode($tableau);

//print_r($tbl);


?>
<script>

var color=Chart.helpers.color;
var tblHaussePrix =[];
tblHaussePrix= <?php echo json_encode($tableau); ?>;
var tblBaissePrix =[];
tblBaissePrix= <?php echo json_encode($tableau); ?>;

var tblProduitsHausse=[];
var tblPrixHausse=[];
var tblProduitsBaisse=[];
var tblPrixBaisse=[];

for(var i in prixEnHausse= <?php echo json_encode($tableau); ?> ){
  if(prixEnHausse[i][1]>0){
  tblProduitsHausse.push(prixEnHausse[i][0]);
  tblPrixHausse.push(prixEnHausse[i][1]);
 
  }
}

for(var i in prixEnBaisse= <?php echo json_encode($tableau); ?> ){
  if(prixEnBaisse[i][1]<0){
  tblProduitsBaisse.push(prixEnBaisse[i][0]);
  tblPrixBaisse.push(prixEnBaisse[i][1]);
 
  }
}



var horizotalBarChartPriceEvolution={
  labels:tblProduitsHausse,
  datasets:[{
    label:'Variation à la hausse des prix en %',
    backgroundColor:"rgb(68,114,196,0.5)",
    borberColor:"rgb(68,114,196)",
    borderWidth:1,
    data:tblPrixHausse
  }]
};
drawChart('evolution_prix_hausse', horizotalBarChartPriceEvolution); 

var horizotalBarChartPriceEvolutionBaisse={
  labels:tblProduitsBaisse,
  datasets:[{
    label:'Variation à la baisse des prix en %',
    backgroundColor:"rgba(248, 24, 24, 0.5)",
    borberColor:"rgb(68,114,196)",
    borderWidth:1,
    data:tblPrixBaisse
  }]
};
drawChart('evolution_prix_baisse', horizotalBarChartPriceEvolutionBaisse); 

function drawChart(ctx, data){
  var ctx=document.getElementById(ctx).getContext('2d');
  window.myHorizontalBar = new Chart(ctx,{
    type:'horizontalBar',
    data:data,
    options:{
      elements:{
        rectangle:{
          borderWidth:2,
        }
      },
      events: [],
      responsive:true,
      legend:{
        position:'bottom'
      },
      title:{
        display:true,
        text:'Evolution de prix sur le marche'
      }
    }
  });
  window.myHorizontalBar.update();
}


</script>
