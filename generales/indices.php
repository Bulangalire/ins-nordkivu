
<?php
include("../libs/db_connected.php");
include("../header.php");
$this_year= date('Y', strtotime(date("Y-m-d")));
$id_produit=1;
$id_produit2=2;
$sql_indice="SELECT * FROM evolution_prix WHERE annee=". $this_year ." AND id_produit=".$id_produit." OR id_produit=".$id_produit2;

$sql_date_evolution= "SELECT mois, annee FROM evolution_prix GROUP BY mois, annee ORDER BY annee desc  LIMIT 12";

$result_date_evolution= mysqli_query($con, $sql_date_evolution)or die(mysqli_error($con));

$tableau = array();

$queryEvolutionPrix="SELECT   DISTINCT( e.mois) as mois FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE e.mois='2019-10-01'";
$resultEvolutionPrix = mysqli_query($con, $queryEvolutionPrix);
$queryEvolutionPrixHausse="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE  e.variation_mensuelle > 0 AND e.mois='2019-10-01' ORDER BY e.variation_mensuelle asc";
$queryEvolutionPrixBaisse="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE e.variation_mensuelle < 0 AND e.mois='2019-10-01' ORDER BY e.variation_mensuelle desc";
$resultEvolutionPrixBaisse = mysqli_query($con, $queryEvolutionPrixBaisse);
$resultEvolutionPrixHausse = mysqli_query($con, $queryEvolutionPrixHausse);
	function fill_tableEvolutionPrix($con){
		$output='';
	
    $queryEvolutionPrix="SELECT p.id, p.designation, p.unite, e.montant_indice, e.mois, e.variation_mensuelle, e.variation_annuelle FROM produit as p INNER JOIN evolution_prix as e ON p.id=e.id_produit WHERE e.mois='2019-10-01'";
 
    $resultEvolutionPrix = mysqli_query($con, $queryEvolutionPrix);
    
   if(ISSET($_POST['dateSelectedValue'])){

    echo $_POST['dateSelectedValue'];
   }

    

    //$tblDataHaussePrix= array($dataHaussePrix);

		$total=0;
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

 			$tableau[$num] =array($row['id'], $row['designation']);
    }
		
		$output .=' </tbody>';
		$output .='  </table>';
		//mysqli_free_result($resultEvolutionPrix);
    echo $output;
    
    
	 }









/*
$tbl_indice=array();
$conter=0;
while($row= mysqli_fetch_array($result_indice)){
$conter=$conter+1;
$tbl_indiceHead[$conter]=array(date('Y-m', strtotime($row['mois'])));
$tbl_indiceData[$conter]=array($row['montant_indice']);



}
*/

?>
<style>
.mySlides {display:none;}
</style>

<div class="container">
<ol class="breadcrumb">
<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>
<li class="active">Les indices de prix</li>
</ol>

<div class="row">

<!-- Article main content -->
<article class="col-sm-12 maincontent">
      <header class="page-header">
  <h3>Les indices de prix</h3>
    </header>
    <b> Évolution des prix moyen mensuel et des indices de prix d’un échantillon des produits de première nécessité dans la ville de Goma </b>
   
   <!-- <div class="sliderIndice">
        <div class="w3-content w3-section">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image001.jpg"   alt="exposer">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image002.jpg"  alt="en route">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image003.jpg"  alt="en famille 3">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image004.jpg"  alt="n famille 2">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image005.jpg">
      <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image006.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image007.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image008.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image009.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image010.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image011.jpg">
 <img class="mySlides" src="http://localhost/ins-nordkivu/assets/img/image012.jpg">

    </div>
  </div>
  </div>
 -->


<?php 
$output='';

 
?>


<select id="mois_concerne" class="form-control">
<option value="0">Selection un mois ici</option>
<?php 
  while($row = mysqli_fetch_array($result_date_evolution)){ ?>
<option value="<?php echo date('d/m/Y', strtotime($row['mois'])); ?>"><?php echo date('F Y', strtotime($row['mois'])); ?></option>
<?php }?>

</select>

