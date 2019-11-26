<style>
    .bs-example{
    	margin: 20px;
    }
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }
</style>
	<script src="/ins-nordkivu/assets/js/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});
</script>
<?php
include("../../header.php");
?>

<div class="container">

<ol class="breadcrumb">
<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>
<li class="active">Recensement</li>
</ol>

<div class="row">

<!-- Article main content -->
<article class="col-sm-12 maincontent">
	<header class="page-header">
	<h3>Recensement des entreprises</h3>
	</header>
	<div class="leftsideconte">
	<div class="top-bar">
        <button class="btn" id="prev-page">
            <i class="fas fa-arrow-circle-left"></i> page precendante
        </button>
        <button class="btn" id="next-page">
            <i class="fas fa-arrow-circle-right"></i> page Suivante
        </button>
        <span class="page-info">
            page <span id="page-num"></span> sur <span id="page-count"></span> 
        </span>
    </div>

	<canvas id="pdf-render"></canvas>
	</div>
	<div class="rightsideContent">


	<div class="bs-example">

	
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Suivez le Spot RGE ?</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Recensement Général des Entreprises ?</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" src="//www.youtube-nocookie.com/embed/LtgrZPhW_yY" frameborder="0" allowfullscreen allow="rel=0; showinfo=0; accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
            </div>
        </div>
	</div>
	
	<img src="/ins-nordkivu/assets/img/rge_capture.jpg"  alt="indice"/>
</div>     
	</div>

</div>
</article>
<?php
		   include("../../footer.php");
 ?>
