<?php

               include("libs/db_connected.php");
               include("header.php");

               //Connexion à la base des données

                $sqlActuelle="SELECT indicateur.id, indicateur.indicateur, indicateur.photo,
                 profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral
                WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2015' ORDER BY profilgeneral.annee";


                $sqlPasser="SELECT indicateur.indicateur, indicateur.photo,
                profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral
                WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2014' ORDER BY profilgeneral.annee";

                $sqlAnteriere="SELECT indicateur.indicateur, indicateur.photo,
                profilgeneral.annee, profilgeneral.nombre FROM indicateur, profilgeneral
                WHERE indicateur.id=profilgeneral.indicateur and profilgeneral.annee='2013' ORDER BY profilgeneral.annee";

                $resultSetActuel = mysqli_query($con, $sqlActuelle);
                $resultSetAct = mysqli_query($con, $sqlActuelle);
                $totalPopulation= mysqli_fetch_array($resultSetAct);
                $resultSetActuel = mysqli_query($con, $sqlActuelle);
                $resultPasse = mysqli_query($con, $sqlPasser);
                $resultAnteriere = mysqli_query($con, $sqlAnteriere);

                $queryAvenue="SELECT statavanue.annee, (statavanue.homme + statavanue.femme + statavanue.garcon +statavanue.fille) as  total FROM avenue,statavanue WHERE statavanue.avenue= avenue.id GROUP BY avenue.id";
                $resultAvenue = mysqli_query($con, $queryAvenue);

               $totalGoma =0;
               while ( $rsAvenue = mysqli_fetch_array($resultAvenue)) {
                $totalGoma = $totalGoma + $rsAvenue['total'];
            }

?>




<section class="container">
<div class="row">

<article class="sliderContainer">

 <div class="marquee-rtl">
         <!-- le contenu défilant -->
        <div>
        <a class="modeless" title="" href="http://localhost/ins-nordkivu/generales/tss_nordkivu.php" data-intro="">
        Lancement de la formation des Techniciens Supérieurs de la Statistique</a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href="http://youtu.be/LtgrZPhW_yY" target="_blank"> Lancement du Recensement Général des Entreprise     </a>
        &nbsp;&nbsp; | &nbsp;&nbsp; <a href="http://localhost/ins-nordkivu/generales/indices.php" target="_blank"> Evolution des prix et indice de prix Aout 2019 Entreprise </a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="http://localhost/ins-nordkivu/assets/doc/Rapport_enquete_qualitative_Juillet_2019.pdf" target="_blank">  Étude qualitative sur la consolidation de la paix et la reconstruction en RDC – Juillet 2019    </a>

        </div>
</div>

  <div class="mySlides">
  <img src="http://localhost/ins-nordkivu/assets/img/lanceTSS.JPG">
  <div class="text">Lancement de la formation des Techniciens Supérieurs de la Statistique </div>
</div>

<div class="mySlides">
  <img src="http://localhost/ins-nordkivu/assets/img/RGE_02.jpg">
  <div class="text">Recensement général des entreprises</div>
</div>

<div class="mySlides">
  <img src="http://localhost/ins-nordkivu/assets/img/RGE_03.jpg">
  <div class="text">Recensement général des entreprises </div>
</div>

 <div class="mySlides">
  <img src="http://localhost/ins-nordkivu/assets/img/rge_djasadjasa.jpg">
  <div class="text">spot sur le recensement général des entreprises </div>
</div>

<div class="mySlides">
  <img src="http://localhost/ins-nordkivu/assets/img/RGE_04.jpg">
  <div class="text">Recensement général des entreprises</div>
</div>

<div class="mySlides">

  <img src="http://localhost/ins-nordkivu/assets/img/bulletin1_2014.jpg">
  <div class="text">Bulletin annuel des statistiques sociales</div>
</div>



