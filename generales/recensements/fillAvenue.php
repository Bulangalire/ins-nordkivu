<?php

include("../../libs/db_connected.php");


$tableau = array();
if(isset($_POST['avenue_id'])){

    if($_POST['avenue_id'] !=''){



		$output='';

		$queryAvenue="SELECT nom,recensementvulnerable.CoordGeoLatitude as lat, recensementvulnerable.CoordGeoLongitude as lng,statavanue.homme, statavanue.femme, statavanue.garcon ,statavanue.fille, (statavanue.homme + statavanue.femme + statavanue.garcon +statavanue.fille) as tot FROM avenue, recensementvulnerable, statavanue WHERE  cellule=". $_POST['avenue_id'] ." AND statavanue.avenue= avenue.id  GROUP BY avenue.id ORDER BY tot asc";

		$resultAvenue = mysqli_query($con, $queryAvenue);



		$output .='<table class="table lesvilnerable">';

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

        $tableau[$num] =array($row['nom'], $row['tot']);


			}


		}



		$output .=' </tbody>';

		$output .='  </table>';


	  echo $output;

    // foreach ($tableau as  $avenue) {


//}

mysqli_free_result($resultAvenue);



    }

}

  //$tbl = json_encode($tableau);

//print_r($tbl);


?>
<script>


$(document).ready(function () {
    var ctx = document.getElementById('graphAvenue');
    chartAvenue("Population par avenue", ctx,'pie');
});
   var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    }
function chartAvenue(titre,  ctx, typeChart){
    Chart.defaults.global.defaultBackgroundColor = '#777';
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontColor = '#777';
    Chart.defaults.global.defaultFontSize = 18;

    var i=0;
    var avenue =[];
    var population=[];
    var couleur=[];
    var populationDeGoma=[];
    for(var i in populationDeGoma= <?php echo json_encode($tableau); ?> ){
         avenue.push(populationDeGoma[i][0]);
         population.push(populationDeGoma[i][1]);
         couleur.push(dynamicColors());

    }

    var pieData = {
        labels:avenue,
        datasets: [
          {
            backgroundColor: couleur,
            borderColor     :couleur,
            borderColor: '#777',
            borderWidth: 1,
            hoverBorderColor:'#777',
            data: population
         }
       ]
     };

      var chartInstance = new Chart(ctx, {
        type: typeChart,
        data: pieData,
        options: {
            legend:{
                position:'bottom',
                display:false
            },
            title:{
                display:true,
                text: titre,
                fontSize:25
            },
            inGraphDataShow : true,
            annotateDisplay : true,
              tooltips:{
                callbacks: {
                    label: function(tooltipItem, data) {
                        var allData = data.datasets[tooltipItem.datasetIndex].data;
                        var tooltipLabel = data.labels[tooltipItem.index];
                        var tooltipData = allData[tooltipItem.index];
                        var total = 0;
                        for (var i in allData) {
                            total += parseFloat(allData[i]);
                        }
                        var tooltipPercentage = ((tooltipData / total) * 100 ).toFixed(2);
                        return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
                    }
                }
            },
        }
      });

    }




</script>
