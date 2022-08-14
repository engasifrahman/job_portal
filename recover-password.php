<?php 
	include 'header.php';
?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
	<main data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
		<div class="app-content content container-fluid">
		  <div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="container pt-3 pb-3">
					<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12 box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
							<div class="card-header no-border pb-0">
								<div class="card-title text-xs-center">
									<h2 class="text-bold-700 text-success text-lowercase"><img src="assets/images/logo/white_logo.png"></h2>
								</div>
								<h6 class="card-subtitle text-muted text-xs-center font-small-3 pt-2">We will send you a link to reset your password.</h6>
							</div>
							<div class="card-body collapse in">
								<div class="mt-2">
									<form class="form-horizontal" action="login.php" novalidate>
										<fieldset class="form-group position-relative has-icon-left">
											<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>
											<div class="form-control-position">
												<i class="icon-mail6"></i>
											</div>
										</fieldset>
										<button type="submit" class="btn btn-info btn-lg btn-block"><i class="icon-lock4"></i> Recover Password</button>
									</form>
								</div>
							</div>
							<div class="card-footer no-border">
								<p class="float-sm-left text-xs-center"><a href="1sin" class="card-link">Login</a></p>
								<p class="float-sm-right text-xs-center">New to <span class="text-bold-700 text-info text-lowercase">www.jobskillbd.com</span>?&nbsp;<a href="1sup" class="card-link">Sign Up</a></p>
							</div>
						</div>
					</div>
				</section>
			</div>
		  </div>
		</div>
	</main>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php 
	include 'footer.php';
?>	