<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<!--

  <div class="container-fluid">
    <div class="w3-col s4">
      <img  class="demo  w3-hover-opacity-off" src="http://localhost/ins-nordkivu/assets/img/publication/rge_2019.jpg" style="width:100%; height:35%; cursor:pointer" onclick="currentDiv(1)">
    <b class="demo w3-hover-opacity-off">Le Recensement Général des Entreprises (R.G.E 2019)</b><br/>
   <a href="http://localhost/ins-nordkivu/assets/doc/LANCEMENT_RGE_GOMA_Aout_2019.pdf" target="_blank"> Télécharger le rapport </a>
  </div>

    <div class="w3-col s4">
    <iframe  class="demo  w3-hover-opacity-off"   src="http://www.youtube-nocookie.com/embed/LtgrZPhW_yY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" style="width:100%; height:35%; cursor:pointer" onclick="currentDiv(2)"></iframe>
    <b class="demo  w3-hover-opacity-off" >Qu’est-ce que le Recensement Général des Entreprises ?</b> <br/>
  <a href="http://youtu.be/LtgrZPhW_yY" class="demo  w3-hover-opacity-off" target="_blank"> Visionner le spot</a>
   </div>
    <div class="w3-col s4">
      <img class="demo w3-hover-opacity-off" src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/bulletin_2014_1.gif" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
    <b class="demo  w3-hover-opacity-off"> Enquête avec questionnaire unifie a indicateurs de base de bien-être </b>
    <a href="http://localhost/ins-nordkivu/assets/doc/Rapport_QUIBB_RDC_0.pdf" target="_blank"> Télécharger le rapport </a>
    </div>

  </div>
-->
</article>
<article class="pageSidebar container">
<h2 class="titre" style="border-bottom-color:;">
      <span style="background-color:;">Actualité</span> </h2>
     <div class="views-row-actualite row">
     <article>
        <div class="views-field-actualite-image">
       <img src="http://localhost/ins-nordkivu/assets/img/Concours_2020.jpg">
        </div>
        <div class="views-field-actualite">
      <span class="field-content-actualite">
      <h6><a target="_blank" href="/ins-nordkivu/generales/projetsactivites/activitesencours.php">Avis de concours des candidats pour les écoles régionales des ingénieurs statisticiens   </a> </h6> </span>
      </div>

  </article>
   </div>

    <div class="views-row-actualite row">
    <article>
        <div class="views-field-actualite-image">
       <img src="http://localhost/ins-nordkivu/assets/img/recensement.jpg">
        </div>
        <div class="views-field-actualite">
      <span class="field-content-actualite">
      <h6><a href="http://localhost/ins-nordkivu/assets/doc/Rapport_QUIBB_RDC_0.pdf" download="Rapport_QUIBB_RDC_0.pdf">
 Enquête avec questionnaire unifie
à indicateurs de base de bien être
 </a>  </h6> </span>
      </div>

  </article>
   </div>


  </article>
</div>
</section>


<section class="container">
  <div class="row">
    <article>
      <h2 class="titre" style="border-bottom-color:;">
      <span style="background-color:;">Infs générale</span> </h2>

          <div class="infoGenerale">
                <div class="carousel">
                      <div class="flex-viewport" style="overflow: hidden; position:relative;">
                            <ul class="slides-info"  rel="tooltip"  style="width: 1200%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                              <li class="tooltip-info"  rel="tooltip" style="width: 274.2px; margin-right: 5px; float: left; display: block;"><i class="fa fa fa-shopping-cart icon"> </i>Retail Sales Index</li>
                              <li class="tooltip-info" rel="tooltip"  style="width: 274.2px; margin-right: 5px; float: left; display: block;"><i class="fa fa-shopping-bag icon"> </i>Retail Sales Index</li>
                              <li class="tooltip-info"  rel="tooltip" style="width: 274.2px; margin-right: 5px; float: left; display: block;"><i class="fa fa-shopping-bag icon"> </i>Retail Sales Index</li>
                              <li class="tooltip-info"  rel="tooltip" style="width: 274.2px; margin-right: 5px; float: left; display: block;"><i class="fa fa-shopping-bag icon"> </i>Retail Sales Index</li>
                              <li class="tooltip-info" rel="tooltip"  style="width: 274.2px; margin-right: 5px; float: left; display: block;"><i class="fa fa-shopping-bag icon"> </i>Retail Sales Index</li>
                            </ul>

                      </div>
                </div>
          </div>
    </article>
</div>
</section>





