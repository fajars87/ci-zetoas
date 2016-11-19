		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright">&copy; <?php echo date('Y'); ?> ZetoAS</p>
					</div>
				</div>
			</div>
		</footer>

		<!-- Mobile Menu -->
		<div class="overlay overlay-hugeinc">
			<button type="button" class="overlay-close"><span class="ion-ios-close-empty"></span></button>
			<nav>
				<ul>
					<?php
						//print_r($menu);
						foreach($menu as $rmenu){
					?>
					<li><a href="<?php echo base_url().$rmenu['url']; ?>.aspx"><?php echo $rmenu['title']?></a></li>
						<?php } ?>
				</ul>
			</nav>
		</div>

		<script src="<?php echo base_url(); ?>assets/zetoas/js/script.js"></script>

	</body>
</html>
