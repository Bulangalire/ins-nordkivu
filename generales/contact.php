
<?php

include("../header.php");

?>
<div class="container">

<ol class="breadcrumb">
<li><a href="http://localhost/ins-nordkivu/index.php">Accueil</a></li>
<li class="active">Nos défis</li>
</ol>

<div class="row">

<!-- Article main content -->
<article class="col-sm-8 maincontent">
	<header class="page-header">
	<h3><i class="fa fa-envelope"></i> Conctactez-nous</h3>
	</header>
<div class="row justify-content-left">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                    <!--Form with header-->
                    <form action="mail.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <p class="m-0">Nous serons heureux de vous aider</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nom et prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="votreemail@gmail.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Envoyez nous votre message" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>

<div class="bg col-sm-9">
					<div class="corpsPage">

						<h3>Nous contacter</h3>
						<br />
						<h5>Adresse physique actuelle :</h5>
						<p>134 bis, Av. du Port, Quartier Les Volcans, Commune de Goma, Voir Ancien Auditorat Militaire, avec la Division Provinciale du Plan, Ville de Goma/RDC</p>
						<br />
						<h5>Contacts :</h5>
						 <p>Tél : +243 998 587 876 /+243 816915864 </p>
                         <p>E-mail : insnordkivu@yahoo.fr</p>
						 <p>Site web : localhost/ins-nordkivu</p>

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