<section class="container">
  <div class="row">
    <article>
      <h2 class="titre" style="border-bottom-color:;">
      <span style="background-color:;">Quelques chiffres clés</span> </h2>
    <?php


            while ( $resultatActuel = mysqli_fetch_array($resultSetActuel)) {
            ?>
        <div class="news-item news-item-portfolio">
        <div class="media">
          <img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/<?php echo $resultatActuel['photo']; ?>.jpg"  alt="profil-<?php echo $resultatActuel['photo']; ?>"/>
          <span></span>
        </div>
        <div class="copy">
         <a class="modeless" title="" href="http://localhost/ins-nordkivu/generales/profilgeneral.php?indicateur=<?php echo $resultatActuel['id']; ?>" data-intro="">
                <h6 class="title" data-title=""><?php
                mb_internal_encoding('UTF-8');
                echo $resultatActuel['indicateur'] ; ?></h6>
                <h6 class="title" data-title="">En
                <?php echo $resultatActuel['annee']; ?>
                <?php    $rowPass = mysqli_fetch_array($resultPasse);
                         $rowAnteriere = mysqli_fetch_array($resultAnteriere);
                          $tauxPasse=number_format((($rowPass['nombre'] - $rowAnteriere['nombre']) /$rowAnteriere['nombre']) * 100,2,',', ' ');
                          if($resultatActuel['id']==1 || $resultatActuel['id']==2 || $resultatActuel['id']==3 || $resultatActuel['id']==4 || $resultatActuel['id']==5 || $resultatActuel['id']==7) {
                            echo 'T. Croissance '.  $tauxActuel= number_format((($resultatActuel['nombre'] - $rowPass['nombre']) /$rowPass['nombre']) * 100,2,',', ' ')."%";
                            echo  $tauxPasse > $tauxActuel ? '<img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/fleche_bas.png" height="10" width="10" />' : '<img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/fleche_haut.png"  height="10" width="10"/>';
                          }
               ?>
                <br>
                <?php echo  number_format($resultatActuel['nombre'],0,',', ' ');


              echo '&nbsp;';
              if($resultatActuel['id']==2 || $resultatActuel['id']==3 || $resultatActuel['id']==4  ) {
                echo 'soit '. number_format(($resultatActuel['nombre']*100)/$totalPopulation['nombre'],2,',', ' ') ."% de population.";
              }


              ?>
            </h6>
                </a>
          <span class="desc">
                    <a class="modeless" title="" href="http://localhost/ins-nordkivu/generales/profilgeneral.php?indicateur=<?php echo $resultatActuel['id']; ?>" data-intro=""> En savoir plus
          </a>
          </span>
        </div>
      </div>
            <?php
            }

            mysqli_free_result($resultSetActuel);
            mysqli_free_result($resultPasse);
            mysqli_free_result($resultAnteriere);

            ?>
            </article>
  </div>


</section>

<section class="container">
    <div class="row">
    <article>
       <h2 class="titre" style="border-bottom-color:;">
      <span style="background-color:;">Publications&nbsp;&amp;&nbsp;activités</span> </h2>
   <div class="news-item news-item-portfolio">
          <div class="media">
            <img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/chikudu1.jpg"  alt="chikudu"/>
            <span></span>
          </div>
          <div class="copy">
          <a  class="modeless" href="http://localhost/ins-nordkivu/assets/doc/EDS_00_00_DRC_DHS_2013_2014_FINAL.pdf" target="_blank">

          <h6 class="title" data-title="">Deuxième enquête démographique et de santé (EDS-RDC II 2013-2014)
           </h6>
          </a>
            <span class="desc">
            <a  class="modeless" href="http://localhost/ins-nordkivu/assets/doc/EDS_00_00_DRC_DHS_2013_2014_FINAL.pdf" target="_blank"> Télécharger le rapport

            </a>
            </span>
          </div>
    </div>

    <div class="news-item news-item-portfolio">
          <div class="media">
            <img src="http://localhost/ins-nordkivu/assets/img/publication/profilnk/rapport_1-2-3.jpg"  alt="chiffres"/>
            <span></span>
          </div>
          <div class="copy">
          <a  class="modeless" href="http://localhost/ins-nordkivu/assets/doc/RAPPORT_FINAL_DE_ENQUETTE_1_2_3.pdf" target="_blank">

          <h6 class="title" data-title="">Résultats de l’enquête sur l’emploi,
