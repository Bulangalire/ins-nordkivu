

<?php



include("../header.php");



?>
<style>
.mySlides {display:none;}
</style>
<div class="container">



<ol class="breadcrumb">

<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>

<li class="active">Gallerie</li>

</ol>



<div class="row">



<!-- Article main content -->

<article class="col-sm-8 maincontent">

	<header class="page-header">

	<h3>Gallerie</h3>

	</header>

	<a href="http://localhost/ins-nordkivu/assets/doc/LANCEMENT_RGE_GOMA_Aout_2019.pdf" target="_blank">
	<b> Le lancement du Recensement Général des Entreprises (R.G.E)</b>
		<div class="w3-content w3-section">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/exposer.jpg"   alt="exposer">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/en_route_rge.jpg"  alt="en route">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/photoFamille3.jpg"  alt="en famille 3">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/photoFamille2.jpg"  alt="n famille 2">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/rge_1.jpeg">
		  <img class="mySlides actu" src="http://localhost/ins-nordkivu/assets/img/publication/pullUp.jpg">

		</div>
		</a>
		<br/>
	 <a target="_blank" href="http://youtu.be/LtgrZPhW_yY"><b> Qu’est-ce que le Recensement Général des Entreprises ?</b>  </a>
	<br/>
	<iframe class="actu"  src="http://www.youtube-nocookie.com/embed/LtgrZPhW_yY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
	<br/>
	<a href="http://localhost/ins-nordkivu/generales/tss_nordkivu.php"> <b>Lancement de la formation des Techniciens Supérieurs de la Statistique</b>  </a>

	<div class="w3-content w3-section">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss1.jpeg"   alt="exposer">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss2.jpeg"   alt="en route">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss3.jpeg"  alt="en famille 3">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss4.jpeg"   alt="n famille 2">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss5.jpeg" alt="exposer">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss6.jpeg" alt="exposer">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss7.jpeg"  alt="en famille 3">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss8.jpeg"   alt="n famille 2">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss9.jpeg" alt="exposer">
		  <img class="mySlides1 actu" src="http://localhost/ins-nordkivu/assets/img/galleries/lancement_tss/tss10.jpeg" alt="exposer">
		</div>

						</article>



<?php

		   include("../siderbar.php");

 ?>



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

var myIndex1 = 0;
carousel1();
function carousel1() {

  var i;
  var x = document.getElementsByClassName("mySlides1");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex1 > x.length) {myIndex1 = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel1, 3000); // Change image every 2 seconds
}
</script>
