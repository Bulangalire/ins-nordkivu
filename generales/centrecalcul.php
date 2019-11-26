

<?php



include("../header.php");



?>

<div class="container">



<ol class="breadcrumb">

<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>

<li class="active">Nos perspectives</li>

</ol>



<div class="row">



<!-- Article main content -->

<article class="col-sm-8 maincontent">

	<header class="page-header">

	<h3>Centre de calcul</h3>

	</header>







	<div class="col-sm-12">



	  			<hr class="my-4">

	  			<div align="center">

				    <button class="btn btn-primary active filter-button" data-filter="todo">Tout</button>

				    <button class="btn btn-primary filter-button" data-filter="retratos">Portrais</button>

				    <button class="btn btn-primary filter-button" data-filter="paisajes">Paysages</button>

				    <button class="btn btn-primary filter-button" data-filter="disenos">Dessins</button>



						<div class="row">

							<div class="row">

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter retratos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/cc_01.jpg?cs=srgb&dl=aerial-bridge-buildings-50631.jpg&fm=jpg"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/cc_01.jpg?cs=srgb&dl=aerial-bridge-buildings-50631.jpg&fm=jpg"

					                         alt="Retratos">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter retratos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/cc_03.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/cc_03.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Retratos">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter retratos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/faceIns.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/faceIns.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Retratos">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter paisajes">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/teaserbreit.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/teaserbreit.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Paisaje">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter disenos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/centre-calcul.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/centre-calcul.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Paisaje">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter disenos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/centre_calcul_INS.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/centre_calcul_INS.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Paisaje">

					                </a>

					            </div>

					            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter disenos">

					                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""

					                   data-image="http://localhost/ins-nordkivu/assets/img/galleries/cc_02.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                   data-target="#image-gallery">

					                    <img class="img-thumbnail"

					                         src="http://localhost/ins-nordkivu/assets/img/galleries/cc_02.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"

					                         alt="Paisaje">

					                </a>

					            </div>

					        </div>



					        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

					            <div class="modal-dialog modal-lg">

					                <div class="modal-content">

					                    <div class="modal-header">

					                        <h4 class="modal-title" id="image-gallery-title"></h4>

					                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

					                        </button>

					                    </div>

					                    <div class="modal-body">

					                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">

					                    </div>

					                    <div class="modal-footer">

					                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>

					                        </button>



					                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>

					                        </button>

					                    </div>

					                </div>

					            </div>

					        </div>

						</div>

					</div>

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