Le secteur informel et sur la consommation des ménages / 2012

           </h6>
          </a>
            <span class="desc">
            <a  class="modeless" href="http://localhost/ins-nordkivu/assets/doc/RAPPORT_FINAL_DE_ENQUETTE_1_2_3.pdf" target="_blank"> Télécharger le rapport

            </a>
            </span>
          </div>
    </div>


      <div class="news-item news-item-portfolio">
          <div class="media">
            <img width="100%" height="35%"  src="http://localhost/ins-nordkivu/assets/img/lancementTSS.JPG"  alt="chiffres"/>
            <span></span>
          </div>
          <div class="copy">
          <a href="http://localhost/ins-nordkivu/generales/tss_nordkivu.php">

          <h6 class="title" data-title="">Lancement de la formation des Techniciens Supérieurs de la Statistique
           </h6>
          </a>
            <span class="desc">
            <a  class="modeless" href="http://localhost/ins-nordkivu/generales/tss_nordkivu.php" target="_blank"> En savoir plius

            </a>
            </span>
          </div>
    </div>


      <div class="news-item news-item-portfolio">
          <div class="media">
            <img width="100%" height="35%"  src="http://localhost/ins-nordkivu/assets/img/image001.jpg"  alt="indice"/>
            <span></span>
          </div>
          <div class="copy">
          <a href="http://localhost/ins-nordkivu/generales/indices.php">

          <h6 class="title" data-title="">Evolution des prix et indice de prix Aout 2019
           </h6>
          </a>
            <span class="desc">
            <a  class="modeless" href="http://localhost/ins-nordkivu/generales/indices.php" target="_blank"> En savoir plius

            </a>
            </span>
          </div>
      </div>
        <div class="news-item news-item-portfolio">
          <div class="media">
            <img width="100%" height="35%"  src="http://localhost/ins-nordkivu/assets/img/bulletin_2019.jpg"  alt="indice"/>
            <span></span>
          </div>
          <div class="copy">
          <a target="_blank" href="http://localhost/ins-nordkivu/assets/doc/Rapport_enquete_qualitative_Juillet_2019.pdf">

          <h6 class="title" data-title="">Étude qualitative sur la consolidation de la paix et la reconstruction en RDC – Juillet 2019
           </h6>
          </a>
            <span class="desc">
            <a  class="modeless" href="http://localhost/ins-nordkivu/assets/doc/Rapport_enquete_qualitative_Juillet_2019.pdf" target="_blank"> En savoir plius

            </a>
            </span>
          </div>
      </div>
            </article>
    </div>
</section>



 <section class="container">
    <div class="row">
    <article>
       <h2 class="titre" style="border-bottom-color:;">
      <span style="background-color:;">Qui sommes-nous</span> </h2>
                 <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12 quisommes">
                <h4>Notre Mission</h4>
                <p>
                            l’Institut National de la Statistique a
            pour mission générale de rassembler, analyser et diffuse des informations
            pour le compte du Gouvernement principalement,
            des informations statistiques nécessaires pour
            sa politique démographique,
            économique et sociale. </p>
            <div>
                <a href="http://localhost/ins-nordkivu/generales/mission.php" style="font-size:14px; line-height: 27px;">En savoir plus</a>
            </div>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12 quisommes">
                <h4>Réalisations</h4>
                <p>
                Trouvez ici, quelque productions statistiques déjà réalisées par l’INS Nord-Kivu avec l’appui du Gouvernement et des partenaires.
                Enquête Démographique et de Santé, annuaire statistique,
                bulletin annuel des statistiques socioéconomique, ...
                   </p>
                   <div>
                <a href="http://localhost/ins-nordkivu/generales/realisations.php" style="font-size:14px; line-height: 27px;">En savoir plus</a>
            </div>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12 quisommes">
                <h4>Publications</h4>
                <p>
                <a href="http://localhost/ins-nordkivu/generales/publications.php#bulletin-2015" style="color:#000; visited:#000; hover:hotpink;">Bulletin annuel des Statistiques sociales Edition 2015, </a>

                <a href="http://localhost/ins-nordkivu/generales/publications.php#bulletin-2014" style="color:#000; visited:#000; hover:hotpink;">Bulletin annuel des Statistiques sociales Edition 2014, </a>

                <a href="http://localhost/ins-nordkivu/generales/publications.php#bulletin-2013" style="color:#000; visited:#000; hover:hotpink;">Bulletin annuel des Statistiques sociales Edition 2013,</a>
                <a href="http://localhost/ins-nordkivu/generales/publications.php#avenues-2016" style="color:#000; visited:#000; hover:hotpink;">Goma et ses avenues, </a>
                <a href="http://localhost/ins-nordkivu/generales/publications.php#etude-2017" style="color:#000; visited:#000; hover:hotpink;">Étude qualitative sur la consolidation de la paix et la reconstruction en RDC</a> </p>
                <div>
                <a href="http://localhost/ins-nordkivu/generales/publications.php" style="font-size:14px; line-height: 27px;">En savoir plus</a>
            </div>
            </article>

         </div>
     </div>
 </section>

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>


 <?php
            include("footer.php");
              ?>