<div class="evolution_prix">
      <div class="evolution_prix_hausse">
      <canvas id="evolution_prix_hausse"></canvas>
      </div>
      <div class="evolution_prix_baisse">
      <canvas id="evolution_prix_baisse"></canvas>
      </div>
</div>
<script>

  </script>
<div class="leftList">
  <ul>
    <li> <h6> <a href="/ins-nordkivu/assets/doc/Evolution_des_prix_moyens_de_quelques_produits_de_premiere_nécessite_'.<?php echo ISSET($mois)? $mois :"" ;  ?>.'.xlsx" download="Evolution_des_prix_moyens_de_quelques_produits_de_premiere_nécessite_".<?php echo ISSET($mois)? $mois :"" ; ?>> <img src="/ins-nordkivu/assets/img/icon/excel.jpg" /> Télécharger pour <?php echo ISSET($mois)? $mois :"" ; ?></a></h6></li>
      </ul>
</div>



            </article>
       <article class="col-sm-12">

       <table class="table" id="tblvariayionprix">
                            <thead>
                                <tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
									
									<th colspan="6" style="text-align:center;">Evolution des prix moyens de quelques produits de première nécessité</th>
   

								</tr>
								<tr class="table-primary" style="background-color: #2C3E50; color:#fff; text-align:center;">
								<th>N°</th>
								<th>Produit</th>
                 <th style="text-align:left;">Unité</th>
                <?php 	while($row= mysqli_fetch_array($resultEvolutionPrix)){ ?>
                  <th style="text-align:left;"><?php echo  date('F Y', strtotime($row['mois'])); ?></th>
               
                <?php }?>
                
                <th style="text-align:left;">Variation en <br /> % sur 1 mois</th>
                <th style="text-align:left;">Variation en <br />  % sur 1 an</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
		echo fill_tableEvolutionPrix($con);

		?>

	   </tbody>
	   </table>
       </article>     


</div>
</div>


<?php
		   include("../footer.php");
 ?>
<script>

/*$('input[name="dates"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
  },function(start, end, label){
    
  //alert("You are " + start.format('YYYY-MM-DD') + " years old!");


});

$(document).ready(function(){

  document.getElementById('dates').addEventListener('change', function(){
    var dateSelected =  document.getElementById('dates');
    
    var dateSelectedValue = dateSelected.options[dateSelected.selectedIndex].value;


		$.ajax({

        url:"evolution_indice_prix.php",

        method:'POST',

        data:{dateSelectedValue:dateSelectedValue},

        success:function(data){

          $('#tblvariayionprix').html(data);

        }
    });



	});

});*/

//$(document).ready(function (){
var color=Chart.helpers.color;
var tblHaussePrix =[];
tblHaussePrix= <?php echo json_encode( mysqli_fetch_all($resultEvolutionPrixHausse)); ?>;
var tblBaissePrix =[];
tblBaissePrix= <?php echo json_encode( mysqli_fetch_all($resultEvolutionPrixBaisse)); ?>;

var tblProduitsHausse=[];
var tblPrixHausse=[];
var tblProduitsBaisse=[];
var tblPrixBaisse=[];

tblHaussePrix.forEach(function(produit){
  tblProduitsHausse.push(produit[1]);
  tblPrixHausse.push(produit[5]);
  
});

tblBaissePrix.forEach(function(produit){
  tblProduitsBaisse.push(produit[1]);
  tblPrixBaisse.push(produit[5]);
  
});

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
}
//});
/*document.getElementById('addProduit').addEventListener('click', function(){
  if(horizotalBarChartPriceEvolution.datasets.length > 0){
    var unProduit = produit[horizotalBarChartPriceEvolution.labels.length % produit.length];
    horizotalBarChartPriceEvolution.labels.push(unProduit);
    for (var index=0; index< horizotalBarChartPriceEvolution.datasets.length; index++){
      horizotalBarChartPriceEvolution.datasets[index].data.push(2.5);
    }
    window.myHorizontalBar.update();
  }
});
*/
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
 /* for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000); // Change image every 2 seconds*/
}


</script>
