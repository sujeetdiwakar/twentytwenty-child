<?php
get_header(); ?>

	<main id="site-content" role="main">
		<div class="container">
			<section>
				<div>
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<div>
										<h2>CONTACT US</h2>
									</div>
									<form method="post" id="contact-from">
										<input type="hidden" data-form-email="true">
										<div class="form-group">
											<input type="text" id="name" class="form-control" name="name" required="" placeholder="Name*" data-form-field="Name">
										</div>
										<div class="form-group">
											<input type="email" class="form-control" name="email" required="" placeholder="Email*" data-form-field="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" data-form-field="Suject">
										</div>
										<div class="form-group">
											<textarea class="form-control" name="message" placeholder="Message" rows="7" data-form-field="Message"></textarea>
										</div>
										<div>
											<button type="submit" class="btn btn-lg btn-danger">CONTACT US</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="msg"></div>
			</section>
		</div>
	</main>
<?php get_footer();
