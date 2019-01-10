			<?php generateFlightInfo($conn) ?>
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Geriausi pasiūlymai</h2>
						<p>Pasirinkite geriausią variantą!</p>
					</header>
					<div class="row 150%">
						<?php generateDeals($flightNames) ?>
					</div>
				</div>
			</section>