

<?php

	include("../header.php");

?>



<div class="container">



<div class="row">



			<!-- Article main content -->

			<article class="col-xs-12 maincontent">

				<header style="text-align:center;" class="page-header">

					<h3  >Inscription</h3>

				</header>



				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

					<div class="panel panel-default">

						<div class="panel-body">

							<h3 class="thin text-center">Creer un nouveau compte</h3>

							<p class="text-center text-muted">Aller directerment sur, <a href="http://localhost/ins-nordkivu/generales/signin.php">Connectez-vous</a>  si vous disposer déjà d'un compte. </p>

							<hr>



							<form>

								<div class="top-margin">

									<label>Prénom</label>

									<input type="text" class="form-control">

								</div>

								<div class="top-margin">

									<label>Postnom</label>

									<input type="text" class="form-control">

								</div>

								<div class="top-margin">

									<label>Adresse E-mail <span class="text-danger">*</span></label>

									<input type="text" class="form-control">

								</div>



								<div class="row top-margin">

									<div class="col-sm-6">

										<label>Mot de passe <span class="text-danger">*</span></label>

										<input type="text" class="form-control">

									</div>

									<div class="col-sm-6">

										<label>Confirmez Mot de passe <span class="text-danger">*</span></label>

										<input type="text" class="form-control">

									</div>

								</div>



								<hr>



								<div class="row">

									<div class="col-lg-8">

										<label class="checkbox">

											<input type="checkbox">

											J'ai lu les <a href="http://localhost/ins-nordkivu/generales/page_terms.php">Termes et conditions</a>

										</label>

									</div>

									<div class="col-lg-4 text-right">

										<button class="btn btn-action" type="submit">Inscription</button>

									</div>

								</div>

							</form>

						</div>

					</div>



				</div>



			</article>

			<!-- /Article -->



		</div>

	</div>	<!-- /container -->







	<?php

            include("../footer.php");

  ?>
