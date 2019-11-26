

<?php



include("../libs/db_connected.php");

include("../header.php");



               //Connexion à la base des données



        if(isset($_GET['indicateur']))

                $indicateur=$_GET['indicateur'];

              $sqlActuelle="SELECT indicateur.id, indicateur.indicateur, indicateur.photo,

              profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral

              WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2015' and indicateur.id='".$indicateur."' ORDER BY profilgeneral.annee";



              $sqlActutOT="SELECT indicateur.id, indicateur.indicateur, indicateur.photo,

              profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral

              WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2015' ORDER BY profilgeneral.annee";





              $sqlPasser="SELECT indicateur.indicateur, indicateur.photo,

              profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral

              WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2014' and  indicateur.id='".$indicateur."' ORDER BY profilgeneral.annee";



              $sqlAnteriere="SELECT indicateur.indicateur, indicateur.photo,

              profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral

              WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2013' and indicateur.id='".$indicateur."' ORDER BY profilgeneral.annee";



              $resultSetActuel = mysqli_query($con, $sqlActuelle);

              $resultSetAct = mysqli_query($con, $sqlActutOT);

              $totalPopulation= mysqli_fetch_array($resultSetAct);

              $resultSetActuel = mysqli_query($con, $sqlActuelle);

              $resultPasse = mysqli_query($con, $sqlPasser);

              $resultAnteriere = mysqli_query($con, $sqlAnteriere);





?>

<div class="container">



<ol class="breadcrumb">

<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>

<li class="active">Profil général</li>

</ol>



<div class="row">



<!-- Article main content -->

<article class="col-sm-8 maincontent">

	<header class="page-header">

	<h3>Profil général de la Province du Nord-Kivu pour l'année <?php if(isset($_GET['annee'])) echo($_GET['annee']); ?></h3>

  </header>

  <?php

       $resultatActuel = mysqli_fetch_array($resultSetActuel)

   ?>

	<p><img  src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/<?php echo $resultatActuel['photo']; ?>.jpg"  alt="profil-<?php echo $resultatActuel['photo']; ?>" class="img-rounded pull-right" width="300" >

					 <div class="container portChiffres">



                <h2 class="title" data-title=""><?php

                mb_internal_encoding('UTF-8');

                echo $resultatActuel['indicateur'] ; ?></h2>

                <h4 class="title" data-title="">En

                <?php echo $resultatActuel['annee']; ?>

                <?php    $rowPass = mysqli_fetch_array($resultPasse);

                         $rowAnteriere = mysqli_fetch_array($resultAnteriere);

                          $tauxPasse=number_format((($rowPass['nombre'] - $rowAnteriere['nombre']) /$rowAnteriere['nombre']) * 100,2,',', ' ');

                          if($resultatActuel['id']!==6   ) {

                           echo 'Taux de Croissance '.  $tauxActuel= number_format((($resultatActuel['nombre'] - $rowPass['nombre']) /$rowPass['nombre']) * 100,2,',', ' ')."%";

                           echo  $tauxPasse > $tauxActuel ? '<img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/fleche_bas.png" height="30" width="30" />' : '<img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/fleche_haut.png"  height="30" width="30" />';

                          }

               ?>

                <br>

                <?php echo  number_format($resultatActuel['nombre'],0,',', ' ');





              echo '&nbsp;';

              if($resultatActuel['id']==2 || $resultatActuel['id']==3 || $resultatActuel['id']==4  ) {

                echo 'soit '. number_format(($resultatActuel['nombre']*100)/$totalPopulation['nombre'],2,',', ' ') ."% de population.";

              }

              ?>

            </h4>











            <?php





            mysqli_free_result($resultSetActuel);

            mysqli_free_result($resultPasse);

            mysqli_free_result($resultAnteriere);



            ?>

     </div>

					</p>



						</article>



<?php

		   include("../siderbar.php");

 ?>



</div>

</div>





<?php

		   include("../footer.php");

 ?>

