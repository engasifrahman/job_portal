<?php 
	include 'header.php';
?>
		<main class="bg-white" role="main">
		
			<section class="page-title">
				<div class="container-fulid">
					<img src=""assets/images/contact.jpg>
					<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-10 offset-xs-1 ">
						<!-- contact title -->
						<div class="text-center valign-bottom">
							<h3 class="green text-bold-600">Get In Touch With Us</h3>
							<p class="text-white">Holisticly transform excellent systems rather than collaborative leadership. Credibly pursue compelling outside the box.</p>
						</div>
					</div>
				</div>
				<div class="socialnav hidden-md-down">
				  <a href="#" class="one facebook"> <i class="fa fa-facebook padd" aria-hidden="true"></i>Facebook</a>
				  <a href="#" class="two twitter"> <i class="fa fa-twitter padd" aria-hidden="true"></i>Twitter</a>
				  <a href="#" class="three youtube"> <i class="fa fa-youtube padd" aria-hidden="true"></i>Youtube</a>
				  <a href="contact" class="four contact"> <i class="fa fa-phone padd" aria-hidden="true"></i>Contact</a>
				</div>
			</section>

			<section class="pt-3 pb-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<!-- company address -->
							<ul class="list-unstyled">
								<li class="col-md-4 col-sm-4 col-xs-12 mb-2">
									<span class="col-md-12 col-xs-12 mb-1"><i class="fa fa-2x fa-map-marker green text-center col-md-12 col-xs-12"></i></span>
									<h3 class="text-center text-uppercase text-bold-600">Address</h3>
									<p class="col-md-12 col-12 text-center">#55 Sukrabad, Sher e bangla Nagar, Dhaka-1207, Bangladesh </p>	
								</li>
								<li class="col-md-4 col-sm-4 col-xs-12 mb-2">
									<span class="col-md-12 col-xs-12 mb-1"><i class="fa fa-2x fa-phone green text-center col-md-12 col-xs-12"></i></span>
									<h3 class="text-center text-uppercase text-bold-600">Phone</h3>
									<p class="col-md-12 col-12 text-center">0123 456 789 <br>+88 01772-625883</p>
								</li>
								<li class="col-md-4 col-sm-4 col-xs-12 mb-2">
									<span class="col-md-12 col-xs-12 mb-1"><i class="fa fa-2x fa-envelope-o green text-center col-md-12 col-xs-12"></i></span>
									<h3 class="text-center text-uppercase text-bold-600">Email</h3>
									<p class="col-md-12 col-xs-12 text-center"><a>info@jobskillbd.com</a></p>
								</li>
							</ul>
							<!-- ./end company address -->
						</div>
						<div class="col-md-12">
							<form id="contactForm" name="contact-form" action="sendemail.php" method="POST">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="sr-only" for="name">Name</label>
										<input type="text" name="name" class="form-control form-control-lg input-lg sh" id="name" placeholder="Your Name">
									</div>
									<div class="col-md-6 form-group">
											<label class="sr-only" for="email">Email</label>
											<input type="email" name="email" class="form-control form-control-lg input-lg sh" id="email" placeholder="Your Email">
									</div>
								</div>
								<div class=" form-group mb-2">
									<label class="sr-only" for="subject">Subject</label>
									<input type="text" name="subject" class="form-control form-control-lg input-lg sh" id="subject" placeholder="Your Subject">
								</div>
								<div class="form-group mb-2">
									<label class="sr-only" for="message">Message</label>
									<textarea name="message" class="form-control form-control-lg input-lg sh" rows="8"id="message"  placeholder="Your Message"></textarea>
								</div>
								<div class="text-center">
									<button type="submit" name="submit" class="btn btn-lg btn-info input-btn"><span>Send Message</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>

		</main>
<?php 
	include 'footer.php';
?>	