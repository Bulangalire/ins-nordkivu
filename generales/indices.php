
<?php
include("../libs/db_connected.php");
include("../header.php");
$this_year= date('Y', strtotime(date("Y-m-d")));
$id_produit=1;
$id_produit2=2;
$sql_indice="SELECT * FROM INDICE WHERE annee=". $this_year ." AND id_produit=".$id_produit." OR id_produit=".$id_produit2;
$result_indice= mysqli_query($con, $sql_indice);

$tbl_indice=array();
$conter=0;
while($row= mysqli_fetch_array($result_indice)){
$conter=$conter+1;
$tbl_indiceHead[$conter]=array(date('Y-m', strtotime($row['mois'])));
$tbl_indiceData[$conter]=array($row['montant_indice']);



}


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
  <div class="indice">
    <div class="headerIndc">
      <header class="page-header">
  <h3>Les indices de prix</h3>
    </header>
    <b> Évolution des prix moyen mensuel et des indices de prix d’un échantillon des produits de première nécessité dans la ville de Goma </b>
    </div>
    <div class="sliderIndice">
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



<?php 
$output='';

 $output.="<table border='0' cellspacing='0' width='955' cellpadding='0' class='TABLE-data'>";
 $output.="<tbody>";
 $output.="<tr class='TABLE-data-th1'>";
 for($i=0; $i< 9; $i++ ){
    $output.='<th scope="col" nowrap width="65px">'.json_encode($tbl_indiceHead[$i+1][0]).'</th>';
  
 }
 $output.="</tr>";
 $output.="<tr>";
 for($i=0; $i< count($tbl_indiceData); $i++ ){
  $output.="<th scope='col' nowrap width='65px'>".json_encode($tbl_indiceData[$i+1][0])."</th>";
}
 $output.="</tr>";
 $output.="</tbody>";
 $output.="</table>";

  echo $output;
 
?>

<canvas id="indice"></canvas>
       
            </article>


</div>
</div>


<?php
		   include("../footer.php");
 ?>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
